<div>
    <?php
    foreach($cooperatives as $c):      
        ?>
        <div>
        <div class="me-5">
        <?php if($c['image']==NULL) { ?>
            <img src="http://localhost/fournisseurs/views/img/profileImage.jpg" style="height:150px; width:120px;" >
        <?php
        } else {?>
        <img src="http://localhost/fournisseurs/views/pages/affiche_img_profile.php?id=<?php echo $c['id'];?>" style="height:150px; width:120px;" >
        <?php } ?>
    </div>
            <?php echo $c['email'];?>
        </div>
        <?php
    endforeach;
    ?>    

</div>