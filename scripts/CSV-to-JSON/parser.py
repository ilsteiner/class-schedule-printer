import csv
import json
import sys
import datetime
import time
from dateutil import parser

registrations = []

def process_file(filename):
	items = []
	item_headers = []
	with open(filename, 'r') as input_file:
		reader = csv.reader(input_file)
		for row_num,row in enumerate(reader):
			# Get the headers
			if(row_num == 0):
				for col_num,col in enumerate(row):
					item_headers.append(col)
			# We got all the headers, now get the data
			else:
				item = {}
				for col_num,col in enumerate(row):
					item[item_headers[col_num]] = col
				items.append(item)

	# Reverse the list
	items.reverse()
	return items

try:
	# Try to process all the files
	attendees = process_file("data/attendees.csv")
	first = process_file("data/first.csv")
	second = process_file("data/second.csv")
	third = process_file("data/third.csv")

	for attendee in attendees:
		registration = {}
		registration["ClassRegistration"] = {}

		# Get the name
		registration["ClassRegistration"]["Name"] = {}
		registration["ClassRegistration"]["Name"]["First"] = attendee["Name_First"]
		registration["ClassRegistration"]["Name"]["Last"] = attendee["Name_Last"]
		registration["ClassRegistration"]["Name"]["FirstAndLast"] = attendee["Name_First"] + " " + attendee["Name_Last"]

		# Get the timestamp
		datePart = attendee["Date"]
		timePart = attendee["Time"]

		parsed_time = parser.parse(datePart + " " + timePart)

		registration["Timestamp"] = parsed_time.timestamp()

		# registration["Timestamp"] = time.mktime(datetime.datetime.combine(parser.parse(datePart),parser.parse(timePart).time()))

		registration["ClassRegistration"]["MorningFirstPeriod"] = []
		registration["ClassRegistration"]["MorningSecondPeriod"] = []
		registration["ClassRegistration"]["AfternoonPeriod"] = []

		for row in first:
			# This is really naive, but the volume is so low it's probably okay
			if(attendee["WinterAdventure2018_Id"] == row["WinterAdventure2018_Id"] and attendee["Attendees_Id"] == row["Attendees_Id"]):
				# Get the fields, add them to a dictionary, then append to the array
				first_registration = {}
				first_registration["ClassName1FirstPeriod"] = row["ClassName1FirstPeriod"]
				first_registration["ClassName2FirstPeriod"] = row["ClassName2FirstPeriod"]
				first_registration["Leader"] = row["Leader"]
				first_registration["Leader2"] = row["Leader2"]
				registration["ClassRegistration"]["MorningFirstPeriod"].append(first_registration)

		for row in second:
			# This is really naive, but the volume is so low it's probably okay
			if(attendee["WinterAdventure2018_Id"] == row["WinterAdventure2018_Id"] and attendee["Attendees_Id"] == row["Attendees_Id"]):
				# Get the fields, add them to a dictionary, then append to the array
				second_registration = {}
				second_registration["ClassName1SecondPeriod"] = row["ClassName1SecondPeriod"]
				second_registration["ClassName2SecondPeriod"] = row["ClassName2SecondPeriod"]
				second_registration["Leader"] = row["Leader"]
				second_registration["Leader2"] = row["Leader2"]
				registration["ClassRegistration"]["MorningSecondPeriod"].append(second_registration)

		for row in third:
			# This is really naive, but the volume is so low it's probably okay
			if(attendee["WinterAdventure2018_Id"] == row["WinterAdventure2018_Id"] and attendee["Attendees_Id"] == row["Attendees_Id"]):
				# Get the fields, add them to a dictionary, then append to the array
				third_registration = {}
				third_registration["ClassName1ThirdPeriod"] = row["ClassName1ThirdPeriod"]
				third_registration["ClassName2ThirdPeriod"] = row["ClassName2ThirdPeriod"]
				third_registration["Leader"] = row["Leader"]
				third_registration["Leader2"] = row["Leader2"]
				registration["ClassRegistration"]["AfternoonPeriod"].append(third_registration)

		registrations.append(registration)

	with open('parsed.json', 'w') as output:
		json.dump(registrations, output)
				
except Exception as e:
	# print("Failed to open and process CSV file.")
	print("Error: " + str(e))