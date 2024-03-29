<?php
//simple script to view comments
// Citation

/***
  Ismail, M. H. (2021, July 11). Android: Building a Simple RESTful Client-Server Application. Coding Malaya. https://youtu.be/LjWyxm5HPK8
***/

require_once('db.php');

//select all row from table checkin
$query = "SELECT * FROM checkin ORDER BY date DESC";
$result=mysqli_query($link,$query);
?>
<!doctype html>
<html>
<head>
  <title>DR ONCALL Mobile Application</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<style>
body {
  background-color: #fed8b1;
}
</style>
<body>

<h1><center>DR ONCALL | View User CheckIn Feedback</center></h1>
<ol>
<?php foreach ($result as $row) {

?>
<li>
    <ul>
        <li><small>Check-inID: <?=$row['id']?></small></li>
        <li><small>Date: <?=$row['date']?></small></li>
        <li><small>User Agent: <?=$row['user_agent']?></small></li>
        <li><small>Phone: <?=$row['phone']?></small></li>
        <li><a href="mailto:<?=$row['email']?>"">
        <?=$row['name']?></a> Gives feedback.. <br />
        <blockquote><em><?=$row['note']?></em></blockquote></li>
</ul><br />
</li>
<?php } ?>
</ol>
</body>
</html>