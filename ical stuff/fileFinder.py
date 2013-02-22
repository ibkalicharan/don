import os
import sys
import glob

courseCodes = sys.argv[1:]
print courseCodes
i = 0
fileNames=[]

for i in range(len(courseCodes)):
    for files in os.listdir("."):
        if files.startswith(courseCodes[i]):
            fileNames.append(str(files))
  

print fileNames
