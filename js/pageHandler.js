//Function to hide sign in methods and display otp box
function otpboxUSER() {
	document.getElementById('signIn_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_content_user').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_dialogue_user').setAttribute('class', 'modal-dialog modal-sm');
}

function otpboxSME() {
	document.getElementById('signIn_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_content_sme').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_dialogue_sme').setAttribute('class', 'modal-dialog modal-sm');
}

function hideuserOTPsection() {
	console.log("called user");
	document.getElementById('signIn_modal_content_user').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_dialogue_user').setAttribute('class', 'modal-dialog');
}

function hidesmeOTPsection() {
	console.log("called sme");
	document.getElementById('signIn_modal_content_sme').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_dialogue_sme').setAttribute('class', 'modal-dialog');
}

function forgotPassworduser() {
	console.log("forgot");
	document.getElementById('signIn_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_user').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_dialogue_user').setAttribute('class', 'modal-dialog modal-sm');
}

function forgotPasswordsme() {
	console.log("forgot");
	document.getElementById('signIn_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_sme').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_dialogue_sme').setAttribute('class', 'modal-dialog modal-sm');
}

function sme_dashboard() {
	document.getElementById('sme_profile').setAttribute('style', 'display: none;');
}

function viewSMEprofile() {
	document.getElementById('section1').setAttribute('style', 'display: none;');
	document.getElementById('sme_profile').setAttribute('style', 'display: block;');
}

function viewSections() {
	document.getElementById('section1').setAttribute('style', 'display: block;');
	document.getElementById('sme_profile').setAttribute('style', 'display: none;');
}

/*
function thoughtChecker() {
	var smethoughts = document.getElementById('SMEthoughts');
	if (smethoughts.value != '') {
		$('#acceptClientRequest').modal('show');
	} else {
		$('.error').text('Please give your thoughts...!');
		$('.error').fadeIn('slow');
		setTimeout(function () {
			$('.error').fadeOut('slow');
		}, 3000);
	}
}
*/

var mode_id = "";

function onlyOne(checkbox) {
	mode_id = checkbox.id;
	var checkboxes = document.getElementsByName('consultation_mode')
	checkboxes.forEach((item) => {
		if (item !== checkbox) item.checked = false
	})

	if (mode_id == 'chat' || mode_id == 'call') {
		if (document.getElementById(mode_id).checked) {
			document.getElementById('appointment').style.display = "block";
		} else {
			document.getElementById('appointment').style.display = "none";
		}
	} else {
		document.getElementById('appointment').style.display = "none";
	}
}

var date_id = "";

function onlyOneDate(checkbox) {
	date_id = checkbox.id;
	var checkboxes = document.getElementsByName('date_choice')
	checkboxes.forEach((item) => {
		if (item !== checkbox) item.checked = false
	})
	// alert(date_id);
}

function finalValidation() {
	console.log("final");
	if (mode_id == '') {
		alert("Choose one mode");
		document.getElementById('finalValidate').checked = false;
	} else {
		if (mode_id == 'chat' || mode_id == 'call') {
			var date1 = document.getElementById('date1').value;
			var date2 = document.getElementById('date2').value;
			var date3 = document.getElementById('date3').value;

			var start1 = document.getElementById('startone').value;
			var end1 = document.getElementById('one').value;

			var start2 = document.getElementById('starttwo').value;
			var end2 = document.getElementById('two').value;

			var start3 = document.getElementById('startthree').value;
			var end3 = document.getElementById('three').value;

			if (date1.length != 0 && date2.length != 0 && date3.length != 0 && start1.length != 0 && end1.length != 0 && start2.length != 0 && end2.length != 0 && start3.length != 0 && end3.length != 0) {
				var today = new Date();
				var dd = today.getDate();
				var mm = today.getMonth() + 1;
				var yyyy = today.getFullYear();

				if (dd < 10) {
					dd = '0' + dd;
				}

				if (mm < 10) {
					mm = '0' + mm;
				}

				today = yyyy + '-' + mm + '-' + dd;
				var checkround1 = compare_dates(new Date(date1), new Date(today));
				var checkround2 = compare_dates(new Date(date2), new Date(today));
				var checkround3 = compare_dates(new Date(date3), new Date(today));
				if (checkround1 == true && checkround2 == true && checkround3 == true) {
					var split1a = start1.split(":");
					var split1b = end1.split(":");
					var split2a = start2.split(":");
					var split2b = end2.split(":");
					var split3a = start3.split(":");
					var split3b = end3.split(":");
					if (parseInt(split1a[0]) < parseInt(split1b[0])) {
						if (parseInt(split2a[0]) < parseInt(split2b[0])) {
							if (parseInt(split3a[0]) < parseInt(split3b[0])) {
								alert("Success");
								alert("send data to backend");

							} else {
								alert("Start time is after end time");
								// document.getElementById('finalValidate').checked = false;
							}

						} else {
							alert("Start time is after end time");
							// document.getElementById('finalValidate').checked = false;
						}
					} else {
						alert("Start time is after end time");
						// document.getElementById('finalValidate').checked = false;
					}
				} else {
					alert("Choose any date after today");
					// document.getElementById('finalValidate').checked = false;
				}
			} else {
				alert("Please fill all fields");
				// document.getElementById('finalValidate').checked = false;
			}
		} else {
			alert("success with email");
		}
	}
}

