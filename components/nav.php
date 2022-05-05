
<?php
  

  if(!isset($_SESSION['id'])){
    ?>
  
<nav class="navbar fixed-top navbar-light bg-light height80">
  <div class="container-fluid" style="display:block">
    <a class="navbar-brand" href="index.php?page=Login">Vaccine</a>
    <a class="navbar-brand font20" href="index.php?page=Login">Login</a>
    <a class="navbar-brand font20" href="index.php?page=Register">Register</a>
  </div>
</nav>


<?php }else{ ?>

  <nav class="navbar fixed-top navbar-light bg-light height80">
  <div class="container-fluid" style="display:block">
    <a class="navbar-brand" href="index.php?page=Login">Vaccine</a>
    <a class="navbar-brand font20" href="#"><?= $_SESSION['fname']?></a>
    <a class="navbar-brand font20" href="logout.php">Logout</a>
  </div>
</nav>

<?php } ?>

<style>
.height80{
  height:80px;
  position:unset;
}
.font20{
  font-size:16px !important;
}
  </style>