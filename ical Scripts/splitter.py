##This script splits a .CSV file into multiple .ics ical files. Each row of the CSV file
##is exported into its own ical file, with the schema defined for what is needed in the
##imetable.

#Change this to the source .CSV file
SOURCE_FILE = "PATH"

#Change this to your output directory for 'n' .ics files, where n is the number of rows in your
#Must finish with "\\" to allow filenames to be dynamically created correctly.
OUTPUT_FOLDER = "PATH\\"

bigcsv = open(SOURCE_FILE,'r')

for line in bigcsv:
        fields = line.split(',')
        coursecode = fields[0]
        coursename = fields[1]
        repday = fields[2]
        starttime = fields[3] + fields[4]
        #print starttime
        endtime = fields[5] + fields[6]
        location = fields[7]
        identifier = coursecode + repday[1] + fields[3]

        #First day of 2013
        daydate = "20130101"

        #Change the days of the week into dates corresponding to the start of semester 2
        if repday == "Monday":
                daydate = "20130114"
        if repday == "Tuesday":
                daydate = "20130115"
        if repday == "Wednesday":
                daydate = "20130116"
        if repday == "Thursday":
                daydate = "20130117"
        if repday == "Friday":
                daydate = "20130118"
        start = daydate + "T" + starttime + "00\n"
        end = daydate + "T" + endtime + "00\n"

        #Build the .ics ical file
        f = open (OUTPUT_FOLDER + identifier + ".ics", "a")
        f.write("BEGIN:VCALENDAR\nVERSION:2.0\nBEGIN:VEVENT\n")
        f.write("DTSTART;TZID=Europe/London:" + start)
        f.write("DTEND;TZID=Europe/London:" + end)
        f.write("RRULE:FREQ=WEEKLY;UNTIL=20130408T131000Z\n") #Hard coded end for semester 2
        f.write("UID:" + identifier + "@infyt.raj\n")
        f.write("DESCRIPTION:\n")
        f.write("LOCATION:" + location +"\n")
        f.write("SUMMARY:" + coursename +"\n")
        f.write("TRANSP:OPAQUE\n")
        f.write("END:VEVENT\n")
        f.write("END:VCALENDAR\n")



