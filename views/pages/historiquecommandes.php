<div class="mx-5">
<table class="table table-striped">
  <thead>
    <tr>
    <th>id</th>
    <th scope="col">Réference</th>
      <th scope="col">Libelle</th>
      <th scope="col">Photo</th>
      <th scope="col">Code barre</th>
      <th scope="col">Prix</th>
      <th scope="col">Categorie</th>
      <th scope="col">date de creation</th>
      <th scope="col">date d'envoi</th>
      <th scope="col">date de livraison</th>
      <th scope="col">quantité</th>
      <th></th>
        
    </tr>
  </thead>
  <tbody>
    <?php foreach($commandes as $c): ?>
    <tr>
        <th scope="row"><?php  echo $c['id']; ?></th>
        <th scope="row"><?php  echo $c['reference']; ?></th>
        <th scope="row"><?php  echo $c['libelle']; ?></th>
        <th scope="row"><img src="views/pages/affiche_img_produit.php?id=<?php  echo $c['id_produit']; ?>" style="width:100px; height:150px;" alt=""></th>
        <th scope="row"><?php  echo $c['code_barre']; ?></th>
        <th scope="row"><?php  echo $c['prix_final']; ?></th>
        <th scope="row"><?php  echo $c['categorie']; ?></th>
        <th scope="row"><?php  echo $c['date_creation']; ?></th>
        <th scope="row"><?php  if($c['date_envoi']=='0000-00-00') echo 'Pas encors envoyé'; else echo $c['date_envoi']; ?></th>
        <th scope="row"><?php  if($c['date_livraison']=='0000-00-00') echo 'Pas encors livré'; else echo $c['date_livraison']; ?></th>
        <th scope="row"><?php  echo $c['quantite']; ?></th>
        <th><a href="http://localhost/fournisseurs/historiquecommandes/<?php  echo $c['id']; ?>"><input type="submit" value="Supprimer" class="btn btn-danger"></a></th>
    </tr>
    <?php  endforeach; ?>
  </tbody>
</table>
</div>