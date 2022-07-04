<?php

session_start();

$mysqli = new mysqli('localhost', 'root', 'password', 'kontrolinis') or die(mysqli_error($mysqli));

$id = 0;
$name = '';
$surname = '';
$email = '';
$phone = '';
$subject = '';
$message = '';

if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mysqli->query("INSERT INTO contact_form (name, surname, email, phone, subject, message) VALUES('$name','$surname','$email','$phone', '$subject','$message')") or
    die($mysqli->error);

    $_SESSION['message'] = "Record has been saved!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM contact_form WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Record has been deleted!";
    $_SESSION['msg_type'] = "danger";

    header("location: output.php");
}

