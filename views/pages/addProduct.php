
<div class="w-50 mx-auto" style="margin-bottom:40px !important;">
<h2 class="ChakraPetch text-primary">ajouter un produit</h2>
<form method="POST" enctype="multipart/form-data">
  <div class="form-group" >
    <label for="exampleInputEmail1" class="ChakraPetch text-muted">Référence</label>
    <input type="text" name="reference" class="form-control ChakraPetch" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom Complet">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="ChakraPetch text-muted">Libelle</label>
    <input type="text" name="libelle" class="form-control ChakraPetch" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="ChakraPetch text-muted">Code barre</label>
    <input type="text" name="code_barre" class="form-control ChakraPetch" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="ChakraPetch text-muted">Prix Achat</label>
    <input type="text" name="prix_achat" class="form-control ChakraPetch" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ville">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="ChakraPetch text-muted">Prix final</label>
    <input type="text" name="prix_final" class="form-control ChakraPetch" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="ChakraPetch text-muted">La quantité disponible</label>
    <input type="text" name="quantity" class="form-control ChakraPetch" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="ChakraPetch text-muted">Quantité minimum à acheté</label>
    <input type="text" name="prix_final" class="form-control ChakraPetch" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="ChakraPetch text-muted">Prix offre</label>
    <input type="text" name="prix_offre" class="form-control ChakraPetch" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="ChakraPetch text-muted">Description</label>
    <textarea class="form-control ChakraPetch" name="description"></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="ChakraPetch text-muted">Categorie</label>
    <select class="form-control ChakraPetch" name="categorie">
        <?php
            foreach($categories as $category):
        ?>
        <option value="<?php  echo $category['id'];?>"><?php  echo $category['nom'];?></option>
        <?php endforeach; ?>
    </select>
  </div>
  
  <div class="form-group">
    <label for="exampleInputPassword1" class="ChakraPetch text-muted">Photo</label>
    <input type="file" name="photo" class="form-control ChakraPetch" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="submit" class="btn btn-primary ChakraPetch">Submit</button>
</form>
</div>