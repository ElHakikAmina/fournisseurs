<?php
$loginUser= new ClientController();
$loginUser->auth();
$profil=$loginUser->getOneProfile();
?>
<div class="w-50 mx-auto mt-5" style="margin-bottom:40px !important;">
<h2 class="">Créer un compte</h2>
<form method="POST" enctype="multipart/form-data">
  <div class="form-group" >
    <label for="exampleInputEmail1" class="">Nom Complet</label>
    <input type="text" value="<?php echo $profil->nom_complet; ?>" name="nom_complet" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom Complet">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="">Telephone</label>
    <input type="text" value=" <?php echo $profil->telephone; ?>" name="telephone" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telephone">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="">Adresse</label>
    <input type="text" value="<?php echo $profil->adresse; ?>" name="adresse" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="">Ville</label>
    <input type="text" value=" <?php echo $profil->ville; ?>" name="ville" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ville">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="">Nouveau mot de passe</label>
    <input type="password" value="" name="password" class="form-control " id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="">Je suis</label>
    <select class="form-control " name="role">

    <?php foreach($AllRoles as $r ): ?>
        <option value="<?php echo $r['id']?>" <?php if($r['id']==$profil->id) echo 'selected'; ?>><?php echo $r['role']; ?></option>
        <?php endforeach ?>
    </select>
    
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label " for="exampleCheck1">J'ai lu les conditions d'utilisation</label>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="ChakraPetch text-muted">Photo</label>
    <input type="file" name="image" class="form-control ChakraPetch" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit"  name="submit" class="btn btn-primary ">Submit</button>
  <div >
    <p class="">Vous avez déja un compte? <a href="login" class="">Connectez-vous</a><p>
  </div>
</form>
</div>