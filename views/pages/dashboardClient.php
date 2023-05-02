<div class="d-flex flex-column mx-2 text-center ">
    <div class="me-4 mb-4 d-flex flex-row flex-wrap justify-content-around">
    <?php include('views/pages/menudashboardclient.php');?>
    </div>
    <!------------------------------->
    <div >
      <div>
        <table class="table table-bordered table-light">
        <thead>
          <tr>
            <th scope="col">Commandes en attentes d'envoie</th>
            <th scope="col">Commandes en attentes de livraison</th>
            <th scope="col">Commandes Livrée</th>
          </tr>
        </thead>
        <tbody>
            <tr>
              <th scope="row"><?php echo $totalCommandeNonEnvoyee; ?></th>
              <td><?php echo $totalCommandeNonLivree;?></td>
              <td><?php echo $totalCommandeLivree;?></td>
              
            </tr>
            <tr>
              <th scope="row" colspan="2">Total</th>
              <td ><?php echo $totalCommande;?></td>
              
            </tr>
            </tbody>
          </table>
      </div>
         <!------------------------------->
        <div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Id du commande</th>
                <th scope="col">Date de creation</th>
                <th scope="col">Date d'envoi</th>
                <th scope="col">Date de livraison</th>
                <!-- <th></th> -->
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php
              foreach( $commandes as $c):
              ?>
              <tr>
                <th scope="row"><?php  echo $c['id']; ?></th>
                <td><?php  echo $c['date_creation']; ?></td>
                <form method="POST">
                  <input type="hidden" name="id_commande" value="<?php echo $c['id'];?>">
                  <td><?php if($c['date_envoi']==NULL) echo'<input type="submit" name="envoyerMtn" class="btn btn-link text-danger" value="envoyez mtn?"/>'; else echo '<p class="text-success">'.$c['date_envoi'].'</p>'; ?></td>
                  <td><?php if($c['date_livraison']==NULL) echo'<input type="submit" name="livrerMtn" class="btn btn-link text-danger" value="Livrez mtn?"/>'; else echo '<p class="text-success">'.$c['date_livraison'].'</p>'; ?></td>
                </form>
                <!-- <td>
                   <form action="" method="POST">
                    <input type="hidden" name="id_commande" value="<?php //echo $c['id'];?>">
                  <input type="submit" value="supprimer" name="supprimer" class="btn btn-danger">
                  </form> 
                </td> -->
                <td><a href="http://localhost/fournisseurs/afficheCommandeProduit/<?php echo$c['id']; ?>">details du commande</a></td>
              </tr>
            <?php
            endforeach;
            ?> 
            </tbody>
          </table>
        </div>
  </div>
</div>





