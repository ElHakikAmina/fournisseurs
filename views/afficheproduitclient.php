<?php
$produit= new ProductController();
$produits=$produit->getAllProductsSESSION();
$produit->deleteProduct();
$totalProduct=$produit->totalProductOneClient();
$totalProductMasquer=$produit->totalProductMasquer();
//
$Client = new ClientController();
//$Client->isAdminConnected();
$tatalClient = $Client->totalClient();
//
$Category = new CategoryController();
$totalCategory = $Category->totalCategory();
//
$commande= new CommandeController();
$totalCommande=$commande->totalCommandeduClient();
$totalCommandeNonEnvoyee=$commande->totalCommandeNonEnvoyeeduClient();
$totalCommandeNonLivree=$commande->totalCommandeNonLivreeduClient();
$totalCommandeLivree=$commande->totalCommandeLivreeduClient();
?>
<!doctype html>
<html lang="en">
  <head>
  <?php include('include/head.php'); ?>
</head>
  <body class="crimson">
    <div class=".container-fluid d-flex flex-column">
      <?php include('pages/header.php'); ?>
      <?php include('pages/afficheproduitclient.php'); ?>
      <?php include('pages/footer.php'); ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>