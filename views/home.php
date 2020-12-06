<?php
include("../views/header.php");
?>
<body>

<div class="container">

  <h2 id="pagetitel"> Dashboard </h2>
  <form method="post">
  <div class="row text-center">
    <div class="col-12">
       <?php echo '<a href="../loader.php/?KEY='.$key.'" class="btn col-5 dbtn dbtn1"> <h1 id="dmi"> Diagnose </h1> </a>'; ?>
       <?php echo '<a href="../route.php/?KEY='.$key.'" class="btn col-5 dbtn dbtn2"> <h1 id="dmi"> Route </h1> </a>'; ?>
       <?php echo '<input style="font-size:38px;" type="submit" class="btn col-5 dbtn dbtn3" name="btnLogout" value="Log Uit"/>';?> 
       <?php echo '<a href="../log.php/?KEY='.$key.'" class="btn col-5 dbtn dbtn4"> <h1 id="dmi"> Log </h1> </a>'; ?>
    </div>
  </div>
  </form>
</div>


<?PHP


if(isset($_POST['btnLogout'])){
    $User->logout();
}
?>