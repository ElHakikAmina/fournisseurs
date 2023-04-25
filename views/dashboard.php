<?php
$logged=new ClientController();
$logged->isAdminConnected();
//$logged->isClientConnected();
$produit= new ProductController(); 
$totalProduct=$produit->totalProduct();
$totalProductMasquer=$produit->totalProductMasquer();

//$commande= new CommandeController();
//$commande->getAll();
$Client = new ClientController();
$tatalClient = $Client->totalClient();
$Category = new CategoryController();
$totalCategory = $Category->totalCategory();
//
$commande= new CommandeController();
$commandes=$commande->getAllCommandes();
$commande->changerEtat();
$commande->deleteCommande();
$totalCommande=$commande->totalCommande();
$totalCommandeNonEnvoyee=$commande->totalCommandeNonEnvoyee();
$totalCommandeNonLivree=$commande->totalCommandeNonLivree();
$totalCommandeLivree=$commande->totalCommandeLivree();
$totalCommandeNonConfirmee=$commande->totalCommandeNonConfirmee();
?>
<!doctype html>
<html lang="en">
  <head>
  <?php include('include/head.php'); ?>
</head>
  <body class="crimson">
    <div class=".container-fluid d-flex flex-column">
      <?php include('pages/header.php'); ?>
      <?php include('pages/dashboard.php'); ?>
      <?php include('pages/footer.php'); ?>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>