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
                                var begin = result.split(".")[3];
                                var end = result.split(".")[4];


                                var lx = xy.split("/")[0];
                                var ly = xy.split("/")[1];

                                var sx = begin.split("/")[0];
                                var sy = begin.split("/")[1];

                                var ex = end.split("/")[0];
                                var ey = end.split("/")[1];

                                var rows = x;
                                var columns = y;
                                
                                

                                $(document).ready(function () {
                                    $("#grid").empty();



                                    //clone the temp row object with the columns to the wrapper
                                    for (var i = 0; i < rows; i++) {

                                            var $row = $("<div />", {
                                            class: 'gridrow',
                                            id: i
                                            });

                                           

                                            //add columns to the the temp row object
                                            for (var t = 0; t < columns; t++) {

                                                if(t == ly && i == lx){

                                                    var $square = $("<div />", {
                                                        class: 'gridsquare',
                                                        id: t,
                                                        style: 'background: green;'
                                                    });
                                                }else if(t == sy && i == sx){
                                                    var $square = $("<div />", {
                                                    class: 'gridsquare',
                                                    id: t,
                                                    style: 'background: #3ba1eb;'
                                                });
                                                }else if(t == ey && i == ex){
                                                    var $square = $("<div />", {
                                                    class: 'gridsquare',
                                                    id: t,
                                                    style: 'background: #edd834;'
                                                });
                                                }else{
                                                    var $square = $("<div />", {
                                                    class: 'gridsquare',
                                                    id: t
                                                });
                                                }

                                                
                                                $row.append($square.clone());
                                            }

                                            $("#grid").append($row.clone());
                                        
                                    }
          
                                });

                            }
                    });
            }
            $(document).ready(update);
            //       

            setInterval(update, 3000); //every 10 secs
            //  
</script>
<body>
<div class="container">
  <h2 id="pagetitel"> Grid </h2>
  <form method="post">

    <div class="gridbox">
    <div class="legenda">
    
    <a id="legbegin">BEGIN</a>
    <a id="legeind">EIND</a>
    <a id="legbot">BOT</a>


    </div>
    <div class="gridcenter">

    <div id="grid"></div>

    </div>

      <div class="formItems">
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