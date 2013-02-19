{-# LANGUAGE OverloadedStrings #-}

import qualified Codec.Archive.Tar as Tar
import qualified Codec.Compression.GZip as GZip
import qualified Data.ByteString.Lazy as BS
import System.Directory
import System.Process
import System.Environment
import Data.Text (unpack, pack, replace, Text)
import Data.HashMap.Strict (toList)
import Data.Aeson
import Control.Monad
import Control.Applicative
import Text.CSV

processJS :: String -> String
processJS = unpack . replace (pack "new Object();") (pack "{};") . replace (pack "new Array();") (pack "{};") . pack

loadJS :: String -> IO ()
loadJS fn = do {
	f <- readFile fn >>= return.processJS;
	length f `seq` writeFile fn f
}

js = ["CoursesBasicData.js", "Courses12Data.js", "Events12Data.js", "Courses345Data.js", "Events345Data.js", "Courses345Data1.js", "Courses345Data2.js", "Courses3Data.js", "Courses4Data.js", "Courses5Data.js"]

processAllJS :: String -> IO ()
processAllJS d = foldr (\l r -> loadJS l >> r) (return ()) $ map ((d ++ "\\") ++) js

extractTimetable :: String -> IO ()
extractTimetable s = createDirectory "tt" >> BS.readFile s >>= Tar.unpack "tt" . Tar.read . GZip.decompress

moveAllJS ::String -> String -> IO ()
moveAllJS s d = createDirectoryIfMissing True d >> foldr(\l r -> copyFile ((s++"\\") ++ l) ((d ++ "\\") ++ l) >> r) (return ()) js

execNode :: IO ()
execNode = runCommand "..\\node \"..\\process_data.js\"" >> return () 

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

extractCourseData fn = do {
	(Just (Object v)) <- (BS.readFile fn) >>= return.decode;
	return $ map (\(x,y) -> (x, fromJSON y :: Result CourseJ)) (toList v)
}

cleanCourseData :: [(Text, Result CourseJ)] -> [(Text, CourseJ)]
cleanCourseData = foldr f []
	where
		(_, Error _) `f` r = r
		(x, Success y) `f` r = (x,y) : r

data Day = Monday | Tuesday | Wednesday | Thursday | Friday | Satuday | Sunday deriving (Enum, Show)

convertTime :: Int -> (Day, Int, Int)
convertTime i = (day, hour, minute)
	where
		hrs = i `div` 60
		minute = i - (60*hrs)
		hour = hrs `mod` 24
		day = toEnum $ hrs `div` 24

convertLectures :: Int -> Int -> (String -> Lecture)
convertLectures s e = Lecture d (st, en) (st', en')
	where
		(d, st, en) = convertTime s
		(_, st', en') = convertTime e

data Lecture = Lecture Day (Int, Int) (Int, Int) String
data Course = Course {
	college :: String,
	school :: String,
	subjectArea :: String,
	title :: String,
	lectures :: [Lecture]
}

convertCourse :: CourseJ -> Course
convertCourse (CourseJ c s a t s' e' si') = Course c s a t l
	where
		l = map (\(x, y) -> (uncurry (convertLectures) x) y) $ zip (zip s' e') si'

courseToRecord :: (Text, Course) -> [Record]
courseToRecord (x, (Course c s a t l)) = map (\(Lecture d (h, m) (h', m') loc) -> [unpack x, t, show d, show h, show m, show h', show m', loc]) $ l

main = do {
	(f:_) <- getArgs;
	extractTimetable f;
	moveAllJS "tt" "data";
	removeDirectoryRecursive "tt";
	processAllJS "data";
	setCurrentDirectory "data";
	execNode;
	j <- extractCourseData "courses.json" >>= return . map (\(x,y) -> (x, convertCourse y)) .cleanCourseData;
	writeFile "courseData.csv" . printCSV . concat . map (courseToRecord) $ j;
	writeFile "courseCodes.txt" . foldr (\l r -> l ++ "\n" ++ r) []. map (unpack.fst) $ j;
}