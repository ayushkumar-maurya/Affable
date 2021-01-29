<?php
	include "connection.php";

	if(isset($_POST['submit'])) {
		$category = $_POST['category'];
		$topic = trim($_POST['topic']);
		$question = trim($_POST['question']);
		
		$sql = "INSERT INTO userquestion(category, topic, question, email) values(:category, :topic, :question, :email)";
		$stmt = $conn->prepare($sql);
		$stmt->execute(array(
			':category' => $category,
			':topic' => $topic,
			':question' => $question,
			':email' => $_SESSION['email']
		));
	
		echo "<script>alert('Your question has been sent to our SME for review.');</script>";

		$subject = "Question has been sent to our SME";
		$message = 'Your question has been sent to our SME for review.';

		$header = "MIME-Version: 1.0 \r\n";
		$header .= "Content-Type: text/html; charset=UTF-8 \r\n";
		
		mail($_SESSION['email'], $subject, $message, $header);
	}
?>

<script>
	function validate() {
		var topic = document.getElementById("topic").value.trim();
		var question = document.getElementById("question").value.trim();
		
		if(topic.length == 0) {
			document.getElementById("error").innerHTML = "Please fill out Topic field.";
			document.getElementById("error").style.display = "block";
			return false;
		}
		else if(question.length == 0) {
			document.getElementById("error").innerHTML = "Please fill out question field.";
			document.getElementById("error").style.display = "block";
			return false;
		}
		return true;
	}
</script>

<html>
	<body>
		<form onsubmit="return validate()" action="/Affable/userQuestion.php" method="post">
			<input type="text" name="client-email" placeholder="<?= $_SESSION['email'] ?>" disabled>
			<br><br>
			<select name="category">
			<?php
				$stmt = $conn->prepare("SELECT categoryName FROM category ORDER BY categoryName");
				$stmt->execute();
				while($row = $stmt->fetch(PDO::FETCH_ASSOC))
					echo "<option>".htmlentities($row['categoryName'])."</option>";
			?>
			</select>
			<br><br>
			<input type="text" id="topic" name="topic" placeholder="Topic">
			<br><br>
			<textarea id="question" name="question" placeholder="Question"></textarea>
			<br><br>
			<input type="checkbox" onchange="document.getElementById('submit').disabled = !this.checked;" name="confirm" value="confirm">By checking this you confirm to consult our SME
			<br><br>
			<input type="submit" id="submit" name="submit" value="Post your question" disabled>
			<div id="error" style="display: none;"></div>
		</form>
	</body>
</html>
