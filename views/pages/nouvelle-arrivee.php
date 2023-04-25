<div class="produit-populaire mx-3">
<h2 class="p-5  text-muted">NOUVELLE ARRIVEE</h2>
<div class="d-flex justify-content-between flex-wrap" >
        <?php
            foreach($products as $product):
        ?>
    <div class="mb-5 mx-4">
        <a href="http://localhost/fournisseurs/product/<?php echo $product['id']; ?>" class="text-decoration-none">
        <img src="views/pages/affiche_img_produit.php?id=<?php echo $product['id'];?>" style="width:180px; height:220px;" alt=""><br>
        <span class=" text-muted"><?php  echo $product['libelle'];?></span><br>
        <span class=" text-success"><?php  echo $product['prix_final'];?>MAD</span></a>  <br>
    </div>
    <?php
    endforeach;
?>
</div>
</div>
<section id="sec-4" class="py-5 ">
        <div class="container my-4">
            <div class="row gx-lg-5">
                <div class="col-lg-6 mb-5">
                    <h3>Lorem ipsum dolor</h3>
                    <p class="text-muted fw-light lh-lg my-4">
                    Bienvenue sur notre site de grossiste coopérative artisan unité de production ! Nous sommes fiers de vous offrir des produits artisanaux de qualité supérieure provenant de notre réseau de producteurs locaux. En tant que coopérative, nous croyons en la valeur de la collaboration et de la solidarité, et nous sommes engagés à soutenir les petites entreprises locales.                    </p>
                    <p class="text-muted fw-light lh-lg my-4">
                    Notre unité de production utilise des méthodes traditionnelles et respectueuses de l'environnement pour créer nos produits, ce qui garantit une qualité constante et une empreinte carbone minimale. Nous nous efforçons également de maintenir des normes éthiques élevées en ce qui concerne les conditions de travail et la rémunération de nos employés.                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="http://localhost/fournisseurs/views/img/img1.jpg" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>