$(".schedule-style-switch").click(function() {
	$(this).toggleClass('active');
	addWrapperClasses();
});

$(".schedule-switch").click(function() {
	$(this).addClass('active');
	$(".list-switch").removeClass('active');

	//Toggle checkmark switches
	$(".schedule-switches").addClass("active-content");

	$(".staff-lists").removeClass("active-content");
	$(".class-schedules").addClass("active-content");
});

$(".list-switch").click(function() {
	$(this).addClass('active');
	$(".schedule-switch").removeClass('active');

	//Toggle checkmark switches
	$(".schedule-switches").removeClass("active-content");

	$(".class-schedules").removeClass("active-content");
	$(".staff-lists").addClass("active-content");
});

function addWrapperClasses() {
	if($("#background.active").length) {
		swapClasses("numbers","checkmark");
	}
	else {
		swapClasses("checkmark","numbers");
	}

	if($("#colors.active").length) {
		swapClasses("colors","greyscale");
	}
	else {
		swapClasses("greyscale","colors");
	}
}

function swapClasses(toAdd,toRemove) {
	$(".wrapper").addClass(toAdd);
	$(".wrapper").removeClass(toRemove);
}