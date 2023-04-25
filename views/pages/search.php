<?php
$data =new ProductController();
if(isset($_GET['id']))
{
    if($_GET['id']==1) $Products=$data->findProducts();
    if($_GET['id']==2) $Products=$data->filter();
}
 ?>
 <div class="d-flex flex-wrap my-5 mx-2">
    <?php foreach($Products as $Product):?>
    <div class="mb-5 mx-4">
            <a href="http://localhost/fournisseurs/product/<?php echo $Product['id']; ?>" class="text-decoration-none">
            <img src="http://localhost/fournisseurs/views/pages/affiche_img_produit.php?id=<?php echo $Product['id'];?>" style="width:180px; height:220px;" alt=""><br>
            <span class="ChakraPetch text-muted"><?php  echo $Product['libelle'];?></span><br>
            <span class="ChakraPetch text-success"><?php  echo $Product['prix_final'];?>MAD</span></a>  <br>
    </div>
<?php endforeach; ?> 
</div>