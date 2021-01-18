
<?php
function AutoUitlog(){
  print'
    <!-- The Modal -->
    <div class="modal fade" id="Auitlog">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">LOGUIT</h4>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              U wordt uit gelogd in 10 sec
            </div>
            
          </div>
        </div>
      </div>';
}


// warning model function asking for a titel , info and a color
//EXAMPLE Warning("PAS OP", "hallo lars", "warning");
function Warning($titel, $info, $coler){

    print('<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
      <script>
        $(document).ready(function(){
            $("#Warning").modal("show");
        });
      </script>
    </head>
    <body>
      <!-- The Modal -->
      <div class="modal fade" id="Warning">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">'.$titel.'</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
              '.$info.'
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-'.$coler.'" data-dismiss="modal">Sluiten</button>
            </div>
            
          </div>
        </div>
      </div>
    </body>
    </html>');
    }
?>