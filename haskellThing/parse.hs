{-# LANGUAGE OverloadedStrings #-}

import qualified Codec.Archive.Tar as Tar
import qualified Codec.Compression.GZip as GZip
import qualified Data.ByteString.Lazy as BS

import Data.Aeson
import Text.CSV

import Data.Text (unpack, pack, replace, Text)
import Data.HashMap.Strict (toList)

import System.Directory
import System.Process
import System.Environment

import Control.Monad
import Control.Applicative
import Control.Arrow

js = ["CoursesBasicData.js", "Courses12Data.js", "Events12Data.js", "Courses345Data.js", "Events345Data.js", "Courses345Data1.js", "Courses345Data2.js", "Courses3Data.js", "Courses4Data.js", "Courses5Data.js"]

-- PREPROCESSING STEPS --

-- applies basic string replacements to a timetab javascript file
processJS :: String -> String
processJS = unpack . replace "new Object();" "{};" . replace "new Array();""{};" . pack

-- loads an entire javascript file applying processJS to it
loadJS :: String -> IO ()
loadJS fn = do {
	f <- liftM processJS (readFile fn);
	length f `seq` writeFile fn f -- needed to force haskell to do it all at once
}

processAllJS :: String -> IO ()
processAllJS d = foldr ((\l r -> loadJS l >> r) . ((d ++ "\\") ++)) (return ()) js

extractTimetable :: String -> IO ()
extractTimetable s = createDirectory "tt" >> BS.readFile s >>= Tar.unpack "tt" . Tar.read . GZip.decompress

moveAllJS ::String -> String -> IO ()
moveAllJS s d = createDirectoryIfMissing True d >> foldr(\l r -> copyFile ((s++"\\") ++ l) ((d ++ "\\") ++ l) >> r) (return ()) js

execNode :: IO ()
execNode = void $ runCommand "..\\node \"..\\process_data.js\"" >>= waitForProcess -- we need to wait for node to finish else haskell will try and process the json when there is no json

-- JSON PARSING STEPS --

data CourseJ = CourseJ {
	college' :: String,
	school' :: String,
	area' :: String,
	title' :: String,
	start' :: [Int],
	end' :: [Int],
	sites' :: [String]
}

instance FromJSON CourseJ where
	parseJSON (Object v) = CourseJ <$>
						  v .: "College" <*>
						  v .: "School" <*>
						  v .: "SubjectArea" <*>
						  v .: "Title" <*>
						  v .: "start" <*>
						  v .: "end" <*>
						  v .: "sites"
	parseJSON _ = mzero

-- loads up node.js produced JSON files and converts them into our CourseJ intermediate format, ignoring irrelevant data during parsing
extractCourseData :: String -> IO [(Text, Result CourseJ)]
extractCourseData fn = do {
	(Just (Object v)) <- liftM decode (BS.readFile fn);
	return $ map (\(x,y) -> (x, fromJSON y :: Result CourseJ)) (toList v)
}

-- CSV PREPARATION STEPS --

data Lecture = Lecture Day (Int, Int) (Int, Int) String
data Course = Course {
	college :: String,
	school :: String,
	subjectArea :: String,
	title :: String,
	lectures :: [Lecture]
}

data Day = Monday | Tuesday | Wednesday | Thursday | Friday | Satuday | Sunday deriving (Enum, Show)

cleanCourseData :: [(Text, Result CourseJ)] -> [(Text, CourseJ)]
cleanCourseData = foldr f []
	where
		(_, Error _) `f` r = r
		(x, Success y) `f` r = (x,y) : r

convertTime :: Int -> (Day, Int, Int)
convertTime i = (day, hour, minute)
	where
		hrs = i `div` 60
		minute = i - (60*hrs)
		hour = hrs `mod` 24
		day = toEnum $ hrs `div` 24

convertLectures :: Int -> Int -> String -> Lecture
convertLectures s e = Lecture d (st, en) (st', en')
	where
		(d, st, en) = convertTime s
		(_, st', en') = convertTime e


convertCourse :: CourseJ -> Course
convertCourse (CourseJ c s a t s' e' si') = Course c s a t l
	where
		l = zipWith (uncurry convertLectures) (zip s' e') si'

courseToRecord :: (Text, Course) -> [Record]
courseToRecord (x, Course c s a t l) = map (\(Lecture d (h, m) (h', m') loc) -> [unpack x, t, show d, show h, show m, show h', show m', loc]) l

-- MAIN LOOP --
 
main = do {
	(f:_) <- getArgs;
	extractTimetable f;
	moveAllJS "tt" "data";
	removeDirectoryRecursive "tt";
	processAllJS "data";
	setCurrentDirectory "data";
	execNode;
	j <- liftM (map (second convertCourse) .cleanCourseData) (extractCourseData "courses.json");
	writeFile "courseData.csv" . printCSV . concatMap courseToRecord $ j;
	writeFile "courseCodes.txt" . foldr (\l r -> (unpack.fst $ l) ++ "\n" ++ r) [] $ j;
}