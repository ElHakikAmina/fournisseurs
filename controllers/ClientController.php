<?php
class ClientController{
    public function getcooperative()
     {
         $cooperatives=User::getcooperative();
         return $cooperatives;
    }
    public function getgrossisste()
     {
         $grossisstes=User::getgrossisste();
         return $grossisstes;
    }
    public function getuniteproduction()
     {
         $uniteproductions=User::getuniteproduction();
         return $uniteproductions;
    }
    public function getartisan()
     {
         $artisans=User::getartisan();
         return $artisans;
    }
    public function modifyProfile()
    {
            if(isset($_POST['submit']))
            {
                if(empty($_FILES["image"]["name"]))
                {
                     $profile = new ClientController();
                     $profileWithId=$profile->getOneProfile();
                     $image_profile=$profileWithId->image;
                     
                }else
                {
                    $image_profile=file_get_contents($_FILES["image"]["tmp_name"]);    
                }
                $data = array(
                    'id' =>$_SESSION['id_client'],
                    'nom_complet' => $_POST['nom_complet'],
                    'telephone' => $_POST['telephone'],
                    'adresse' => $_POST['adresse'],
                    'ville' => $_POST['ville'],
                    'role' => $_POST['role'],
                    'image'=>$image_profile,
                );
                $result = User::modifyProfile($data);
                if($result === 'ok')
                {
                    header("location:http://localhost/fournisseurs/profile/".$_SESSION['id_client']);
                }else
                {
                    echo $result;
                }
            }
        
    }
    public function getOneProfile()
    {
        if(isset($_GET['id']))
        {
            $data = array(
                'id' =>$_GET['id']
            );
        }else if(isset($_SESSION['id_client']))
        {
            $data = array(
                'id' =>$_SESSION['id_client']
            );
        }
        $profile = User::getProfile($data);
        return $profile;
    }
    public function getAll()
    {
        $clients=User::getAll();
        return $clients;
    }
    public function totalClient()
    {
        $totalClient=User::totalClient();
        return $totalClient;
    }
    public function register()
    {
        if(isset($_POST['submit'])){     
        $password =SHA1($_POST['password']);
        $data =array(
            'nom_complet'=>$_POST['nom_complet'],
            'telephone'=>$_POST['telephone'],
            'adresse'=>$_POST['adresse'],
            'ville'=>$_POST['ville'],
            'email'=>$_POST['email'],
            'password'=>$password,
            'role'=>$_POST['role'],
        );
        $result = User::createUser($data);
        if($result ==='ok'){
            header('location:login');
        }else{
            echo $result;
        }
    }
    }
    public function auth()
    {
        if(isset($_POST['btn-login']))
        {
            $data['email'] = $_POST['email'];
            
            $resultAdmin = User::loginAdmin($data);
            if($resultAdmin->email === $_POST['email'] && SHA1($_POST['password'])===$resultAdmin->password)
            {
                $_SESSION['logged']=true;
                $_SESSION['admin']=$resultAdmin->email;
				header('location:index');
            }elseif($resultAdmin->email != $_POST['email']){
                $resultClient = User::loginClient($data);
                if($resultClient->email === $_POST['email'] && SHA1($_POST['password'])===$resultClient->password)
                {
                $_SESSION['logged']=true;
                $_SESSION['client']=$resultClient->email;
                $_SESSION['id_client']=$resultClient->id;
                $_SESSION['role']=$resultClient->id_role;
				header('location:index');
                }else{
                    header('location:login');
                }
            }else{
				header('location:login');
            }
        }
    }
    static public function logout()
    {
        session_destroy();
    }
    //
   public function isAdminConnected()
   {
    if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true || !isset($_SESSION['admin'])) 
    header('location:index');
   }
   //
   public function isClientConnected()
   {
    if(!isset($_SESSION['logged']) || $_SESSION['logged']!=true || !isset($_SESSION['client']) )
    header('location:index');
   }
}
?>