<div class="w-50 mx-auto" style="margin-bottom:40px !important;">
<h2 class="ChakraPetch">Ajouter une catégorie</h2>
<form method="POST" enctype="multipart/form-data">
  <div class="form-group" >
    <label for="exampleInputEmail1" class="ChakraPetch">Nom du catégorie</label>
    <input type="text" name="nom" value="<?php echo $oneCategory->nom?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom Complet">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="ChakraPetch">Description</label>
    <textarea name="description" placeholder="Description" class="form-control" cols="30" rows="10">value="<?php echo $oneCategory->description ?>"</textarea>
    
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="ChakraPetch">Photo</label>
    <input type="file" name="photo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telephone">
  </div>
  <div>
    <img src="http://localhost/fournisseurs/views/pages/affiche_img_category.php?id=<?php echo $_GET['id'];?>" style="width:100px; height:80px;">
</div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="ChakraPetch">Icone</label>
    <input type="file" name="icone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse">
  </div>
  <div>
    <img src="http://localhost/fournisseurs/views/pages/affiche_icon_category.php?id=<?php echo $_GET['id'];?>" style="width:30px; height:30px;">
  </div>
  <button type="submit" name="modify" class="btn btn-primary">Modify</button>
</form>
</div>