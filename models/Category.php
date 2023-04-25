<?php
class Category{

    static public function masquerCategory($data)
    {
        $stmtProduct = DB::connect()->prepare('update  produit SET
        masquer = 1 where categorie = :idCategory
            ');
        $stmtProduct->bindParam(':idCategory',$data['id']); 
        $stmtProduct->execute();
            //
        $stmtCategory = DB::connect()->prepare('update  categorie SET
        masquer = 1 where id = :id
            ');
        $stmtCategory->bindParam(':id',$data['id']);    
        if($stmtCategory->execute())
        {
            return 'ok';
        }else
        {
            return 'error';
        }
        $stmtCategory->close();
        $stmtCategory = null;
    }

    static public function getOneCategory($data)
    {
        $id = $data['id'];
        try{
            $query = 'SELECT * FROM categorie WHERE id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id"=>$id));
            $product = $stmt->fetch(PDO::FETCH_OBJ);
            return $product;
        }catch(PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }

    public static function getProductsInCategory($data)
    {
        $stmt = DB::connect()->prepare(' SELECT *
        FROM categorie INNER JOIN produit
        ON categorie.id = produit.categorie where categorie.id='.$data['id'].' limit '.$data['debut'].',4');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    public static function totalCategory()
    {
        $query='SELECT * FROM categorie';
        $stmt =DB::connect()->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM categorie where masquer =0');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    public static function update($data)
    {
        $stmt=DB::connect()->prepare(
            'update categorie set nom=:nom, description=:description, photo=:photo,
            icone=:icone where id=:id
             '
        );
        $stmt->bindParam(':id',$data['id']);
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':description',$data['description']);
        $stmt->bindParam('photo',$data['photo']);
        $stmt->bindParam('icone',$data['icone']);
        if($stmt->execute())
        {
            return 'ok';
        }else
        {
            return 'erreur';
        }
        $stmt->close();
        $stmt=null;
    }
    public static function add($data)
    {
        $stmt=DB::connect()->prepare(
            'INSERT INTO categorie (
                nom, description, photo, icone, masquer
            ) VALUES (
                :nom, :description, :photo, :icone,:masquer
            )'
        );
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':description',$data['description']);
        $stmt->bindParam(':photo',$data['photo']);
        $stmt->bindParam(':icone',$data['icone']);
        $stmt->bindParam(':masquer',$data['masquer']);
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