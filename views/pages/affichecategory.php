<div class="d-flex flex-column mx-2 text-center ">
    <div class="me-4 mb-4 d-flex flex-row flex-wrap justify-content-around">
<?php include('views/pages/menudashboardadmin.php');?>
    </div>
    <!-------------------------->
    <div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nom</th>
      <!-- <th scope="col">Description</th> -->
      <th scope="col">Image</th>
      <th scope="col">Icone</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($categories as $c):
    ?>
    <tr>
      <th scope="col"><?php echo $c['id']; ?></th>
      <th scope="col"><?php echo $c['nom']; ?></th>
      <!-- <th scope="col"><?php echo $c['description']; ?></th> -->
      <th scope="col"><img src="http://localhost/fournisseurs/views/pages/affiche_img_category.php?id=<?php echo $c['id'];?>" style="width:100px; height:80px;"></th>
      <th scope="col"><img src="http://localhost/fournisseurs/views/pages/affiche_icon_category.php?id=<?php echo $c['id'];?>" style="width:30px; height:30px;"></th>
      <th scope="col"><a href="http://localhost/fournisseurs/modifyCategory/<?php echo $c['id'];?>"><input type="submit" value="Modifier" class="btn btn-warning"></a></th>
      <th scope="col"><a href="http://localhost/fournisseurs/affichecategory/<?php echo $c['id'];?>"><input type="submit" value="Masquer" class="btn btn-danger"></a></th>
    </tr>
   <?php endforeach; ?>
  </tbody>
</table>
    </div>
</div>