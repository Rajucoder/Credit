<?php

//Do tomorrow morning


//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "quizdbase";
// Create connection
//$conn = new mysqli($servername, $username, $password, $dbname);
//$id = $_POST['id'];
//$topic = $_POST['topic'];
//echo $id;
//echo $_POST["amount"];
//$txt = $_POST["amount"];
//include 'view.php';
//echo $topic;
//if($var >= $txt)
?>

<!DOCTYPE html>
<html>
<head>
<title>Amount Transfered</title>
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
$current_credit = $_POST['current_credit'] + $_POST['amount'];

$amount = $_POST['amount'];
$work = 'Transfered_to';
$servername = "localhost";
$username = "id9035729_rajeshwari";
$password = "Rajeshwari";
$dbname = "id9035729_rajeshwari";
$credit = array();
$id_credit = array();
$i = 1;
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
//$sql = "select * from user1 where id <> '$id'";
//$result  = $conn->query($sql);
?>
<?php
$q = "select * from storage";

//$result  = $conn->query($q);
if ($result  = $conn->query($q)) {
 while($row = $result->fetch_assoc()) {
	 $credit[$i] = $row['current_credit'];
	 $id_credit[$i] = $row['id'];
	 $i++;
 }
 $current_credit_transferer = $credit[1] - $_POST['amount'];
}
 if($amount>$credit[1]){
	 ?>
	 <script type="text/javascript">
    alert("Invalid amount transfer or Credit more than your credit");
    window.location.href = "index.php";
</script>
	
<?php	
 }else{
	 $sql1 = "update user set current_credit = '$current_credit' where id = '$id_credit[2]'";
	 $result1  = $conn->query($sql1);
	 $sql2 = "update user set current_credit = '$current_credit_transferer' where id = '$id_credit[1]'";
	 $result2  = $conn->query($sql2);?>
	 <div class = "container">
    <nav class="navbar fixed-top">
	<div id = "nav">	<h5 id='time' style="text-align:right;"></h5>  </nav>
		<br><h1 class="text-center text-primary"> CLICK TO SEE EVERYONE's CREDIT </h1><br>
<br>
	 <form method = "POST" action = "index.php">
	  <div class="col-md-4 text-center">
	       <button type = "submit" id="singlebutton" name="singlebutton" class="btn btn-success center-block">Home</button></form></div>
<?php }
$sql = "TRUNCATE TABLE storage";
$result1  = $conn->query($sql);
?>
</div>
</body>
</html>