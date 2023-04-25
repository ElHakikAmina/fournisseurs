<?php
class Ville{
    static public function getAllVilles()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM ville');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function addVille($data)
    {
        $stmt = DB::connect()->prepare(
            'INSERT INTO ville 
            (ville)
            VALUES
            (:ville)
            ');
        $stmt->bindParam(':ville',$data['ville']);
        
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