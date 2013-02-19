Haskell thing
=============

Notes on Timetab
----------------

- Everything is stored in javascript files as JS objects, which appear to be machine generated
- Courses12Data.js contains data on 1st/2nd year courses, but not the times they take place etc.
- That information is stored in Events12Data.js
- For 3/4/5 year courses, times are stored in Events345Data.js
- However, the course data is split amongst 6 files:
	- Courses345Data.js
	- Courses345Data1.js
	- Courses345Data2.js
	- Courses3Data.js
	- Courses4Data.js
	- Courses5Data.js
- Be aware that Courses345Data1 and Data2 are the first and second halves of Courses345Data respectively
	- Why they exist split I'm not sure
- Data on schools, colleges, subject areas (and where the courses object is actually initialised) is all contained in CoursesBasicData.js
- This haskell code invokes node.js to load these a few of these files and convert them to JSON, however, they must be opened in a specific order
	- CoursesBasicData.js
	- Courses12Data.js
	- Events12Data.js
	- Courses345Data.js
	- Courses3Data.js
	- Courses4Data.js
	- Courses5Data.js
	- Events345Data.js
- Also note that the haskell performs pre-processing on these files so that node.js can actually make JSON out of them
- The format for times in the Event .js files is minutes since the beginning of the week (weeks beginning at 00:00 monday)

How the program works
---------------------

- Un-gzip and un-tar timetab tarball into temporary "tt" directory
- Move the relevant .js files into a "data" directory
- Delete the stuff left in "tt"
- Perform pre-processing on the .js files
	- This involves replacing instances of "new Object();" and "new Array();" with "{};"
- Invoke node with a small javascript file that loads the timetab data and converts it to JSON
- Load the JSON data into an intermediate format (closely matches the initial timetab format)
- Clean up data into a neater format
- Create a CSV file containing the cleaned-up data

Required Libraries
------------------

Other than things included by default in the Haskell Platform:

- Text.CSV
- Data.Aeson
- Codec.Archive.Tar

Required programs
-----------------

- node.js

Building
--------

```ghc parse.hs```

Usage
-----

```parse <path to timetable tarball here>```