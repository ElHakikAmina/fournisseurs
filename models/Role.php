<?php
class Role{
    static public function getAllRoles()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM role');
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public static function addRole($data)
    {
        $stmt = DB::connect()->prepare(
            'INSERT INTO role 
            (role)
            VALUES
            (:role)
            ');
        $stmt->bindParam(':role',$data['role']);
        
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