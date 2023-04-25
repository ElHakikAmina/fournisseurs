<div class="d-flex flex-column mx-2 text-center ">
    <div class="me-4 mb-4 d-flex flex-row flex-wrap justify-content-around">
        <?php include('views/pages/menudashboardadmin.php');?>
    </div>
<!----------->
    <div>
    <table class="table table-striped">
  <thead>
   
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Date de craetion</th>
      <th scope="col">Date d'envoie</th>
      <th scope="col">Date de livraison</th>
      <th scope="col">id du client</th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($commandes as $c):?>
    <tr>
      <th scope="row"><?php  echo $c['id']; ?></th>
      <td><?php  echo $c['date_creation']; ?></td>
      <td><?php  echo $c['date_envoi']; ?></td>
      <td><?php  echo $c['date_livraison']; ?></td>
      <td><?php  echo $c['id_client']; ?></td>
      <td><input type="submit" value="Modify" class="btn btn-primary"></td>
      <td><input type="submit" value="Supprimer" class="btn btn-danger"></td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
    </div>
</div>