var compare_dates = function (check1, check2) {
	if (check1 > check2) return true;
	else return false;
}

function dateChecker(data) {
	var date = document.getElementById(data.id).value;
	var date_error = "id" + data.id;
	console.log(date_error);
	if (date.length != 0) {
		var today = new Date();
		var dd = today.getDate();
		var mm = today.getMonth() + 1;
		var yyyy = today.getFullYear();

		if (dd < 10) {
			dd = '0' + dd;
		}

		if (mm < 10) {
			mm = '0' + mm;
		}

		today = yyyy + '-' + mm + '-' + dd;
		console.log(date, today);
		var checkround = compare_dates(new Date(date), new Date(today));
		console.log(checkround);
		if (checkround == false) {
			$('#' + date_error).text('Please give a future date');
			$('#' + date_error).fadeIn('slow');
			setTimeout(function () {
				$('#' + date_error).fadeOut('slow');
			}, 3000);


			document.getElementById(data.id).value = "";
		}
	}


}

function timeChecker(data) {
	console.log(data.id);
	time_error = "id" + data.id;
	var end = document.getElementById(data.id).value;
	var start = document.getElementById("start" + data.id).value;
	var splitstart = start.split(":");
	var splitend = end.split(":");
	if (parseInt(splitstart[0]) < parseInt(splitend[0])) {
		// alert("success");
	} else if (parseInt(splitstart[0]) == parseInt(splitend[0])) {
		$('#' + time_error).text('Duration must be atleast for an hour');
		$('#' + time_error).fadeIn('slow');
		setTimeout(function () {
			$('#' + time_error).fadeOut('slow');
		}, 3000);

		document.getElementById(data.id).value = "";
		document.getElementById("start" + data.id).value = "";

	} else {
		$('#' + time_error).text('Start time is ahead of end time');
		$('#' + time_error).fadeIn('slow');
		setTimeout(function () {
			$('#' + time_error).fadeOut('slow');
		}, 3000);

		document.getElementById(data.id).value = "";
		document.getElementById("start" + data.id).value = "";
	}
}

function cancelConsultation(id) {
	//$('#cancelConsultation').modal('show');
	var datesplit = id.split("_");
	var fixed_date = document.getElementById('consultation_' + datesplit[1]).innerHTML;
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth() + 1;
	var yyyy = today.getFullYear();

	if (dd < 10) {
		dd = '0' + dd;
	}

	if (mm < 10) {
		mm = '0' + mm;
	}

	today = yyyy + '-' + mm + '-' + dd;

	var check_duration = compare_duration(new Date(fixed_date), new Date(today));
	if (check_duration == true) {
		var check_duration2 = compare_duration2(new Date(fixed_date), new Date(today));
		if (check_duration2 == true) {
			alert("Cancel allowed");
			$('#cancelConsultation').modal('show');
		} else {
			var consultation_time = document.getElementById('consultation_time_' + datesplit[1]).innerHTML;
			var timeplit = consultation_time.split(":");
			var d = new Date();
			var h = d.getHours();
			var timediff = parseInt(timeplit) - h;
			if (timediff > 7) {
				alert("cancel allowed");
				$('#cancelConsultation').modal('show');
			} else {
				alert("cancel not allowed");

			}
		}
	} else {
		alert("cancel not allowed");

	}
}

var compare_duration = function (check1, check2) {
	if (check1 >= check2) return true;
	else return false;
}
var compare_duration2 = function (check1, check2) {
	if (check1 > check2) return true;
	else return false;
}