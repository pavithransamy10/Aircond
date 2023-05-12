<?php
error_reporting(0);
$Server = "127.0.0.1";
$Username = "root";
$Password = "";
$DB = "aircond";
$Connection = mysqli_connect($Server, $Username, $Password, $DB);



  //check whether submit button is pressed or not
if((isset($_POST['submit'])))
{
  //fetching and storing the form data in variables
$Name = $Connection->real_escape_string($_POST['name']);
$Email = $Connection->real_escape_string($_POST['email']);
$Phone = $Connection->real_escape_string($_POST['contact']);
$comments = $Connection->real_escape_string($_POST['text']);
  //query to insert the variable data into the database
$sql="INSERT INTO aircond (name, email, phone, comments) VALUES ('".$Name."','".$Email."', '".$Phone."', '".$comments."')";
  //Execute the query and returning a message
if(!$result = $Connection->query($sql)){
die('Error occured [' . $conn->error . ']');
}
else
   header('Location: Thank You page.php');
}
?>