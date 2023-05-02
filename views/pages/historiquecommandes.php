<div class="mx-5 mt-5">
<table class="table table-striped">
  <thead>
    <tr>
    <th>id</th>
    
      <th scope="col">Libelle</th>
      <th scope="col">Photo</th>
      
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
       
        <th scope="row"><?php  echo $c['libelle']; ?></th>
        <th scope="row"><img src="views/pages/affiche_img_produit.php?id=<?php  echo $c['id_produit']; ?>" style="width:60px; height:80px;" alt=""></th>
      
        <th scope="row"><?php  echo $c['prix_final']; ?></th>
        <th scope="row"><?php  echo $c['categorie']; ?></th>
        <th scope="row"><?php  echo $c['date_creation']; ?></th>
        <th scope="row"><?php  if($c['date_envoi']==NULL) echo 'Pas encors envoyé'; else echo $c['date_envoi']; ?></th>
        <th scope="row"><?php  if($c['date_livraison']==NULL) echo 'Pas encors livré'; else echo $c['date_livraison']; ?></th>
        <th scope="row"><?php  echo $c['quantite']; ?></th>
        <th><a href="http://localhost/fournisseurs/historiquecommandes/<?php  echo $c['id']; ?>"><input type="submit" value="Supprimer" class="btn btn-danger"></a></th>
    </tr>
    <?php  endforeach; ?>
  </tbody>
</table>
</div>