<?php
session_start();
require 'connection.php';

if(isset($_POST['pending']))
{
    $student_id = mysqli_real_escape_string($Connection, $_POST['pending']);

    $query = "insert aircond select * from complete WHERE id='$student_id'  ";
    $query_run = mysqli_query($Connection, $query);

    if($query_run)
    {
		$query = "DELETE FROM complete WHERE id='$student_id' ";
    $query_run = mysqli_query($Connection, $query);
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location: view.php");
        exit(0);
    }
}
if(isset($_POST['going']))
{
    $student_id = mysqli_real_escape_string($Connection, $_POST['going']);

    $query = "insert going select * from aircond WHERE id='$student_id'  ";
    $query_run = mysqli_query($Connection, $query);

    if($query_run)
    {
		$query = "DELETE FROM aircond WHERE id='$student_id' ";
    $query_run = mysqli_query($Connection, $query);
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: on going.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location: on going.php");
        exit(0);
    }
}

if(isset($_POST['complete']))
{
    $student_id = mysqli_real_escape_string($Connection, $_POST['complete']);

    $query = "insert complete select * from going WHERE id='$student_id'  ";
    $query_run = mysqli_query($Connection, $query);

    if($query_run)
    {
		$query = "DELETE FROM going WHERE id='$student_id' ";
    $query_run = mysqli_query($Connection, $query);
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: complete.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location: complete.php");
        exit(0);
    }
}

if(isset($_POST['delete_student2']))
{
    $student_id = mysqli_real_escape_string($Connection, $_POST['delete_student2']);

    $query = "DELETE FROM going WHERE id='$student_id' ";
    $query_run = mysqli_query($Connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: on going.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location: on going.php");
        exit(0);
    }
}
if(isset($_POST['delete_student3']))
{
    $student_id = mysqli_real_escape_string($Connection, $_POST['delete_student3']);

    $query = "DELETE FROM complete WHERE id='$student_id' ";
    $query_run = mysqli_query($Connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: complete.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location: complete.php");
        exit(0);
    }
}
if(isset($_POST['delete_student']))
{
    $student_id = mysqli_real_escape_string($Connection, $_POST['delete_student']);

    $query = "DELETE FROM aircond WHERE id='$student_id' ";
    $query_run = mysqli_query($Connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Deleted Successfully";
        header("Location: view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    $student_id = mysqli_real_escape_string($Connection, $_POST['student_id']);

    $name = mysqli_real_escape_string($Connection, $_POST['name']);
    $email = mysqli_real_escape_string($Connection, $_POST['email']);
    $phone = mysqli_real_escape_string($Connection, $_POST['phone']);
    $comments = mysqli_real_escape_string($Connection, $_POST['comments']);

    $query = "UPDATE aircond SET Name='$name', email='$email', phone='$phone', comments='$comments' WHERE id='$student_id' ";
    $query_run = mysqli_query($Connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Updated Successfully";
        header("Location: view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Updated";
        header("Location: edit.php");
        exit(0);
    }

}
if(isset($_POST['update_student2']))
{
    $student_id = mysqli_real_escape_string($Connection, $_POST['student_id']);

    $name = mysqli_real_escape_string($Connection, $_POST['name']);
    $email = mysqli_real_escape_string($Connection, $_POST['email']);
    $phone = mysqli_real_escape_string($Connection, $_POST['phone']);
    $comments = mysqli_real_escape_string($Connection, $_POST['comments']);

    $query = "UPDATE going SET Name='$name', email='$email', phone='$phone', comments='$comments' WHERE id='$student_id' ";
    $query_run = mysqli_query($Connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Updated Successfully";
        header("Location: on going.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Updated";
        header("Location: on going.php");
        exit(0);
    }

}
if(isset($_POST['update_student3']))
{
    $student_id = mysqli_real_escape_string($Connection, $_POST['student_id']);

    $name = mysqli_real_escape_string($Connection, $_POST['name']);
    $email = mysqli_real_escape_string($Connection, $_POST['email']);
    $phone = mysqli_real_escape_string($Connection, $_POST['phone']);
    $comments = mysqli_real_escape_string($Connection, $_POST['comments']);

    $query = "UPDATE complete SET Name='$name', email='$email', phone='$phone', comments='$comments' WHERE id='$student_id' ";
    $query_run = mysqli_query($Connection, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Customer Updated Successfully";
        header("Location: complete.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Updated";
        header("Location: complete.php");
        exit(0);
    }

}
if(isset($_POST['save_student']))
{
    $name = mysqli_real_escape_string($Connection, $_POST['name']);
    $email = mysqli_real_escape_string($Connection, $_POST['email']);
    $phone = mysqli_real_escape_string($Connection, $_POST['phone']);
    $comments = mysqli_real_escape_string($Connection, $_POST['comments']);
	
    $query = "INSERT INTO aircond (Name,email,phone,comments) VALUES ('$name','$email','$phone','$comments')";

    $query_run = mysqli_query($Connection, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Customer Created Successfully";
        header("Location: view.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Customer Not Created";
        header("Location: view.php");
        exit(0);
    }
}

?>