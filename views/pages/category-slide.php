<div class="category-slide d-flex mt-4">
<!---->
    <div class="categories col-12 col-md-4">
        <ul class="list-group list-group-flush">
        <li class="list-group-item" style="text-align:center;">Categories</li>
        <?php
            foreach($categories as $category):
        ?>
        <li class="list-group-item">
            <a href="category/<?php  echo $category['id'];?>/1" class="text-dark text-decoration-none">
            <img src="views/pages/affiche_icon_category.php?id=<?php echo $category['id'];?>" style="width:30px; height:30px;">
             <?php  echo $category['nom'];?>
            </a>
        </li>
        <?php
            endforeach;
        ?>
        </ul>
    </div>
    <!---->
    <div class="slide d-none d-md-block col-md-8" >
            <div class="d-flex flex-row justify-content-between alert bg-dark" >
                <div class="text-white">Recherche avancée</div> 
                <div>
                    <form action="search/2" method="post">
                    <select name="category" class="form-control ChakraPetch">
                        <option>Categories</option>
                        <?php
                            foreach($categories as $category):
                        ?>
                        <option value="<?php echo $category['id']; ?>"><?php echo $category['nom']; ?></option>
                        <?php endforeach; ?>
                    </select></div>
                        <div><input type="submit" name="prixmoins"  placeholder="Prix" value="prix Décroissant" class="btn btn-secondary ChakraPetch"></div>
                        <div><input type="submit" name="prixplus"  placeholder="Prix" value="prix Croissant" class="btn btn-secondary ChakraPetch"></div>
                    </form>
            </div>
            <div class="d-flex flex-row" >
                <div style="width:20% !important; "><img src="views/img/marchand.png" class="w-100" style="width:; height:400px;"></div>
                <div style="width:80% !important; " style="background-color:;">
                    <div class=" w-100" style="background-color:;">
                        <img src="views/img/product.jpg" class="w-100 p-3" style=" height:200px;"/>
                    </div>
                    <div class="d-flex flex-row container-fluid  justify-content-between w-100">
                    <div class="ChakraPetch text-center text-secondary" ><img src="views/img/artisan.jpg" class="p-3"  style="width:150px; height:200px;" /> <br> Artisan </div>
                    <div class="ChakraPetch text-center text-secondary"><img src="views/img/cooperative.jpg" class="p-3"  style="width:150px; height:200px;" /> <br> Coopérative</div>
                    <div class="ChakraPetch text-center text-secondary"><img src="views/img/grossiste.jpg" class="p-3"  style="width:150px; height:200px;" /> <br> Grossiste</div>
                    <div class="ChakraPetch text-center text-secondary"><img src="views/img/unite_production.jpg" class="p-3"  style="width:150px; height:200px;" /> <br> Unité de production</div>
                    
                    </div>
                </div>
            </div>
    </div>
    <!---->
<!---->
</div>