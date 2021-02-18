var compare_dates = function (check1, check2) {
	if (check1 > check2) return true;
	else return false;
}

function dateChecker(data) {
	var date = document.getElementById(data.id).value;
	var date_error = "id" + data.id;
	console.log(date_error);
	if (date.length !== 0) {
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
		if (checkround === false) {
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
	if (check_duration === true) {
		var check_duration2 = compare_duration2(new Date(fixed_date), new Date(today));
		if (check_duration2 === true) {
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
};
var compare_duration2 = function (check1, check2) {
	if (check1 > check2) return true;
	else return false;
};