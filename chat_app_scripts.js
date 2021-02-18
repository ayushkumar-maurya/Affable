function msgFormat(who) {
	var msgDiv = document.createElement("DIV");
	if(who == 0)
		msgDiv.setAttribute("class", "alert alert-primary");
	else
		msgDiv.setAttribute("class", "alert alert-success");
	msgDiv.setAttribute("role", "alert");
	return msgDiv;
}

function retrieve_chats(userid, questionid) {
	$.ajax({
		url: "retrieve_chats.php",
		method: "POST",
		data: {userid:userid, msgCnt:msgCnt, questionid:questionid},
		success: function(msgs) {
			var msgs = JSON.parse(msgs);
			for(var msg of msgs) {
				var msgDiv = msgFormat(msg[4]);

				var html = "";
				if(msg[0] != '')
					html += (msg[0] + "<br>");
				if(msg[1] != '')
					html += ("Download <a href='attachments/" + msg[2] + "' class='alert-link' download>" + msg[1] + "</a><br>");
				html += "<span class='date-time'>" + msg[3] + "</span>";

				msgDiv.innerHTML = html;
				document.getElementById("chats").appendChild(msgDiv);
				
				/*
				$("#chats").animate({ 
                    scrollTop: document.getElementById("chats").scrollHeight 
                }, 0); 
				*/

				msgCnt++;
			}
		}
	});
}

var msgCnt = 0;
var ID = 0;
function chat(userid, user, questionid) {
	document.getElementById("chats").innerHTML = "";
	msgCnt = 0;
	window.clearInterval(ID);
	ID = window.setInterval(retrieve_chats, 1000, userid, questionid);

	document.getElementById("chatModalLabel").innerHTML = user;
	document.getElementById("msg").value = "";

	document.getElementById("send-msg").setAttribute("onclick", "sendMsg('"+ userid +"', '" + questionid + "')");
	// document.getElementById("clr-msgs").setAttribute("onclick", "clearChats('"+ userid +"', '" + user + "')");

	$('#connectToChat').modal('show');
}

function sendMsg(userid, questionid) {
	var msg = document.getElementById("msg").value;
	// var attachedFile = $('#attachedFile')[0].files[0];

	var formData = new FormData();
	formData.append('userid', userid);
	formData.append('msg', msg);
	formData.append('questionid', questionid);
	// formData.append('attachedFile',attachedFile);

	$.ajax({
		url: "send_message.php",
		method: "POST",
		data: formData,
		contentType: false,
		processData: false,
		success: function() {
			document.getElementById("msg").value = "";
			// document.getElementById("attachedFile").value = "";
		}
	});
}
