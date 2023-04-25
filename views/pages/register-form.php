
<div class="w-50 mx-auto mt-5" style="margin-bottom:40px !important;">
<h2 class="">Créer un compte</h2>
<form method="POST">
  <div class="form-group" >
    <label for="exampleInputEmail1" class="">Votre Nom Complet ou Votre marque</label>
    <input type="text" name="nom_complet" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nom Complet">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="">Email</label>
    <input type="text" name="email" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="">Telephone</label>
    <input type="text" name="telephone" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Telephone">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="">Adresse</label>
    <input type="text" name="adresse" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse">
  </div>
  <div class="form-group" >
    <label for="exampleInputEmail1" class="">Ville</label>
    <select name="ville" id="" class="form-control " id="exampleInputEmail1">
    <?php foreach($villes as $v):  ?>
        <option value="<?php echo $v['id']; ?>"><?php echo $v['ville']; ?></option>
    <?php endforeach; ?>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="">Password</label>
    <input type="password" name="password" class="form-control " id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="">Je suis</label>
    <select class="form-control " name="role">
    <?php foreach($AllRoles as $r ): ?>
        <option value="<?php echo $r['id']?>"><?php echo $r['role']; ?></option>
        <?php endforeach ?>
    </select>
    
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label " for="exampleCheck1">J'ai lu les conditions d'utilisation</label>
  </div>
  <button type="submit"  name="submit" class="btn btn-primary ">Submit</button>
  <div >
    <p class="">Vous avez déja un compte? <a href="login" class="">Connectez-vous</a><p>
  </div>
</form>
</div>