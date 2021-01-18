<?php
include("../views/header.php");
include("../controller/diagnose.php");
include("../controller/loader.php");

setcommand(3);

?>
<body>

<div class="container">
  <h2 id="pagetitel"> Diagnose </h2>
  <form method="post">
      <div class="diagnoseALL">
      <div class="container">   
      <form method="post">

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

                print'<div class="diagnoseITEM" style="background-color:'.$color.';"><a id="ITEMtext">'.$diagnostic.'</a>
                <input class="btn btn-success BTNDIA" type="submit" id="Ja" name="'.$diagnostic.'J"  value="Ja">
                <input class="btn btn-danger BTNDIA" type="submit" id="Nee" name="'.$diagnostic.'N"  value="Nee">
                </div>';

                if(isset($_POST[$diagnostic.'J'])){
                    $value = $diagnostic;
                    
                    setdiagnose('true', $value);

                    header('Location: '.$_SERVER['REQUEST_URI']);
                }
                if(isset($_POST[$diagnostic.'N'])){
                    $value = $diagnostic;
                   
                    setdiagnose('false', $value);

                    header('Location: '.$_SERVER['REQUEST_URI']);
                 }

            }
        ?>
      </form>
        </div>
      </div>
  </form>
</div>



