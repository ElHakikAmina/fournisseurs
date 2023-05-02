<div class="d-flex  flex-column flex-md-row flex-wrap justify-content-around">
    <?php foreach($cooperatives as $c): ?>
    <div class="  mx-5 mt-5 border py-4 px-4" style="width:400px;">
        <div class="me-5">
            <?php if($c['image']==NULL) { ?>
                <img src="http://localhost/fournisseurs/views/img/profileImage.jpg" style="height:150px; width:120px;" >
            <?php
            } else {?>
            <img src="http://localhost/fournisseurs/views/pages/affiche_img_profile.php?id=<?php echo $c['id'];?>" style="height:150px; width:120px;" >
            <?php } ?>
        </div>
        <div class="">
            <?php echo $c['nom_complet']; ?> <br>
            <?php echo $c['ville'] ?> <br>
            <?php echo $c['role_name'] ?> <br>
            <?php echo $c['telephone'] ?> <br>
            <?php echo $c['adresse'] ?><br>
            <a href="http://localhost/fournisseurs/profile/<?php echo $c['id']; ?>" class="text-decoration-none">Voir plus</a>        
        </div>
    </div>
    <?php endforeach; ?>    
</div>