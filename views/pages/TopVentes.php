<div class="produit-populaire ">
    <h2 class="p-5 ">Top ventes</h2>
    <div class="d-flex justify-content-around flex-wrap" >
        <?php foreach($TopVentes as $t): ?>
        <div class="mb-5  col-md-2 ">
            <a href="http://localhost/fournisseurs/product/<?php echo $t['id']; ?>" class="text-decoration-none">
            <img src="views/pages/affiche_img_produit.php?id=<?php echo $t['id'];?>" style="width:180px; height:220px;" alt=""><br>
            <span class=" text-muted"><?php  echo $t['libelle'];?></span><br>
            <span class=" text-secondary" style="text-decoration:line-through;"><?php  echo $t['prix_offre'];?>MAD</span></a><br>
            <span class=" text-success"><?php  echo $t['prix_final'];?>MAD</span></a><br>
            <span class="">Minimum quantité à acheter: <?php  echo $t['last_quantity'];?></span>
        </div>
        <?php endforeach; ?>
    </div>
</div>