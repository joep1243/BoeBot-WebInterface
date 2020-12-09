<?php
include("../views/header.php");
include("../controller/grid.php");
?>
<script type="text/javascript">
        var result; 
            function update() {
                    $.ajax({
                        //  cache: false,
                        type: "GET",
                        url: "../getxy.php",
                        datatype: "text",
                        data: 'action=call',
                        success: function (result, status, xhr)
                            {
                                var x = result.split(".")[0];
                                var y = result.split(".")[1];
                                var xy = result.split(".")[2];

                                var lx = xy.split("/")[0];
                                var ly = xy.split("/")[1];

                                console.log(lx);
                                console.log(ly);

                                

                                
                                var rows = x;
                                var columns = y;
                                var $row = $("<div />", {
                                    class: 'gridrow'
                                });
                                var $square = $("<div />", {
                                    class: 'gridsquare'
                                });

                                $(document).ready(function () {
                                    $("#grid").empty();
                                    
                                    //add columns to the the temp row object
                                    for (var i = 0; i < columns; i++) {
                                        $row.append($square.clone());
                                    }
                                    //clone the temp row object with the columns to the wrapper
                                    for (var i = 0; i < rows; i++) {
                                        $("#grid").append($row.clone());
                                    }
                                });

                            }
                    });
            }
            $(document).ready(update);
            //       

            //setInterval(update, 3000); //every 10 secs
            //  
</script>
<body>
<div class="container">
  <h2 id="pagetitel"> Grid </h2>
  <form method="post">
    <div class="gridbox">
      <div class="formItems">
          <div id="grid"></div></br>
          <form>
                <div class="form-group">
                <input class="btn btn-success BTNLgrid" type="submit" name="Start" value="Start">
                <input class="btn btn-danger BTNRgrid" type="submit" name="Stop" value="Stop">
                </div>
        </form>
        </div>
      </div>
  </form>
</div>
<?php
if(isset($_POST['Start'])){
    setcommand(1);
}
if(isset($_POST['Stop'])){
    setcommand(2);
}
?>