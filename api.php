<?php
//simple api for database insertion
// Citation

/***
  Ismail, M. H. (2021, July 11). Android: Building a Simple RESTful Client-Server Application. Coding Malaya. https://youtu.be/LjWyxm5HPK8
***/

require_once('db.php');

 if (!isset($_POST['name']) && !isset($_POST['note']) ){
   die("Error incomplete HTTP request");
 }

 //if (strlen($_POST['name']) < 10  || strlen($_POST['note'])<10 ) {

 //  die("Error please fill in the form");

 //}

//filter all inputs for securing
$POSTV = filter_input_array(INPUT_POST,
    ['name' => FILTER_SANITIZE_STRING,
     'email' => FILTER_SANITIZE_STRING,
     'phone' => FILTER_SANITIZE_STRING,
     'note' => FILTER_SANITIZE_STRING,
    ]
);
$name = $POSTV['name'];
$email = $POSTV['email'];
$phone = $POSTV['phone'];
$addr = $_SERVER['REMOTE_ADDR'];
$note = $POSTV['note'];
$agent = $_SERVER['HTTP_USER_AGENT'];

$query= "INSERT INTO checkin (id, name, email, phone, ip_address, user_agent, note)
VALUES (NULL,'$name','$email', '$phone', '$addr','$agent','$note')";

$result=mysqli_query($link, $query);

if (!$result) {

  echo mysqli_error($link);

} else {

echo "User Check In Feedback Posted";
}
 ?>