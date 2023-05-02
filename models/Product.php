<?php
class Product {
    static public function getAllProductsSESSION($data)
    {
        $query="SELECT * from produit where id_client=:id_client";
        $stmt=DB::connect()->prepare($query);
        $stmt->bindParam(':id_client',$data['id_client']);
       
        $stmt->execute();
        
        return $stmt->fetchAll();
    }
    static public function getAllProducts()
    {
        $query="select * from produit";
        $query=DB::connect()->prepare($query);
        $query->execute();
        return $query->fetchAll();
    }
    static public function NombreDeFoisUnProduitEstAchetee($data)
    {
        $query="select id_produit from produits_composant where id_produit=:id_produit";
        $stmt =DB::connect()->prepare($query);
        $stmt->bindParam(':id_produit',$data['id_produit']);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    static public function TopVentes()
    {
        $stmt = DB::connect()->prepare("select produit.* , count(produits_composant.id_produit) as produitCelebre from produits_composant join produit on produit.id=produits_composant.id_produit group by produits_composant.id_produit order by produitCelebre DESC limit 5");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    static public function getAllSellerProduct($data)
    {
        $id = $data['id'];
        try{
            $query = 'SELECT * FROM produit 
             WHERE id_client=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id"=>$id));
            $product = $stmt->fetchAll();
            return $product;
        }catch(PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }
    static public function NombreDePagesPagination($data)
    {
        $stmt = DB::connect()->prepare(' SELECT *
        FROM categorie INNER JOIN produit
        ON categorie.id = produit.categorie where categorie.id='.$data['id'].'');
       // $stmt =DB::connect()->prepare($query);
        $stmt->execute();
        $countProduit = $stmt->rowCount();
        $nombreDePages=ceil($countProduit/4);
        return $nombreDePages;
    }
    static public function afficheProduitMasquer()
    {
        try{
            $query = 'SELECT * FROM produit WHERE masquer = 1';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute();
            $product =  $stmt->fetchAll();
            return $product;
        }catch(PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }
    static public function totalProductOneClient($data){
        $query="SELECT * from produit where id_client=:id_client ";
        $stmt =DB::connect()->prepare($query);
        $stmt->bindParam(':id_client',$data['id_client']);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    static public function totalProduct(){
        $query="SELECT * from produit  ";
        $stmt =DB::connect()->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    static public function  totalProductMasquer(){
        $query="SELECT * from produit where masquer = 1";
        $stmt =DB::connect()->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    static public function masquer($data)
    {
        $stmt = DB::connect()->prepare('update  produit SET
        masquer = 1 where id = :id
            ');
        $stmt->bindParam(':id',$data['id']);    
        if($stmt->execute())
        {
            return 'ok';
        }else
        {
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }

    static public function delete($data)
    {
        $id = $data['id'];
        try{
            $query = 'delete FROM produit WHERE id=:id';
            $stmt=DB::connect()->prepare($query);
            $stmt->execute(array(":id" => $id));
            return 'ok';
        }catch(PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }

    static public function update($data)
    {
        $stmt = DB::connect()->prepare('update  produit SET
        libelle = :libelle,
        prix_final = :prix_final,prix_offre = :prix_offre, description=:description, categorie=:categorie, photo=:photo where id = :id
            ');
        $stmt->bindParam(':id',$data['id']);    
        $stmt->bindParam(':libelle',$data['libelle']);
        $stmt->bindParam(':prix_final',$data['prix_final']); 
        $stmt->bindParam(':prix_offre',$data['prix_offre']);
        $stmt->bindParam(':description',$data['description']);
        $stmt->bindParam(':categorie',$data['categorie']);
        $stmt->bindParam(':photo',$data['image']);

        if($stmt->execute())
        {
            return 'ok';
        }else
        {
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
    static public function getProduct($data)
    {
        $id = $data['id'];
        try{
            $query = 'SELECT * FROM produit LEFT JOIN client
            on client.id = produit.id_client
             WHERE produit.id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id"=>$id));
            $product = $stmt->fetch(PDO::FETCH_OBJ);
            return $product;
        }catch(PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }
    //
    static public function CategoryPrixMoins($data)
    {
        $category = $data['category'];
        try{
            $query='SELECT * FROM produit WHERE categorie 
            LIKE ? order by prix_final desc';
            $stmt=DB::connect()->prepare($query);
            $stmt->execute(array('%'.$category.'%'));
            return $products=$stmt->fetchAll();
        }catch(PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }
    //
    static public function CategoryPrixPlus($data)
    {
        $category = $data['category'];
        try{
            $query='SELECT * FROM produit WHERE categorie 
            LIKE ? order by prix_final asc';
            $stmt=DB::connect()->prepare($query);
            $stmt->execute(array('%'.$category.'%'));
            return $products=$stmt->fetchAll();
        }catch(PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }
    //
    static public function searchProduct($data)
    {
        $search = $data['search'];
        try{
            $query='SELECT * FROM produit WHERE libelle 
            LIKE ? and masquer = 0';
            $stmt=DB::connect()->prepare($query);
            $stmt->execute(array('%'.$search.'%'));
            return $products=$stmt->fetchAll();
        }catch(PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }
    static public function nouvelleArrivee()
    {
        $stmt = DB::connect()->prepare("SELECT * FROM produit where masquer != 1  order by id desc limit 4");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    public static function add($data)
    {
        $stmt = DB::connect()->prepare(
            'INSERT INTO produit 
            (libelle,prix_final,prix_offre,description,categorie,photo,masquer,id_client,quantity,last_quantity)
            VALUES
            (:libelle,:prix_final,:prix_offre,:description,:categorie,:photo,:masquer,:id_client,:quantity,:last_quantity)
            ');
        // $stmt->bindParam(':reference',$data['reference']);
        $stmt->bindParam(':libelle',$data['libelle']);
        // $stmt->bindParam(':code_barre',$data['code_barre']);
        // $stmt->bindParam(':prix_achat',$data['prix_achat']);
        $stmt->bindParam(':prix_final',$data['prix_final']);
        $stmt->bindParam(':prix_offre',$data['prix_offre']);
        $stmt->bindParam(':description',$data['description']);
        $stmt->bindParam(':categorie',$data['categorie']);
        $stmt->bindParam(':photo',$data['photo']);
        $stmt->bindParam(':masquer',$data['masquer']);
        $stmt->bindParam(':id_client',$data['id_client']);
        $stmt->bindParam(':quantity',$data['quantity']);
        $stmt->bindParam(':last_quantity',$data['last_quantity']);
        if($stmt->execute())
        {
            return 'ok';
        }else{
            return 'erreur';
        }
        $stmt->close();
        $stmt=null;
    }
}
?>