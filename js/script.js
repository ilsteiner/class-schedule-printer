$(".switch").click(function() {
	$(this).toggleClass('active');
	console.log("Triggered");
	addWrapperClasses();
});

$(".content-toggle").click(function() {
	$(".class-schedules").toggleClass("active-content");
	$(".staff-lists").toggleClass("active-content");
	$(".schedule-switches").toggleClass("active-content");

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