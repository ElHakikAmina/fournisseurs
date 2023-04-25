<div class="d-flex flex-column mx-2 text-center ">
   
<!----------->
    <div>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Référence</th>
      <th scope="col">Libelle</th>
      <th scope="col">Image</th>
      <th scope="col">Code barre</th>
      <th scope="col">Prix_achat</th>
      <th scope="col">Prix final</th>
      <th scope="col">Prix offre</th>
      <th scope="col">Categorie</th>
      <th scope="col">Quantité</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($produits as $p): ?>
    <tr>
      <td><?php echo $p["reference"]; ?></td>
      <td><?php echo $p["libelle"]; ?></td>
      <td><img src="http://localhost/fournisseurs/views/pages/affiche_img_produit.php?id=<?php echo $p['id_produit'];?>" style="width:100px; height:100px;" alt=""><br>
      <td><?php echo $p["code_barre"]; ?></td>
      <td><?php echo $p["prix_achat"]; ?></td>
      <td><?php echo $p["prix_final"]; ?></td>
      <td><?php echo $p["prix_offre"]; ?></td>
      <!-- <td><?php //echo $p["description"]; ?></td> -->
      <td><?php echo $p["categorieNom"]; ?></td>
      <td><?php echo $p["quantite"]; ?></td>
     
</td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    </div>
</div>
