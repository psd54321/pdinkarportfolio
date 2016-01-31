<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
$errors = array(); // array to hold validation errors
$data = array(); // array to pass back data
// validate the variables ======================================================
if (empty($_POST['name']))
$errors['name'] = 'Name is required.';
if (empty($_POST['email']))
$errors['email'] = 'Email is required.';
if (empty($_POST['message']))
$errors['message'] = 'Message is required.';
// return a response ===========================================================
// response if there are errors
if ( ! empty($errors)) {
  // if there are items in our errors array, return those errors
  $data['success'] = false;
  $data['errors'] = $errors;
  $data['messageError'] = 'Please check the fields in red';
} else {
  // if there are no errors, return a message
  $data['success'] = true;
  
  // CHANGE THE TWO LINES BELOW
  $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $to = "prathamesh.dinkar.123@gmail.com";
    $subject = "Portfolio: Message from " . $name;
    $headers = "MIME-Version: 1.0" . "\r\n" . "Content-type:text/html;charset=UTF-8" . "\r\n" . "From:" . $email;
    
    //echo 'Name is:: '. $name . 'Email is:: '. $email . 'Message is:: '. $message;
    $ret=mail($to,$subject,$message,$headers);

    $data['messageSuccess'] = 'Hey! Thanks for reaching out. I will get back to you soon';
}
// return all our data to an AJAX call
echo json_encode($data);
?>