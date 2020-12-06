<?php
include("../views/header.php");
include("../controller/route.php");
?>
<script>

    var response; 
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
            $(document).ready(update);



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
                <input type="text" class="form-control" id="formGroupExampleInput" name="X" placeholder="1">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">MAX Y</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="Y" placeholder="1">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Start</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="start" placeholder="1.1">
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Eide</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="einde" placeholder="1.1">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Blokade</label>
                <select class="form-control" id="blokade">
                    
                </select>
            </div>
        </form>
        </div>
      </div>
  </form>
</div>


