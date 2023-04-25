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
      <th scope="col">Référence</th>
      <th scope="col">Libelle</th>
      <th scope="col">Code barre</th>
      <th scope="col">Prix achat</th>
      <th scope="col">Prix final</th>
      <th scope="col">Prix offre</th>
      <!-- <th scope="col">Description</th> -->
      <th scope="col">catégorie</th>
      <th scope="col">Photo</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($produits as $p): ?>
    <tr>
      <th scope="row"><?php echo $p["id"]; ?></th>
      <td><?php echo $p["reference"]; ?></td>
      <td><?php echo $p["libelle"]; ?></td>
      <td><?php echo $p["code_barre"]; ?></td>
      <td><?php echo $p["prix_achat"]; ?></td>
      <td><?php echo $p["prix_final"]; ?></td>
      <td><?php echo $p["prix_offre"]; ?></td>
      <!-- <td><?php //echo $p["description"]; ?></td> -->
      <td><?php echo $p["categorie"]; ?></td>
      <td><img src="views/pages/affiche_img_produit.php?id=<?php echo $p['id'];?>" style="width:100px; height:100px;" alt=""><br>
      <td>
        <!-- Modify -->
        <a href="http://localhost/fournisseurs/modifyProduct/<?php echo $p['id'];?>"><input type="submit" value="Modifier" class="btn btn-primary mb-2" style="width:95px;"></a>
        <!-- Masquer -->
        <a href="http://localhost/fournisseurs/masquerProduit/<?php echo $p['id'];?>"><input type="submit" value="Masquer" class="btn btn-warning mb-2" style="width:95px;"></a>
        <!-- Delete -->
        <form method="POST" action="http://localhost/fournisseurs/afficheproduitadmin/<?php echo $p['id'];?>">
          <input type="submit" value="Supprimer" class="btn btn-danger" style="width:95px;">
        </form>
      </td>
</td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
</div>
