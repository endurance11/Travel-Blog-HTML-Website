<?php

$email = $_POST["email"];
$password = $_POST["password"];

$conn = new mysqli('localhost', 'root', '' , 'test');
if($conn->connect_error){
	die("connection failed");
}
else{
$Insert = "INSERT INTO sign(email, password)values(?,?)";
$stmt = $conn->prepare($Insert);
$stmt->bind_param("ss", $email, $password);
if ($stmt->execute()) {
	?>
	<script>
		alert('Login successful');
	</script>
	
	<?php
}
else{
	?>
	<script>
		alert('Login failed');
	</script>
	<?php
}
$stmt->close();
$conn->close();
}
?>