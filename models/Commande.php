<?php
class Commande
{
    public static function totalCommandeLivreeduClient($data)
    {
        // $query="SELECT distinct(id) from commande where acheter='1' and date_envoi is not null and date_livraison is not null and id_client=:id_client";
        $query="
        SELECT commande.*
FROM commande
INNER JOIN produits_composant ON commande.id = produits_composant.id_commande
INNER JOIN produit ON produit.id = produits_composant.id_produit
where commande.acheter='1' and commande.date_envoi is not null and commande.date_livraison is not null and produit.id_client=:id_client
        ";
        $stmt =DB::connect()->prepare($query);
        $stmt->bindParam('id_client',$data['id_client']);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    public static function totalCommandeNonLivreeduClient($data)
    {
        $query="
        SELECT commande.*
FROM commande
INNER JOIN produits_composant ON commande.id = produits_composant.id_commande
INNER JOIN produit ON produit.id = produits_composant.id_produit
where commande.acheter='1'  and commande.date_livraison is  null and produit.id_client=:id_client
        ";
        $stmt =DB::connect()->prepare($query);
        $stmt->bindParam(':id_client',$data['id_client']);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    public static function totalCommandeduClient($data)
    {
        //$query="SELECT distinct(id) from commande where acheter='1' and id_client=:id_client";
        $query="select commande.* from commande
        inner join produits_composant on commande.id = produits_composant.id_commande
        inner join produit on produit.id= produits_composant.id_produit
        where produit.id_client=:id_client and commande.acheter='1'
        ";
        $stmt =DB::connect()->prepare($query);
        $stmt->bindParam(':id_client',$data['id_client']);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    public static function totalCommandeNonEnvoyeeduClient($data)
    {
        $query="SELECT commande.* FROM commande INNER JOIN produits_composant ON commande.id = produits_composant.id_commande
INNER JOIN produit ON produit.id = produits_composant.id_produit
where commande.acheter='1' and commande.date_envoi is  null and commande.date_livraison is  null and produit.id_client=:id_client
        ";
        $stmt =DB::connect()->prepare($query);
        $stmt->bindParam(':id_client',$data['id_client']);
        $stmt->execute();
        // die();
        $count = $stmt->rowCount();
        return $count;
    }
    public static function getAllCommandesduClient($data)
    {
        //$stmt = DB::connect()->prepare("SELECT * FROM commande where id_client=:id_client and acheter='1'");
        $stmt=DB::connect()->prepare("
        select commande.* from commande
        inner join produits_composant on produits_composant.id_commande = commande.id
        inner join produit on produits_composant.id_produit = produit.id
        where commande.acheter='1' and produit.id_client=:id_client
        ");
        $stmt->bindParam(':id_client',$data['id_client']);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    static public function afficheCommandeProduit($data){
        $stmt = DB::connect()->prepare("SELECT *,categorie.nom as categorieNom, 
        produits_composant.id_produit as id_produit
         FROM produits_composant
        INNER JOIN produit
        on produits_composant.id_produit = produit.id
         and  id_commande=:id_commande 
         INNER JOIN categorie  
    ON categorie.id = produit.categorie");
        $stmt->bindParam(':id_commande',$data['id_commande']);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    
    static public function changerEtat($data){
        if(isset($data['date_envoi']))
        {
            $stmt = DB::connect()->prepare('update  commande SET
            date_envoi=:date_envoi
            where id = :id_commande
               ');
               $stmt->bindParam(':id_commande',$data['id_commande']);
               $stmt->bindParam(':date_envoi',$data['date_envoi']);
               if($stmt->execute()) return 'ok';
        }elseif (isset($data['date_livraison']))
        {
            $stmt = DB::connect()->prepare('update  commande SET
            date_livraison=:date_livraison
            where id = :id_commande
               ');
               $stmt->bindParam(':id_commande',$data['id_commande']);
               $stmt->bindParam(':date_livraison',$data['date_livraison']);
               if($stmt->execute()) return 'ok';
        }  
    }
    static public function deleteCommande($data){
        $id_commande = $data['id_commande'];
        try{
            $query = 'delete FROM commande WHERE id=:id_commande';
            $stmt=DB::connect()->prepare($query);
            $stmt->execute(array(":id_commande" => $id_commande));
            return 'ok';
        }catch(PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }
    static public function acheterDansPanier($data){
        $stmt = DB::connect()->prepare('update  commande SET
         acheter=:acheter
         where id = :id_commande
            ');
        //$stmt->bindParam(':id',$data['id']);    
        $stmt->bindParam(':id_commande',$data['id_commande']);
        $stmt->bindParam(':acheter',$data['acheter']);
        $stmt->execute();
        //
        $stmt2 = DB::connect()->prepare('update  produits_composant SET
         quantite=:quantite
         where id_produit = :id_produit
            ');
        //$stmt->bindParam(':id',$data['id']);    
        $stmt2->bindParam(':id_produit',$data['id_produit']);
        $stmt2->bindParam(':quantite',$data['quantite']);
        if($stmt2->execute()) return 'ok';
    }
    static public function deleteProductCommande($data)
    {
        $id = $data['id'];
        try{
            $query = 'delete FROM produits_composant WHERE id_produit=:id';
            $stmt=DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            return 'ok';
        }catch(PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }
    public static function panier()
    {
        
        $stmt = DB::connect()->prepare("SELECT * FROM commande INNER JOIN
         produits_composant ON commande.id = produits_composant.id_commande INNER JOIN 
         produit ON produit.id =  produits_composant.id_produit
        where commande.id_client=".$_SESSION['id_client']." and acheter='0' order by produits_composant.id desc");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    public static function historiqueDesCommandes()
    {
        $stmt = DB::connect()->prepare("SELECT * FROM commande INNER JOIN
         produits_composant ON commande.id = produits_composant.id_commande INNER JOIN 
         produit ON produit.id =  produits_composant.id_produit
        where commande.id_client=".$_SESSION['id_client']." and acheter='1' order by produits_composant.id desc");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    public static function getCommandeLivree()
    {
        $stmt = DB::connect()->prepare("SELECT * FROM commande where  acheter='1' and date_envoi!='0000-00-00' and date_livraison!='0000-00-00'");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    public static function getCommandeNonlivree()
    {
        $stmt = DB::connect()->prepare("SELECT * FROM commande where  acheter='1' and  date_livraison='0000-00-00'");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    public static function getCommandeNonenvoyee()
    {
        $stmt = DB::connect()->prepare("SELECT * FROM commande where  acheter='1' and date_envoi='0000-00-00'");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    public static function getCommandeNonConfirmee()
    {
        $stmt = DB::connect()->prepare("SELECT * FROM commande where  acheter='0'");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    public static function getAll()
    {
        $stmt = DB::connect()->prepare("SELECT * FROM commande where  acheter='1'");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    public static function totalCommandeNonConfirmee()
    {
        $query="SELECT distinct(id) from commande where acheter='0'";
        $stmt =DB::connect()->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    public static function totalCommandeLivree()
    {
        $query="SELECT distinct(id) from commande where acheter='1' and date_envoi!='0000-00-00' and date_livraison!='0000-00-00'";
        $stmt =DB::connect()->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    public static function totalCommandeNonLivree()
    {
        $query="SELECT distinct(id) from commande where acheter='1'  and date_livraison='00/00/0000'";
        $stmt =DB::connect()->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    public static function totalCommandeNonEnvoyee()
    {
        $query="SELECT distinct(id) from commande where acheter='1' and date_envoi='0000-00-00'";
        $stmt =DB::connect()->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    public static function totalCommande()
    {
        $query="SELECT distinct(id) from commande where acheter='1'";
        $stmt =DB::connect()->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    static public function order($data)
    {
        $queryCommandeNotPurchased="SELECT * from commande where acheter='0' and id_client=".$_SESSION['id_client']."";
        $stmtCommandeNotPurchased=DB::connect()->prepare($queryCommandeNotPurchased);
        $stmtCommandeNotPurchased->execute();
        $countCommandeNotPurchased = $stmtCommandeNotPurchased->rowCount();
        if($countCommandeNotPurchased==0 && $data['acheter']==0 )
        {
            $stmt1 = DB::connect()->prepare(
                'INSERT INTO commande (date_creation,id_client,acheter)
                VALUES (:date_creation,:id_client,:acheter)
                ');
            $stmt1->bindParam(':date_creation',$data['date_creation']);
            $stmt1->bindParam(':id_client',$data['id_client']);
            $stmt1->bindParam(':acheter',$data['acheter']);
            $stmt1->execute();
            //
            $query="SELECT * from commande where acheter='0'";
            $stmt=DB::connect()->prepare($query);
            $stmt->execute();
            $s=$stmt->fetch();
            $id_commande=$s['id'];   
        }
        elseif($countCommandeNotPurchased==1 && $data['acheter']==0)
        {
            $s=$stmtCommandeNotPurchased->fetch();
            $id_commande=$s['id'];
        }elseif($data['acheter']==1)
        {
            $stmt1 = DB::connect()->prepare(
                'INSERT INTO commande (date_creation,id_client,acheter)
                VALUES (:date_creation,:id_client,:acheter)
                ');
            $stmt1->bindParam(':date_creation',$data['date_creation']);
            $stmt1->bindParam(':id_client',$data['id_client']);
            $stmt1->bindParam(':acheter',$data['acheter']);
            $stmt1->execute();
            //
            $query="SELECT * from commande order by id desc";
            $stmt=DB::connect()->prepare($query);
            $stmt->execute();
            $s=$stmt->fetch();
            $id_commande=$s['id'];
        }

        $stmt2 = DB::connect()->prepare(
            'INSERT INTO produits_composant (quantite,id_produit,id_commande)
            VALUES (:quantite,:id_produit,:id_commande)
            ');
        $stmt2->bindParam(':quantite',$data['quantite']);
        $stmt2->bindParam(':id_produit',$data['id_produit']);
        $stmt2->bindParam(':id_commande',$id_commande);
        $stmt2->execute();  
        return 'ok'; 
    }
}
?>