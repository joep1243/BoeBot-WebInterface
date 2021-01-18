<?php
include("../views/header.php");
include("../controller/log.php");
?>
<body>

<div class="container">
  <h2 id="pagetitel"> LOG </h2>
  <form method="post">
      <div class="diagnoseALL">
      <div class="container">   

        <?php
            $logs = json_decode(getlog(), true);

            foreach($logs AS $log => $item ){

                print'<div class="logITEM"><a id="logITEMtext">'.$log.' = '.$item.'</a></div>';

            }  
    	?>
        </div>
      </div>
  </form>
</div>