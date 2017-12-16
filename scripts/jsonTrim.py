import glob
import os
import json
from datetime import datetime
import time
import logging

directory = 'data/json/'
logging.basicConfig(filename='trim.log',level=logging.DEBUG)

# Clean the trimmed directory first
for filename in glob.glob(directory + 'trimmed/*.json'):
	os.remove(filename)

logging.info("Cleared directory")

file_count = 0

for filename in glob.glob(directory + '*.json'):
	file_count += 1

	with open(filename) as jsonFile:
		# Get data
		data = json.load(jsonFile)

		# Get just the attendee array
		attendees = data["Attendees"]

		logging.info("There are " + str(len(attendees)) + " attendees.")
		
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
logging.info("Processed " + str(file_count) + " files")