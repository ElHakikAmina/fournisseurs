
<div class="col-md-6 col-9 mx-auto mt-5" style="margin-bottom:40px !important;">
<h2 class=" text-primary">Ajouter un produit</h2>
<form method="POST" enctype="multipart/form-data">
  <!-- <div class="form-group" >
    <label for="exampleInputEmail1" class=" text-muted">Référence</label>
    <input type="text" name="reference" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Référence">
  </div> -->
  <div class="form-group" >
    <label for="exampleInputEmail1" class=" text-muted">Libelle</label>
    <input type="text" name="libelle" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Libelle">
  </div>
  <!-- <div class="form-group" >
    <label for="exampleInputEmail1" class=" text-muted">Code barre</label>
    <input type="text" name="code_barre" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Code barre">
  </div> -->
  <!-- <div class="form-group" >
    <label for="exampleInputEmail1" class=" text-muted">Prix Achat</label>
    <input type="text" name="prix_achat" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Prix Achat">
  </div> -->
  <div class="form-group">
    <label for="exampleInputPassword1" class=" text-muted">Prix final</label>
    <input type="text" name="prix_final" class="form-control " id="exampleInputPassword1" placeholder="Prix final">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class=" text-muted">Prix offre</label>
    <input type="text" name="prix_offre" class="form-control " id="exampleInputPassword1" placeholder="Prix offre">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class=" text-muted">La quantité disponible</label>
    <input type="text" name="quantity" class="form-control " id="exampleInputPassword1" placeholder="La quantité disponible">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class=" text-muted">Quantité minimum à acheter</label>
    <input type="text" name="last_quantity" class="form-control " id="exampleInputPassword1" placeholder="Quantité minimum à acheter">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class=" text-muted">Description</label>
    <textarea class="form-control " name="description" placeholder="Description"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class=" text-muted">Categorie</label>
    <select class="form-control " name="categorie">
        <?php
            foreach($categories as $category):
        ?>
        <option value="<?php  echo $category['id'];?>"><?php  echo $category['nom'];?></option>
        <?php endforeach; ?>
    </select>
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1" class=" text-muted">Photo</label>
    <input type="file" name="photo" class="form-control " id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary ">Ajouter</button>
</form>
</div>