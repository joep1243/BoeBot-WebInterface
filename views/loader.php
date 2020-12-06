<?php
// get database connection
include_once '../models/db.php';
// instantiate BotAccount object
include_once '../models/user.php';

// instantiate BotAccount object
include_once '../controller/loader.php';

$database = new Database();
$db = $database->getConnection();

$User = new User($db);

session_start();

//Login Check IMPORTANT
$key = $_SESSION['KEY'];
$AKEY = $_GET['KEY'];
$User->LoginCheck($AKEY);

//set command to 3 for diagnose
setcommand(3);

header("refresh:10; url=../diagnose.php/?KEY=$key"); 

?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
</head>
<body>
<div class="loader"></div>
</body>
</html>