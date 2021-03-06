<?php
include_once '../models/db.php';
// instantiate BotAccount object
include_once '../models/user.php';

$database = new Database();
$db = $database->getConnection();

$User = new User($db);

session_start();

//Login Check IMPORTANT
$key = $_SESSION['KEY'];
$AKEY = $_GET['KEY'];
$User->LoginCheck($AKEY);

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BoeBot</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var x; 
            function update() {
                    $.ajax({
                        //  cache: false,
                        type: "GET",
                        url: "../getonline.php",
                        datatype: "text",
                        data: 'action=call',
                        success: function (x, status, xhr)
                            {
                                var name = x.split(".")[0];
                                var color = x.split(".")[1];

                                document.getElementById('botonl').innerHTML =name;

                                document.getElementById('botonl').style.background =color;

                            }
                    });
            }

        
            $(document).ready(update); // Call on page load
            //                ^^^^^^
            setInterval(update, 10000); //every 10 secs
            //          ^^^^^^
    </script>
</head>
<div class='container-fluid' style="border-bottom:solid 1.5px #eee; height:50px;">
    <div class='container' style="padding: 0 auto;">
        <?php echo '<a id="btnNav" href="../home.php/?KEY='.$key.'"> Home </a>';?>
        <div id="botonl">Bot</div>  
    </div>
</div>



