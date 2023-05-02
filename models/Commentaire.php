<?php
class Commentaire{
    public static function getAllComments($data)
    {
        $stmt = DB::connect()->prepare("SELECT *,client.nom_complet as nom_complet,client.id as id_proprietaire_commentaire
         FROM commentaire inner join client
        on commentaire.id_client=client.id where id_produit=:id_produit
         order by commentaire.id desc");
         $stmt->bindParam('id_produit',$data['id_produit']);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    public static function add($data)
    {
        $stmt = DB::connect()->prepare(
            'INSERT INTO commentaire 
            (commentaire,id_client,id_produit)
            VALUES
            (:commentaire,:id_client,:id_produit)
            ');
        $stmt->bindParam(':commentaire',$data['commentaire']);
        $stmt->bindParam(':id_client',$data['id_client']);
        $stmt->bindParam(':id_produit',$data['id_produit']);
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