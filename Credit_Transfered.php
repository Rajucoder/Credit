<!DOCTYPE html>
<html>
<head>
<title>Credit Transfer</title>
	<link rel="icon" href="logo.ico" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>

<!-- Laid8789621_codemania compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class = "container">
<br>
<?php
$id = $_POST['id'];
$name = $_POST['name'];
$current_credit = $_POST['current_credit'];
$work = 'Transfered_to';
$servername = "localhost";
$username = "id9035729_rajeshwari";
$password = "Rajeshwari";
$dbname = "id9035729_rajeshwari";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from user where id = '$id'";
//$result  = $conn->query($sql);
?>
<?php
$q = "insert into storage (id, name, current_credit,work) values ('$id', '$name', '$current_credit','$work')";

$result1  = $conn->query($q);

?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email Id</th>
      <th scope="col">Current Credit</th>
	  <th scope="col">Enter Credit to be transfered</th>
	  <th scope="col"> </th>
    </tr>
  </thead>
  <?php
  if ($result  = $conn->query($sql)) {
    while($row = $result->fetch_assoc()) {
	?>
	<tbody>
	<tr>
	   <td><?php echo " ".$row["id"]." ";?></td>
	   <td><?php echo " ".$row["name"]." ";?></td>
	   <td><?php echo " ".$row["email_id"]." ";?></td>
	   <td><?php echo " ".$row["current_credit"]." ";?></td>
	   <form method = "POST" action = "amount_transfered.php">
		<td><input type = "text" name = "amount">
		<input type="hidden" name="name" value="<?php echo $row["name"]; ?>"/>
	   <input type="hidden" name="email_id" value="<?php echo $row["email_id"]; ?>"/>
	   <input type="hidden" name="current_credit" value="<?php echo $row["current_credit"]; ?>"/>
		<td><input type="hidden" name="id" value="<?php echo $row["id"]; ?>"><button type = "submit" class="btn btn-success">Transfer</button></td></tr></tbody></form>
		<?php
    }
  }
?> 

</div>
</body>
</html>