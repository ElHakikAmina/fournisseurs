<div class="d-flex flex-column flex-md-row mt-4 mb-4">
    <div class=" col-5"></div>
    <div class="col-7">
        Laissez votre commentaire:
        <form method="POST">
            <div><textarea name="commentaire" class="w-100 " cols="" rows="3"></textarea></div>
            <div><input type="submit" name="submit" value="Commenter" class="btn btn-success"></div>
        </form>
    </div>
</div>
<div class="d-flex">
    <div class=" col-5"></div>
    <div class="col-7 mt-4">
    <!-- <h3>Les avis des clients</h3> -->
     
        <?php foreach($getAllComments as $c): ?> 
            <h4><?php echo $c['commentaire']; ?></h4>
           <span class="text-secondary"> par: </span><a href="http://localhost/fournisseurs/profile/<?php echo $c['id_proprietaire_commentaire']; ?>"><?php echo $c['nom_complet']; ?></a> <br>
           <hr>
        <?php endforeach; ?>
    </div>
</div>