$(".switch").click(function() {
	$(this).toggleClass('active');
	addWrapperClasses();
});

function addWrapperClasses() {
	if($("#background.active").length) {
		swapClasses("numbers","checkmark");
	}
	else {
		swapClasses("checkmark","numbers");
	}
	if($("#first-second.active").length) {
		swapClasses("both-choices","first-only");
	}
	else {
		swapClasses("first-only","both-choices");
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