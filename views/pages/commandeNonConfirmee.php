<div class="d-flex flex-column mx-2 text-center ">
    <div class="me-4 mb-4 d-flex flex-row flex-wrap justify-content-around">
        <?php include('views/pages/menudashboardadmin.php');?>
    </div>
<!----------->
    <div>
       
        <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">date creation</th>
      <th scope="col"></th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach($CommandesNonConfirmee as $c):?>
    <tr>
      <th scope="row"><?php echo $c['id'];?></th>
      <td><?php echo $c['date_creation'];?></td>
      <!-- <td><input type="submit" value="Modifier" class="btn btn-primary"></td>
      <td><input type="submit" value="Supprimer" class="btn btn-danger"></td> -->
      <td><a href="http://localhost/fournisseurs/afficheCommandeProduit/<?php echo$c['id']; ?>">details du commande</a></td>
    </tr>
    <?php  endforeach; ?>
  </tbody>
</table>
    </div>
</div>