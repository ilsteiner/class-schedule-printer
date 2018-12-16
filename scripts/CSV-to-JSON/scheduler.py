import json

with open('parsed.json', 'r') as input_file:
	schedules = json.load(input_file)

FirstPeriodClasses = {}
SecondPeriodClasses = {}
ThirdPeriodClasses = {}
Limits = {}
AllClasses = []

# Get the limits
with open('limits.json', 'r') as limits_file:
	Limits = json.load(limits_file)

for registration in schedules:
	# Get first period class
	for choice in registration["ClassRegistration"]["MorningFirstPeriod"]:
		if len(choice["ClassName1FirstPeriod"]) > 0 and choice["ClassName1FirstPeriod"] != "None" and choice["ClassName1FirstPeriod"] not in FirstPeriodClasses:
			FirstPeriodClasses[choice["ClassName1FirstPeriod"]] = {}
			FirstPeriodClasses[choice["ClassName1FirstPeriod"]]["Registrants"] = []
			FirstPeriodClasses[choice["ClassName1FirstPeriod"]]["Leader"] = choice["Leader"]
			FirstPeriodClasses[choice["ClassName1FirstPeriod"]]["Count"] = None
			FirstPeriodClasses[choice["ClassName1FirstPeriod"]]["Limit"] = Limits[choice["ClassName1FirstPeriod"]]
		if len(choice["ClassName2FirstPeriod"]) > 0 and choice["ClassName2FirstPeriod"] != "None" and choice["ClassName2FirstPeriod"] not in FirstPeriodClasses:
			FirstPeriodClasses[choice["ClassName2FirstPeriod"]] = {}
			FirstPeriodClasses[choice["ClassName2FirstPeriod"]]["Registrants"] = []
			FirstPeriodClasses[choice["ClassName2FirstPeriod"]]["Leader"] = choice["Leader2"]
			FirstPeriodClasses[choice["ClassName2FirstPeriod"]]["Count"] = None
			FirstPeriodClasses[choice["ClassName2FirstPeriod"]]["Limit"] = Limits[choice["ClassName2FirstPeriod"]]
	# Get second period class
	for choice in registration["ClassRegistration"]["MorningSecondPeriod"]:
		if len(choice["ClassName1SecondPeriod"]) > 0 and choice["ClassName1SecondPeriod"] != "None" and choice["ClassName1SecondPeriod"] not in SecondPeriodClasses:
			SecondPeriodClasses[choice["ClassName1SecondPeriod"]] = {}
			SecondPeriodClasses[choice["ClassName1SecondPeriod"]]["Registrants"] = []
			SecondPeriodClasses[choice["ClassName1SecondPeriod"]]["Leader"] = choice["Leader"]
			SecondPeriodClasses[choice["ClassName1SecondPeriod"]]["Count"] = None
		if len(choice["ClassName2SecondPeriod"]) > 0 and choice["ClassName2SecondPeriod"] != "None" and choice["ClassName2SecondPeriod"] not in SecondPeriodClasses:
			SecondPeriodClasses[choice["ClassName2SecondPeriod"]] = {}
			SecondPeriodClasses[choice["ClassName2SecondPeriod"]]["Registrants"] = []
			SecondPeriodClasses[choice["ClassName2SecondPeriod"]]["Leader"] = choice["Leader2"]
			SecondPeriodClasses[choice["ClassName2SecondPeriod"]]["Count"] = None
	# Get third period class
	for choice in registration["ClassRegistration"]["AfternoonPeriod"]:
		if len(choice["ClassName1ThirdPeriod"]) > 0 and choice["ClassName1ThirdPeriod"] != "None" and choice["ClassName1ThirdPeriod"] not in ThirdPeriodClasses:
			ThirdPeriodClasses[choice["ClassName1ThirdPeriod"]] = {}
			ThirdPeriodClasses[choice["ClassName1ThirdPeriod"]]["Registrants"] = []
			ThirdPeriodClasses[choice["ClassName1ThirdPeriod"]]["Leader"] = choice["Leader"]
			ThirdPeriodClasses[choice["ClassName1ThirdPeriod"]]["Count"] = None
		if len(choice["ClassName2ThirdPeriod"]) > 0 and choice["ClassName2ThirdPeriod"] != "None" and choice["ClassName2ThirdPeriod"] not in ThirdPeriodClasses:
			ThirdPeriodClasses[choice["ClassName2ThirdPeriod"]] = {}
			ThirdPeriodClasses[choice["ClassName2ThirdPeriod"]]["Registrants"] = []
			ThirdPeriodClasses[choice["ClassName2ThirdPeriod"]]["Leader"] = choice["Leader2"]
			ThirdPeriodClasses[choice["ClassName2ThirdPeriod"]]["Count"] = None

