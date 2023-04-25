<?php
class RoleController{
    public function getAllRoles()
    {
        $roles=Role::getAllRoles();
        return $roles;
    }
    public function addRole()
    {
        if(isset($_POST['submit']))
        {
            $data=array(
                'role'=>$_POST['role'],
            );
            $result = Role::addRole($data);
            if($result=='ok')
                {
                    header('location:index');
                }else
                {
                    echo $result;
                }
        }
    }
}
?>