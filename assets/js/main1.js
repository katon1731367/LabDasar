$(document).ready(function () {
	$(".username input").focus(function () {
		$(".username").addClass("focus");
	});

	$("input[name=nim]").blur(function () {
		if ($(this).val().length == 0) {
			$(".username").removeClass("focus");
		}
	});

	$("input[name=password]").blur(function () {
		if ($(this).val().length == 0) {
			$(".password").removeClass("focus");
		}
	});

	$(".password input").focus(function () {
		$(".password").addClass("focus");
	});
});



 