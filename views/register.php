<?php
if(isset($_POST['submit']))
{
 $RegisterClient = new ClientController();
 $RegisterClient->register();
}
$Roles=new RoleController();
$AllRoles=$Roles->getAllRoles();
$ville = new VilleController();
$villes=$ville->getAllVilles();
?>
<!doctype html>
<html lang="en">
  <head>
  <?php include('include/head.php'); ?>
</head>
  <body class="crimson">
    <div class=".container-fluid d-flex flex-column">
      <?php include('pages/header.php'); ?>
      <?php include('pages/register-form.php'); ?>
      <?php include('pages/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>