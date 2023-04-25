
<div class="d-flex flex-wrap my-5">
    <?php foreach($products as $p):?>
    <div class="mb-5 mx-4">
            <a href="http://localhost/fournisseurs/product/<?php echo $p['id']; ?>" class="text-decoration-none">
            <img src="http://localhost/fournisseurs/views/pages/affiche_img_produit.php?id=<?php echo $p['id'];?>" style="width:180px; height:220px;" alt=""><br>
            <span class="ChakraPetch text-muted"><?php  echo $p['libelle'];?></span><br>
            <span class="ChakraPetch text-success"><?php  echo $p['prix_final'];?>MAD</span></a>  <br>
    </div>
<?php endforeach; ?> 
</div>
<div class="mx-auto">
    <nav aria-label='Page navigation example'>
    <ul class="pagination">
    <?php 
    $pagination->NombreDePagesPagination();
    ?>
    </ul>
    </nav>
</div>