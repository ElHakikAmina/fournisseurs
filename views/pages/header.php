     <div class="bg-muted text-center py-1">
     
     Notre support est disponible 24/7</div>
     <div class="header d-flex flex-wrap bg-black justify-content-between">
        <div class="mx-auto mx-lg-0">
        <a href="http://localhost/fournisseurs/index" class="text-decoration-none ">
            <span class="bebas text-black text-white size20px">FOURNISSEURS</span>
            <span class=" text-muted size16px">Maroc</span>
        </a>
        </div>
        <!---->
        <div class="mx-auto">
            <form class="d-flex" role="search" method="POST" action="http://localhost/fournisseurs/search/1">
            <input class="form-control me-1" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn btn-primary " type="submit">Recherche</button>
            </form>
        </div>
        <!---->
        <div class="mx-auto">
            <?php
            if(isset($_SESSION['logged']) and isset($_SESSION['id_client']))
            {
                ?>
                <a href="http://localhost/fournisseurs/profile/<?php echo $_SESSION['id_client']; ?>" class="link-primary text-decoration-none  text-white">Profile</a>&nbsp;&nbsp;&nbsp;
                <?php
            }
            if(isset($_SESSION['admin']))
            {
                ?>
                <a href="http://localhost/fournisseurs/addVille" class="link-primary text-decoration-none  text-white">Ajouter Ville</a>&nbsp;&nbsp;&nbsp;
                <a href="http://localhost/fournisseurs/addRole" class="link-primary text-decoration-none  text-white">Ajouter Role</a>&nbsp;&nbsp;&nbsp;
                <a href="http://localhost/fournisseurs/addCategory" class="link-primary text-decoration-none  text-white">Ajouter Categorie</a>&nbsp;&nbsp;&nbsp;
                <a href="http://localhost/fournisseurs/dashboard" class="link-primary text-decoration-none  text-white">Dashboard</a>&nbsp;&nbsp;&nbsp;
            <?php
            }else if(isset($_SESSION['client']))
            {
                ?>
            <a href="http://localhost/fournisseurs/historiquecommandes" class="text-white text-decoration-none ">Historique des commandes</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php if($_SESSION['role']!=1) {?>
                    <a href="http://localhost/fournisseurs/addProduct" class="text-white text-decoration-none ">Ajouter un produit</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="http://localhost/fournisseurs/dashboardClient" class="text-white text-decoration-none ">Dashboard</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
                }
                ?>
            <?php
            }
            if(!isset($_SESSION['logged']))
            {
                ?>
            <a href="http://localhost/fournisseurs/login" class="text-primary text-decoration-none ">Connexion</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="http://localhost/fournisseurs/register" class="text-success  text-decoration-none ">Creér un compte</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
            }else
            {
                ?>
            <a href="http://localhost/fournisseurs/logout" class="link-primary text-decoration-none  ">Déconnexion</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <?php
            }
            if(isset($_SESSION['client']))
            {
            ?>            
            <a href="http://localhost/fournisseurs/panier"><img src="http://localhost/fournisseurs/views/img/panier.jpg" style="width:30px; height:30px;"></a>
            <?php
            }
            ?>
        </div> 
</div>
<div class="d-flex bg-secondary flex-column flex-md-row justify-content-between px-4 py-2 text-center">
    <div ><a href="http://localhost/fournisseurs/cooperative" class="text-white text-decoration-none">Les coopératives </a></div>
    <div><a href="http://localhost/fournisseurs/artisan" class="text-white text-decoration-none">Les artisans</a></div>
    <div><a href="http://localhost/fournisseurs/uniteproduction" class="text-white text-decoration-none">Les unités de production </a></div>
    <div><a href="http://localhost/fournisseurs/grossisste" class="text-white text-decoration-none">Les Grossisstes </a></div>
</div>