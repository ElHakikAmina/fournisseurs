<div class="d-flex flex-column mx-2 text-center ">
    <div class="me-4 mb-4 d-flex flex-row flex-wrap justify-content-around">
<?php include('views/pages/menudashboardadmin.php');?>
    </div>
    <!-------------------------->
    <div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom Complet</th>
      <th scope="col">Telephone</th>
      <th scope="col">Adresse</th>
      <th scope="col">Ville</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($clients as $c):

    
    ?>
    <tr>
      <th scope="col"><?php echo $c['id']; ?></th>
      <th scope="col"><?php echo $c['nom_complet']; ?></th>
      <th scope="col"><?php echo $c['telephone']; ?></th>
      <th scope="col"><?php echo $c['adresse']; ?></th>
      <th scope="col"><?php echo $c['ville']; ?></th>
      <th scope="col"><?php echo $c['email']; ?></th>
    </tr>
   <?php endforeach; ?>
  </tbody>
</table>
    </div>
</div>