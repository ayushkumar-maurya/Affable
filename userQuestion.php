<?php include "connection.php"; ?>
<script src="js/jquery-2.2.4.min.js"></script>

<html>
	<body>
		<form>
		<input type="text" name="client-email" placeholder="<?= $_SESSION['email'] ?>" disabled>
			<br><br>
			<select id="category" name="category">
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
			<input type="button" id="submit" name="submit" value="Post your question" disabled>
			<div id="status" style="display: none;"></div>
		</form>
	</body>

	<script>
		$(document).ready(function() {
			$('#submit').click(function() {
				var category = document.getElementById("category").value;
				var topic = document.getElementById("topic").value.trim();
				var question = document.getElementById("question").value.trim();
				var error = 0;

				if(topic.length == 0)
					error = "Please fill out Topic field."
				else if(question.length == 0)
					error = "Please fill out question field."		
				
				if(error != 0) {
					document.getElementById("status").innerHTML = error;
					document.getElementById("status").style.display = "block";
				}
				
				else {
					$.ajax({
						url: "userQuestion_entry.php",
						method: "POST",
						data: {category:category, topic: topic, question: question},
						success: function(status) {
							if(status == 1) {
								document.getElementById("status").innerHTML = "Your question has been sent to our SME for review.";
								document.getElementById("status").style.display = "block";
							}
						}
					});
				}
			});
		});
	</script>
</html>
