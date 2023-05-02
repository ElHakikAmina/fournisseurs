<form method="POST">
<div class="d-flex flex-column flex-md-row mt-5">
<!--  -->
<div class="col-md-8  px-4">
  <table class="table table-striped">
    <thead>
      <tr>
      
        <th scope="col">Libelle</th>
        <th scope="col">Photo</th>
       
        <th scope="col">Prix</th>
        <th scope="col">Categorie</th>
        <th scope="col">date d'ajout</th>
        <th scope="col">date d'envoi</th>
        <th scope="col">date de livraison</th>
        <th scope="col">quantité</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $totalApayer=0;
      foreach($commandes as $c):
        $totalApayer+=$c['quantite']*$c['prix_final'];
      ?>
      <tr>
         
          <th scope="row"><?php  echo $c['libelle']; ?></th>
          <th scope="row"><img src="views/pages/affiche_img_produit.php?id=<?php  echo $c['id_produit']; ?>" style="width:60px; height:80px;" alt=""></th>
          
          <th scope="row"><?php  echo $c['prix_final']; ?></th>
          <th scope="row"><?php  echo $c['categorie']; ?></th>
          <th scope="row"><?php  echo $c['date_creation']; ?></th>
          <th scope="row"><?php  if($c['date_envoi']==NULL) echo 'Pas encors envoyé'; else echo $c['date_envoi']; ?></th>
          <th scope="row"><?php  if($c['date_livraison']==NULL) echo 'Pas encors livré'; else echo $c['date_livraison']; ?></th>
          <th scope="row"><input type="number" name="quantite" value="<?php  echo $c['quantite']; ?>" style="width:40px;"></th>
          <th>
              <?php $id_commande=$c['id_commande'];?>
              <?php $id_produit=$c['id_produit'];?>
              <input type="hidden" name="id_produit" value="<?php echo $id_produit; ?>" style="width:60px;"/> <br>
              <input type="hidden" name="id_commande" value="<?php echo $id_commande; ?>" style="width:60px;"/> <br>
            
          </th>
      </tr>
      <?php  endforeach;?>
      <tr>
        <th colspan="6" class="text-center">Total</th>
        <th><?php echo $totalApayer; ?> DH</th>
        <th>
          
        <input type="submit" name="acheter" class="btn btn-success ChakraPetch" value="Achetter" />
        </th>
      </tr>
    </tbody>
  </table>
</div>
<!--  -->
<div class="col-md-4 px-4">
  <div > <h4 class="text-center">Information de livraison</h4> </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Nom Complet</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Votre Nom ...">
    <small id="emailHelp" class="form-text text-muted">Entrer le nom complet du recepteur.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Adresse : </label>
    <textarea name="" class="form-control" placeholder="Adresse"></textarea>
  </div>
</div>
 
</div>
</form>