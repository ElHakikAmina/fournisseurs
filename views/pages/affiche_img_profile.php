<?php
require "../../models/DB.php";
$id=$_GET["id"];
$req=DB::connect()->prepare("select * from client where Id=? ");
 $req->setFetchMode (PDO::FETCH_ASSOC); 
 $req->execute(array($id));
  $tab=$req->fetchAll(); 
  echo $tab[0]["image"];
?>