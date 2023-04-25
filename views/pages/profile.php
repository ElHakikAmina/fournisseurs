<div class="d-flex flex-column flex-md-row mx-5 mt-5">
    <div class="me-5">
        <?php if($profil->image==NULL) { ?>
            <img src="http://localhost/fournisseurs/views/img/profileImage.jpg" style="height:150px; width:120px;" >
        <?php
        } else {?>
        <img src="http://localhost/fournisseurs/views/pages/affiche_img_profile.php?id=<?php echo $_GET['id'];?>" style="height:150px; width:120px;" >
        <?php } ?>
    </div>
    <div>
        <?php echo $profil->nom_complet; ?> <br>
        <?php echo $profil->ville_name; ?> <br>
        <?php echo $profil->role; ?> <br>
        <?php echo $profil->telephone; ?> <br>
        <?php echo $profil->adresse; ?><br>
        <?php 
        if($_SESSION['id_client'] == $_GET['id']) 
        {
        ?>
        <a href="http://localhost/fournisseurs/modifyProfile">modifier</a>
        <?php } 
        if($_SESSION['id_client'] != $_GET['id'])  { ?>
        
        <input type="submit" value="Contacter" />
        <?php } ?>
    </div>
</div>
<div>
    <div>Les produits du <?php echo $profil->nom_complet; ?></div>
    <div class="d-flex flex-column flex-md-row">
    <?php
            foreach($products as $product):
        ?>
    <div class="mb-5 mx-4">
        <a href="http://localhost/fournisseurs/product/<?php echo $product['id']; ?>" class="text-decoration-none">
        <img src="http://localhost/fournisseurs/views/pages/affiche_img_produit.php?id=<?php echo $product['id'];?>" style="width:180px; height:220px;" alt=""><br>
        <span class=" text-muted"><?php  echo $product['libelle'];?></span><br>
        <span class=" text-success"><?php  echo $product['prix_final'];?>MAD</span></a>  <br>
    </div>
    <?php
    endforeach;
?>
    </div>
</div>