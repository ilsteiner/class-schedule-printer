import glob
import os
import json
from datetime import datetime
import time

directory = 'data/json/'

# Clean the trimmed directory first
for filename in glob.glob(directory + 'trimmed/*.json'):
	os.remove(filename)

for filename in glob.glob(directory + '*.json'):
	with open(filename) as jsonFile:
		# Get data
		data = json.load(jsonFile)

		# Get just the attendee array
		attendees = data["Attendees"]
		
		# Make a date object
		date = datetime.strptime(
			data["Date"] + "|" + data["Time"],
			'%Y-%m-%d|%H:%M:%S'
			)

		# Append the new timestamp to each attendee
		for attendee in attendees:
			attendee["Timestamp"] = time.mktime(date.timetuple())

		# Sort by timestamp
		sorted_attendees = sorted(attendees,key=lambda k: k['Timestamp'])

		# Write just the attendees to a new file
		with open(directory + "trimmed/" + os.path.basename(filename),'w') as output:
			json.dump(sorted_attendees,output,indent=4, sort_keys=True)