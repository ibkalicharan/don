fs = require('fs');

require("./data/CoursesBasicData.js");
require("./data/Courses12Data.js");
require("./data/Events12Data.js");
require("./data/Courses345Data.js");
require("./data/Courses3Data.js"); 
require("./data/Courses4Data.js"); 
require("./data/Courses5Data.js");
require("./data/Events345Data.js");

fs.writeFile("subjects.json", JSON.stringify(SubjectAreas));
fs.writeFile("courses.json", JSON.stringify(Courses));
fs.writeFile("schools.json", JSON.stringify(Schools));
fs.writeFile("colleges.json", JSON.stringify(Colleges));