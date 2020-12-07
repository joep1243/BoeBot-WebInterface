<?php
include("../views/header.php");
include("../controller/route.php");
$routedata = getroutedata();
ob_flush();
?>
<script>

    /*var response; 
            function update() {
                    $.ajax({
                        //  cache: false,
                        type: "GET",
                        url: "../getblokade.php",
                        datatype: "json",
                        data: 'action=call',
                        success: function (response, status, xhr)
                            {
                               //Log the data to the console so that
                                //you can get a better view of what the script is returning.

                                console.log(response);

                                //console.log(Array(response));

                                for(var i=0; i< response.length;i++)
                                    {
                                    //creates option tag
                                    jQuery('<option/>', {
                                            value: response[i],
                                            html: response[i]
                                            }).appendTo('#blokade'); //appends to select if parent div has id dropdown
                                    }

                            }
                    });
            }
            $(document).ready(update);*/



</script>
<body>

<div class="container">
  <h2 id="pagetitel"> Route </h2>
  <form method="post">
    <div class="diagnoseALL">
      <div class="formItems">
        <form>
                <div class="form-group">
                    <label for="formGroupExampleInput">MAX X</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="X" placeholder="1" value="<?php print$routedata['MAX_X']; ?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">MAX Y</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="Y" placeholder="1" value="<?php print$routedata['MAX_Y']; ?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Start</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="start" placeholder="1.1" value="<?php print$routedata['start']; ?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Einde</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="einde" placeholder="1.1" value="<?php print$routedata['end']; ?>">
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Blokades</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="Blokades" placeholder="Blokades" value='<?php print $routedata['blockade']; ?>'>
                </div>
                <div class="form-group">
                <input class="btn btn-secondary" type="submit" name="update" value="Update">
                <input class="btn btn-success" type="submit" name="Start" value="Start">
                </div>
        </form>
        </div>
      </div>
  </form>
</div>

<?PHP

if(isset($_POST['update'])){
    $x = $_POST['X'];
    $y = $_POST['Y'];
    $start = $_POST['start'];
    $einde = $_POST['einde'];
    $blokades = $_POST['Blokades'];

    updateroute($x,$y,$start,$einde,$blokades,$key);
}
?>


