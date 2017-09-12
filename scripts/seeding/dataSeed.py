import glob
import os
import json
import random
import argparse

def getNames():
	with open(seedFile) as seeds:
		randomNames = json.load(seeds)
		random.shuffle(randomNames)
		return randomNames

parser = argparse.ArgumentParser(description='Make sample data files.')
parser.add_argument('--quantity','-q',
					type=int,
					help="How many files to create")

inputDir = '../../data/json/'
outputDir = 'output/'
seedFile = 'input/seeds.json'

args = parser.parse_args()

outputQuantity = 5

if(args.quantity):
	outputQuantity = args.quantity

# Get the names
randomNames = getNames()

# Clean the directory first
for filename in glob.glob(outputDir + '*.json'):
	os.remove(filename)

while(outputQuantity > 1):
	for filename in glob.glob(inputDir + '*.json'):
		with open(filename) as jsonFile:
			# Get data
			data = json.load(jsonFile)

			for attendee in data["Attendees"]:
				if(len(randomNames) < 1):
					randomNames = getNames()

				seedData = randomNames.pop()

				#Change the names
				attendee["Name"]["First"] = seedData["name"]["first"]
				attendee["Name"]["Last"] = seedData["name"]["last"]
				attendee["Name"]["FirstAndLast"] = seedData["name"]["first"] + " " + seedData["name"]["last"]

				# Is it a child?
				if random.randint(1,10) < 2:
					attendee["Fees"]["Under18"] = True
					attendee["Fees"]["Age"] = random.randint(3,17)

			with open(outputDir + str(random.randint(0,999999)) + os.path.basename(filename),'w') as outputFile:
				json.dump(data,outputFile)

		outputQuantity -= 1
		if(outputQuantity == 0):
			exit()
