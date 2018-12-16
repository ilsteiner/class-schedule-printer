import json

def clean_name(name):
	# If the name is all lower or all upper, fix that
	should_fix = False
	for name_part in name.split():
		# Special case for J.P.
		if name_part == "J.P.":
			return name

		if name_part.lower() == name_part or name_part.upper() == name_part:
			should_fix = True
	
	if should_fix:
		return name.title()
	else:
		return name

with open('parsed.json', 'r') as input_file:
	schedules = json.load(input_file)

FirstPeriodClasses = {}
SecondPeriodClasses = {}
ThirdPeriodClasses = {}
Limits = {}
AllClasses = []

def register_for_class(classPeriodName,classPeriod,registration,choices):
	for choice in choices:
		if choice[classPeriodName] != "None":
			if(len(choice[classPeriodName]) == 0):
				break

			classRegistrants = classPeriod[choice[classPeriodName]]["Registrants"]
			# If there is room, register the person
			if((Limits[choice[classPeriodName]] == 0 or len(classRegistrants) < Limits[choice[classPeriodName]])):
				chosen = {}
				chosen["Name"] = clean_name(registration["ClassRegistration"]["Name"]["FirstAndLast"])
				chosen["Timestamp"] = registration["Timestamp"]

				if(chosen not in classRegistrants):
					classRegistrants.append(chosen)
					classPeriod[choice[classPeriodName]]["Count"] += 1
				break

def collate_by_person(by_class):
	people = dict()
	collate_class_period(by_class[0],people)
	collate_class_period(by_class[1],people)
	collate_class_period(by_class[2],people)

	return people

def collate_class_period(class_period,people):
	for class_option in class_period:
		for registrant in class_period[class_option]["Registrants"]:
			if clean_name(registrant["Name"]) not in people:
				people[clean_name(registrant["Name"])] = []

	for class_option in class_period:
		for registrant in class_period[class_option]["Registrants"]:
			people[clean_name(registrant["Name"])].append(class_option)

# Get the limits
with open('limits.json', 'r') as limits_file:
	Limits = json.load(limits_file)

# Get classes available
for registration in schedules:
	# Get first period class
	for choice in registration["ClassRegistration"]["MorningFirstPeriod"]:
		if len(choice["ClassName1FirstPeriod"]) > 0 and choice["ClassName1FirstPeriod"] != "None" and choice["ClassName1FirstPeriod"] not in FirstPeriodClasses:
			FirstPeriodClasses[choice["ClassName1FirstPeriod"]] = {}
			FirstPeriodClasses[choice["ClassName1FirstPeriod"]]["Registrants"] = []
			FirstPeriodClasses[choice["ClassName1FirstPeriod"]]["Leader"] = choice["Leader"]
			FirstPeriodClasses[choice["ClassName1FirstPeriod"]]["Count"] = 0
			FirstPeriodClasses[choice["ClassName1FirstPeriod"]]["Limit"] = Limits[choice["ClassName1FirstPeriod"]]
		if len(choice["ClassName2FirstPeriod"]) > 0 and choice["ClassName2FirstPeriod"] != "None" and choice["ClassName2FirstPeriod"] not in FirstPeriodClasses:
			FirstPeriodClasses[choice["ClassName2FirstPeriod"]] = {}
			FirstPeriodClasses[choice["ClassName2FirstPeriod"]]["Registrants"] = []
			FirstPeriodClasses[choice["ClassName2FirstPeriod"]]["Leader"] = choice["Leader2"]
			FirstPeriodClasses[choice["ClassName2FirstPeriod"]]["Count"] = 0
			FirstPeriodClasses[choice["ClassName2FirstPeriod"]]["Limit"] = Limits[choice["ClassName2FirstPeriod"]]
	# Get second period class
	for choice in registration["ClassRegistration"]["MorningSecondPeriod"]:
		if len(choice["ClassName1SecondPeriod"]) > 0 and choice["ClassName1SecondPeriod"] != "None" and choice["ClassName1SecondPeriod"] not in SecondPeriodClasses:
			SecondPeriodClasses[choice["ClassName1SecondPeriod"]] = {}
			SecondPeriodClasses[choice["ClassName1SecondPeriod"]]["Registrants"] = []
			SecondPeriodClasses[choice["ClassName1SecondPeriod"]]["Leader"] = choice["Leader"]
			SecondPeriodClasses[choice["ClassName1SecondPeriod"]]["Count"] = 0
		if len(choice["ClassName2SecondPeriod"]) > 0 and choice["ClassName2SecondPeriod"] != "None" and choice["ClassName2SecondPeriod"] not in SecondPeriodClasses:
			SecondPeriodClasses[choice["ClassName2SecondPeriod"]] = {}
			SecondPeriodClasses[choice["ClassName2SecondPeriod"]]["Registrants"] = []
			SecondPeriodClasses[choice["ClassName2SecondPeriod"]]["Leader"] = choice["Leader2"]
			SecondPeriodClasses[choice["ClassName2SecondPeriod"]]["Count"] = 0
	# Get third period class
	for choice in registration["ClassRegistration"]["AfternoonPeriod"]:
		if len(choice["ClassName1ThirdPeriod"]) > 0 and choice["ClassName1ThirdPeriod"] != "None" and choice["ClassName1ThirdPeriod"] not in ThirdPeriodClasses:
			ThirdPeriodClasses[choice["ClassName1ThirdPeriod"]] = {}
			ThirdPeriodClasses[choice["ClassName1ThirdPeriod"]]["Registrants"] = []
			ThirdPeriodClasses[choice["ClassName1ThirdPeriod"]]["Leader"] = choice["Leader"]
			ThirdPeriodClasses[choice["ClassName1ThirdPeriod"]]["Count"] = 0
		if len(choice["ClassName2ThirdPeriod"]) > 0 and choice["ClassName2ThirdPeriod"] != "None" and choice["ClassName2ThirdPeriod"] not in ThirdPeriodClasses:
			ThirdPeriodClasses[choice["ClassName2ThirdPeriod"]] = {}
			ThirdPeriodClasses[choice["ClassName2ThirdPeriod"]]["Registrants"] = []
			ThirdPeriodClasses[choice["ClassName2ThirdPeriod"]]["Leader"] = choice["Leader2"]
			ThirdPeriodClasses[choice["ClassName2ThirdPeriod"]]["Count"] = 0

# We have the available classes, now start adding the actual choices
for registration in schedules:
	register_for_class("ClassName1FirstPeriod",FirstPeriodClasses,registration,registration["ClassRegistration"]["MorningFirstPeriod"])
	register_for_class("ClassName2FirstPeriod",FirstPeriodClasses,registration,registration["ClassRegistration"]["MorningFirstPeriod"])

	register_for_class("ClassName1SecondPeriod",SecondPeriodClasses,registration,registration["ClassRegistration"]["MorningSecondPeriod"])
	register_for_class("ClassName2SecondPeriod",SecondPeriodClasses,registration,registration["ClassRegistration"]["MorningSecondPeriod"])

	register_for_class("ClassName1ThirdPeriod",ThirdPeriodClasses,registration,registration["ClassRegistration"]["AfternoonPeriod"])
	register_for_class("ClassName2ThirdPeriod",ThirdPeriodClasses,registration,registration["ClassRegistration"]["AfternoonPeriod"])

AllClasses.append(FirstPeriodClasses)
AllClasses.append(SecondPeriodClasses)
AllClasses.append(ThirdPeriodClasses)

with open('by_class.json', 'w') as output:
	json.dump(AllClasses,output)

with open('by_person.json', 'w') as output:
	json.dump(collate_by_person(AllClasses), output)