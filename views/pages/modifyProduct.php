
<?php

?>
<div class="w-50 mx-auto" style="margin-bottom:40px !important;">
<h2>ajouter un produit</h2>
<form method="POST" enctype="multipart/form-data">
  <div class="form-group" >
    <label for="exampleInputEmail1">Libelle</label>
    <input type="text" name="libelle" value="<?php echo $productWithId->libelle;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Prix final</label>
    <input type="text" name="prix_final" value="<?php echo $productWithId->prix_final;?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Prix offre</label>
    <input type="text" name="prix_offre" value="<?php echo $productWithId->prix_offre;?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Description</label>
    <textarea class="form-control" name="description"><?php echo $productWithId->description;?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Categorie</label>
    <select class="form-control" name="categorie">
        <option value="g">gggggg</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Photo</label>
    <input type="file" name="image" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="update" class="btn btn-primary">Submit</button>
</form>
</div>