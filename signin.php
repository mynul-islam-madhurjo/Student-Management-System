<?php
// first of all, we need to connect to the database
require_once('DBconnect.php');

//we need to check if the input in the form textfields are not empty
if(isset($_POST['fname']) && isset($_POST['pass'])){
	//write the query to check if this username and password exists in our database
	$u = $_POST['fname'];
	$p = $_POST['pass'];
	$sql = "SELECT * FROM admin WHERE admin_name= '$u' AND password= '$p'";

	$result = mysqli_query($conn,$sql);

	if(mysqli_num_rows($result)!=0){
		header("Location: home.php");
	}
	else{
		header("Location: index.php");
	}
}

?>
