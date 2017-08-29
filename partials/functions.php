<?php
	function getClasses($attendee) {
		$classes = array();

		insertClass($classes,(isset($attendee->ClassRegistration->MorningFirstPeriod[0]->ClassName1FirstPeriod) ? $attendee->ClassRegistration->MorningFirstPeriod[0]->ClassName1FirstPeriod : null),"first");
		insertClass($classes,(isset($attendee->ClassRegistration->MorningFirstPeriod[0]->ClassName2FirstPeriod) ? $attendee->ClassRegistration->MorningFirstPeriod[0]->ClassName2FirstPeriod : null),"first");
		insertClass($classes,(isset($attendee->ClassRegistration->MorningFirstPeriod[1]->ClassName1FirstPeriod) ? $attendee->ClassRegistration->MorningFirstPeriod[1]->ClassName1FirstPeriod : null),"second");
		insertClass($classes,(isset($attendee->ClassRegistration->MorningFirstPeriod[1]->ClassName2FirstPeriod) ? $attendee->ClassRegistration->MorningFirstPeriod[1]->ClassName2FirstPeriod : null),"second");
		insertClass($classes,(isset($attendee->ClassRegistration->MorningSecondPeriod[0]->ClassName1SecondPeriod) ? $attendee->ClassRegistration->MorningSecondPeriod[0]->ClassName1SecondPeriod : null),"first");
	    insertClass($classes,(isset($attendee->ClassRegistration->MorningSecondPeriod[0]->ClassName2SecondPeriod) ? $attendee->ClassRegistration->MorningSecondPeriod[0]->ClassName2SecondPeriod : null),"first");
	    insertClass($classes,(isset($attendee->ClassRegistration->MorningSecondPeriod[1]->ClassName1SecondPeriod) ? $attendee->ClassRegistration->MorningSecondPeriod[1]->ClassName1SecondPeriod : null),"second");
	    insertClass($classes,(isset($attendee->ClassRegistration->MorningSecondPeriod[1]->ClassName2SecondPeriod) ? $attendee->ClassRegistration->MorningSecondPeriod[1]->ClassName2SecondPeriod : null),"second");
		insertClass($classes,(isset($attendee->ClassRegistration->AfternoonPeriod[0]->ClassName1ThirdPeriod) ? $attendee->ClassRegistration->AfternoonPeriod[0]->ClassName1ThirdPeriod : null),"first");
	    insertClass($classes,(isset($attendee->ClassRegistration->AfternoonPeriod[0]->ClassName2ThirdPeriod) ? $attendee->ClassRegistration->AfternoonPeriod[0]->ClassName2ThirdPeriod : null),"first");
	    insertClass($classes,(isset($attendee->ClassRegistration->AfternoonPeriod[1]->ClassName1ThirdPeriod) ? $attendee->ClassRegistration->AfternoonPeriod[1]->ClassName1ThirdPeriod : null),"second");
	    insertClass($classes,(isset($attendee->ClassRegistration->AfternoonPeriod[1]->ClassName2ThirdPeriod) ? $attendee->ClassRegistration->AfternoonPeriod[1]->ClassName2ThirdPeriod : null),"second");

	    return $classes;
	}

	function insertClass(&$classes,$classSelector,$priority) {
		if(isset($classSelector)) {
			$classes[strtolower(preg_replace("/[_\W]+/","-",preg_replace("/[()']+/","",$classSelector)))] = $priority;
		}
	}