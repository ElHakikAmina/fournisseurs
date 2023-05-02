<?php
if(isset($_GET['id']))
{
    $existProduct = new ProductController();
    $product = $existProduct->getOneProduct();
    $commande= new CommandeController();
    $commande->order();
    $commentaire=new CommentaireController();
    $commentaire->add();
    $getAllComments=$commentaire->getAllComments();
    $NombreDeFoisUnProduitEstAchetee=$existProduct->NombreDeFoisUnProduitEstAchetee();
}else
{
  header("location:index");
}
?>
<!doctype html>
<html lang="en">
  <head>
  <?php include('include/head.php'); ?>
</head>
  <body class="crimson">
  <?php include('views/pages/header.php'); ?>
    <div class=" ">
        <div class="d-flex flex-column flex-md-row mt-4">
            <div class="col-5" style="width:;">
                <img src="http://localhost/fournisseurs/views/pages/affiche_img_produit.php?id=<?php echo $_GET['id'];?>" style="width:70%; padding-left:30px; height:330px;">
            </div>
            <div class=" col-7" style="width:;">
              <br>
              <span class=" text-primary"><h2><?php  echo $product->libelle;?></h2></span>
              <br>
              <span class=" text-muted"><h5><?php  echo $product->description;?></h5></span><br><br>
              <span class=" text-secondary"><span class="h5" style="text-decoration: line-through;"><?php  echo $product->prix_offre;?> DH</span></span>
              <br>
              <span class=" text-success">Price:	<span class="h4"><?php  echo $product->prix_final;?> DH</span></span>
                <form method="POST">
                  <?php $id_produit=$_GET['id'];?>
                  <input type="hidden" name="id_produit" value="<?php echo $id_produit; ?>" style="width:60px;"/> <br>
                  Vendu par: <a href="http://localhost/fournisseurs/profile/<?php echo $product->id_client; ?>"><?php echo $product->nom_complet; ?> </a><br>
                  <span class="">Quantité : <input type="number" value="<?php echo $product->last_quantity; ?>" min="<?php echo $product->last_quantity; ?>" name="quantite" class="form-control" style="width:60px;"></span>
                  <span class="">En stock : <?php echo $product->quantity; ?></span> 
                  (
                  <span class="text-danger">Vous ne pouvez pas achetter moins de <?php echo $product->last_quantity; ?></span>  
                  )
                  <br> <br>
                  <input type="submit" name="acheter" class="btn btn-success " value="Achetter" /> 
                  <input type="submit" name="ajouter_au_panier" class="btn btn-primary 
                  " value="Ajouter au panier" /> <br>
                  <span class="text-success">Ce produit a été achetté <?php echo $NombreDeFoisUnProduitEstAchetee; ?>  fois</span>
                </form>   
            </div>
</div>
             
      </div>
      <?php include('pages/commentaire.php'); ?>
      <?php include('pages/garantee.php'); ?> 
      <?php include('pages/statistiques.php'); ?>
      
        <?php include('pages/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>