import os
import sys
import glob

#If you want to use the script on a directory, uncomment this part
#Replace "PATH_OF_INPUT_FOLDER" with the folder path to where the *.ics files are being stored.
#listOfFiles = glob.glob('PATH_OF_INPUT_FOLDER\*.ics')

coursecodes = sys.argv[1:-1]
outputName = sys.argv[-1]

#Replace "PATH_OF_OUTPUT_FILE" with the folder path to where the output will be delivered, including filename.ics
out = open(outputName, 'w')
out.write("BEGIN:VCALENDAR\nVERSION:2.0\n")

#Produces two lists that are just the event details in ical form
for x in listOfFiles:
    f = open(x,'r')
    lines = f.readlines()
    #Remove the first item
    lines.pop(0)
    #Remove the second item(now the first)
    lines.pop(0)
    #Remove the last item
    lines.pop()
    i=0
    for item in lines:
        out.write(lines[i])
        i +=1

out.write("END:VCALENDAR")
print "Merging successful. File " + outputName + "created."



            

