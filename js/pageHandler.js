//Function to hide sign in methods and display otp box
function otpboxUSER(){
	document.getElementById('signIn_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_content_user').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_dialogue_user').setAttribute('class', 'modal-dialog modal-sm');
}

function otpboxSME(){
	document.getElementById('signIn_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_content_sme').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_dialogue_sme').setAttribute('class', 'modal-dialog modal-sm');
}

function hideuserOTPsection(){
	console.log("called user");
	document.getElementById('signIn_modal_content_user').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_dialogue_user').setAttribute('class', 'modal-dialog');
}

function hidesmeOTPsection(){
	console.log("called sme");
	document.getElementById('signIn_modal_content_sme').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_dialogue_sme').setAttribute('class', 'modal-dialog');
}

function forgotPassworduser(){
	console.log("forgot");
	document.getElementById('signIn_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_user').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_content_user').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_dialogue_user').setAttribute('class', 'modal-dialog modal-sm');
}
function forgotPasswordsme(){
	console.log("forgot");
	document.getElementById('signIn_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('forgot_password_modal_content_sme').setAttribute('style', 'display: block');
	document.getElementById('otp_modal_content_sme').setAttribute('style', 'display: none');
	document.getElementById('otp_modal_dialogue_sme').setAttribute('class', 'modal-dialog modal-sm');
}

function sme_dashboard(){
	document.getElementById('sme_profile').setAttribute('style', 'display: none;');
}

function viewSMEprofile(){
	document.getElementById('section1').setAttribute('style', 'display: none;');
	document.getElementById('sme_profile').setAttribute('style', 'display: block;');
}