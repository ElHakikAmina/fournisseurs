<div class="produit-populaire ">
    <h2 class="p-5 ">Nouvelle arrivée</h2>
    <div class="d-flex justify-content-around flex-wrap" >
        <?php foreach($products as $product): ?>
        <div class="mb-5  col-md-3 ">
            <a href="http://localhost/fournisseurs/product/<?php echo $product['id']; ?>" class="text-decoration-none">
            <img src="views/pages/affiche_img_produit.php?id=<?php echo $product['id'];?>" style="width:180px; height:220px;" alt=""><br>
            <span class=" text-muted"><?php  echo $product['libelle'];?></span><br>
            <span class=" text-secondary" style="text-decoration:line-through;"><?php  echo $product['prix_offre'];?>MAD</span></a><br>
            <span class=" text-success"><?php  echo $product['prix_final'];?>MAD</span></a><br>
            <span class="">Minimum quantité à acheter: <?php  echo $product['last_quantity'];?></span>
        </div>
        <?php endforeach; ?>
    </div>
</div>


<div class="d-none d-md-flex flex-column flex-md-row text-center justify-content-around my-5">
    <div style="font-weight:bold;">
        <img src="http://localhost/fournisseurs/views/img/role/fakhar.jpg" alt="" style="border-radius:50%; width:50px; height:50px;">
        &nbsp;&nbsp; Artisan
    </div>
    <div style="font-weight:bold;">
        <img src="http://localhost/fournisseurs/views/img/role/khyata.jpg" alt="" style="border-radius:50%; width:50px; height:50px;">
        &nbsp;&nbsp; Unité de production
    </div>
    <div style="font-weight:bold;">
        <img src="http://localhost/fournisseurs/views/img/role/stock.jpg" alt="" style="border-radius:50%; width:50px; height:50px;">
        &nbsp;&nbsp; Grossisste
    </div>
    <div style="font-weight:bold;">
        <img src="http://localhost/fournisseurs/views/img/role/ta3awoniya.jpg" alt="" style="border-radius:50%; width:50px; height:50px;">
        &nbsp;&nbsp; Coopérative
    </div>
    <div style="font-weight:bold;">
        <img src="http://localhost/fournisseurs/views/img/role/marchand.jpg" alt="" style="border-radius:50%; width:50px; height:50px;">
        &nbsp;&nbsp; Marchand
    </div>
</div>




<section id="sec-4" class=" ">
        <div class="container my-5">
            <div class="row gx-lg-5">
                <div class="col-lg-7 ">
                    <h3>FOURNISSEURS Maroc</h3>
                    <p class="text-muted fw-light lh-lg my-4">
                    Bienvenue sur notre site de grossiste coopérative artisan unité de production ! Nous sommes fiers de vous offrir des produits artisanaux de qualité supérieure provenant de notre réseau de producteurs locaux.                     </p>
                    <p class="text-muted fw-light lh-lg my-4">
                    Notre unité de production utilise des méthodes traditionnelles et respectueuses de l'environnement pour créer nos produits, ce qui garantit une qualité constante et une empreinte carbone minimale. Nous nous efforçons également de maintenir des normes éthiques élevées en ce qui concerne les conditions de travail et la rémunération de nos employés.                    </p>
                </div>
                <div class="col-lg-5">
                    <img src="http://localhost/fournisseurs/views/img/img1.jpg" alt="" class="img-fluid" style="">
                </div>
            </div>
        </div>
    </section>