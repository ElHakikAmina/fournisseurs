<?php
class User{
    static public function getgrossisste()
    {
        $stmt = DB::connect()->prepare("SELECT *
         FROM client where id_role='5'");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    static public function getcooperative()
    {
        $stmt = DB::connect()->prepare("SELECT *
         FROM client where id_role='4'");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    static public function getartisan()
    {
        $stmt = DB::connect()->prepare("SELECT *
         FROM client where id_role='3'");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    static public function getuniteproduction()
    {
        $stmt = DB::connect()->prepare("SELECT *
         FROM client where id_role='2'");
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    static public function modifyProfile($data)
    {
        $stmt = DB::connect()->prepare('update  client SET
        nom_complet = :nom_complet,telephone = :telephone,adresse = :adresse,
        ville = :ville,id_role = :role, image=:image where id = :id
            ');
        $stmt->bindParam(':id',$data['id']);    
        $stmt->bindParam(':nom_complet',$data['nom_complet']);
        $stmt->bindParam(':telephone',$data['telephone']);
        $stmt->bindParam(':adresse',$data['adresse']);
        $stmt->bindParam(':ville',$data['ville']);
        $stmt->bindParam(':role',$data['role']);
        $stmt->bindParam(':image',$data['image']);
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
    static public function getProfile($data)
    {
        $id = $data['id'];
        try{
            $query='SELECT client.*, role.*, ville.ville AS ville_name
            FROM client
            INNER JOIN role ON client.id_role = role.id 
            INNER JOIN ville ON client.ville = ville.id
            WHERE client.id=:id';
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":id"=>$id));
            $product = $stmt->fetch(PDO::FETCH_OBJ);
            return $product;
        }catch(PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
    }
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM client');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt=null;
    }
    static public function totalClient()
    {
        $query='SELECT * FROM client';
        $stmt =DB::connect()->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();
        return $count;
    }
    static public function createUser($data)
    {
        $stmt = DB::connect()->prepare('
        INSERT INTO client 
        (nom_complet,telephone,adresse,ville,email,password,id_role)
        VALUES
        (:nom_complet,:telephone,:adresse,:ville,:email,:password,:role)
        ');
        $stmt->bindParam(':nom_complet',$data['nom_complet']);
        $stmt->bindParam(':telephone',$data['telephone']);
        $stmt->bindParam(':adresse',$data['adresse']);
        $stmt->bindParam(':ville',$data['ville']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':password',$data['password']);
        $stmt->bindParam(':role',$data['role']);
        if($stmt->execute())
        {
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
    static public function loginAdmin($data)
    {
        $email=$data['email'];
        try{
            $queryAdmin='SELECT * FROM admin where email=:email';
            $stmtAdmin =DB::connect()->prepare($queryAdmin);
            $stmtAdmin->execute(array(":email"=>$email));
            $userAdmin =$stmtAdmin->fetch(PDO::FETCH_OBJ);
            return $userAdmin;
            if($stmtAdmin->execute())
            {
                return 'ok';
            }
        }catch (PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
        
    }
    static public function loginClient($data)
    {
        $email=$data['email'];
        try{
            $queryClient='SELECT * FROM client where email=:email';
            $stmtClient =DB::connect()->prepare($queryClient);
            $stmtClient->execute(array(":email"=>$email));
            $userClient =$stmtClient->fetch(PDO::FETCH_OBJ);
            return $userClient;
            if($stmtClient->execute())
            {
                return 'ok';
            }
        }catch (PDOException $ex)
        {
            echo 'erreur'.$ex->getMessage();
        }
        
    }
   
}
?>