# We have the available classes, now start adding the actual choices
for registration in schedules:
	for choice in registration["ClassRegistration"]["MorningFirstPeriod"]:
		chosen = {}
		chosen["Name"] = registration["ClassRegistration"]["Name"]["FirstAndLast"]
		chosen["Timestamp"] = registration["Timestamp"]
		try:
			if choice["ClassName1FirstPeriod"] != "None" and len(choice["ClassName1FirstPeriod"]) > 0 and chosen not in FirstPeriodClasses[choice["ClassName1FirstPeriod"]]["Registrants"]:
				FirstPeriodClasses[choice["ClassName1FirstPeriod"]]["Registrants"].append(chosen)
			
			if  choice["ClassName2FirstPeriod"] != "None" and len(choice["ClassName2FirstPeriod"]) > 0 and chosen not in FirstPeriodClasses[choice["ClassName2FirstPeriod"]]["Registrants"]:
				FirstPeriodClasses[choice["ClassName2FirstPeriod"]]["Registrants"].append(chosen)
		except Exception as e:
			print("")

	for choice in registration["ClassRegistration"]["MorningSecondPeriod"]:
		chosen = {}
		chosen["Name"] = registration["ClassRegistration"]["Name"]["FirstAndLast"]
		chosen["Timestamp"] = registration["Timestamp"]
		try:
			if choice["ClassName1SecondPeriod"] != "None" and len(choice["ClassName1SecondPeriod"]) > 0 and chosen not in SecondPeriodClasses[choice["ClassName1SecondPeriod"]]["Registrants"]:
				SecondPeriodClasses[choice["ClassName1SecondPeriod"]]["Registrants"].append(chosen)
			
			if choice["ClassName2SecondPeriod"] != "None" and len(choice["ClassName2SecondPeriod"]) > 0 and chosen not in SecondPeriodClasses[choice["ClassName2SecondPeriod"]]["Registrants"]:
				SecondPeriodClasses[choice["ClassName2SecondPeriod"]]["Registrants"].append(chosen)
		except Exception as e:
			print("")

	for choice in registration["ClassRegistration"]["AfternoonPeriod"]:
		chosen = {}
		chosen["Name"] = registration["ClassRegistration"]["Name"]["FirstAndLast"]
		chosen["Timestamp"] = registration["Timestamp"]
		try:
			if choice["ClassName1ThirdPeriod"] != "None" and len(choice["ClassName1ThirdPeriod"]) > 0 and chosen not in ThirdPeriodClasses[choice["ClassName1ThirdPeriod"]]["Registrants"]:
				ThirdPeriodClasses[choice["ClassName1ThirdPeriod"]]["Registrants"].append(chosen)
			
			if choice["ClassName2ThirdPeriod"] != "None" and len(choice["ClassName2ThirdPeriod"]) > 0 and chosen not in ThirdPeriodClasses[choice["ClassName2ThirdPeriod"]]["Registrants"]:
				ThirdPeriodClasses[choice["ClassName2ThirdPeriod"]]["Registrants"].append(chosen)
		except Exception as e:
			print("")

AllClasses.append(FirstPeriodClasses)
AllClasses.append(SecondPeriodClasses)
AllClasses.append(ThirdPeriodClasses)

print("Class count: " + str(len(AllClasses[0]) + len(AllClasses[1]) + len(AllClasses[2])))

with open('by_class.json', 'w') as output:
	json.dump(AllClasses,output)