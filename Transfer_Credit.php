<!DOCTYPE html>
<html>
<head>
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
$servername = "localhost";
$username = "id9035729_rajeshwari";
$password = "Rajeshwari";
$dbname = "id9035729_rajeshwari";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "select * from user where id <> '$id'";
//$result  = $conn->query($sql);
?>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
	  <th scope="col">Current Credit</th>
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
	   <form method="post" action="Credit_Transfered.php">
        <td><input type="hidden" name="id1" value="<?php echo $row["id"]; ?>"><button type = "submit" class="btn btn-success">Transfer</button></a></td></tr></tbody></form>
		<?php
    }
  }
?> 
</div>
</body>
</html>