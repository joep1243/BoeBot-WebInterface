<?php
include("../views/header.php");
include("../controller/diagnose.php");
?>
<body>

<div class="container">
  <h2 id="pagetitel"> Diagnose </h2>
  <form method="post">
      <div class="diagnoseALL">
      <div class="container">   

        <?php
            $diagnostics = json_decode(getdiagnose(), true);


            foreach($diagnostics AS $diagnostic => $item){
                if($item == 'true'){
                    //print'background-color: #8FE58F;';
                    $color = '#8FE58F';
                }else{
                    //print'background-color: #F25B5B;';
                    $color = '#F25B5B';
                } 

                print'<div class="diagnoseITEM" style="background-color:'.$color.';"><a id="ITEMtext">'.$diagnostic.'</a></div>';

            }
    	?>
        </div>
      </div>
  </form>
</div>


