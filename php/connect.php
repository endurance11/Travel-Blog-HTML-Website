<?php
if (isset($_POST['Submit'])) {
    if (isset($_POST['Name']) && isset($_POST['Email']) &&
        isset($_POST['Telephone']) && isset($_POST['Suggestions'])) {
        
        $Name = $_POST['Name'];
        $Email = $_POST['Email'];
        $Telephone = $_POST['Telephone'];
        $Suggestions = $_POST['Suggestions'];
        $conn = new mysqli('localhost','root','','test');
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT Email FROM query WHERE Email = ? LIMIT 1";
            $Insert = "INSERT INTO query(Name, Email, Telephone, Suggestions)values(?,?,?,?)";
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $Email);
            $stmt->execute();
            $stmt->bind_result($Email);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssis",$Name, $Email, $Telephone, $Suggestions);
                if ($stmt->execute()) {
                    ?>
			<script>
				alert('Query submitted successfully');
			</script>
	
			<?php
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                ?>
			<script>
			alert('Someone is already registered using this email');
			</script>
		<?php
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
           ?>
			<script>
			alert('All fields are required');
			</script>
		<?php
        die();
    }
}
else {
?>
    <script>
      alert('Submit button is not set');
    </script>
<?php
}
?>