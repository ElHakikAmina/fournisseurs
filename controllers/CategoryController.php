<?php
class CategoryController{

    public function masquerCategory(){
        if(isset($_GET["id"]))
        {
            $data = array(
                'id' =>$_GET['id']
            );
            $category=Category::masquerCategory($data);
            return $category;
        } 
    }

    public function getOneCategory()
    {
        if(isset($_GET['id']))
        {
            $data = array(
                'id' =>$_GET['id']
            );
        }
        $product = Category::getOneCategory($data);
        return $product;
    }

    public function totalCategory(){return Category::totalCategory(); }
    public function getProductsInCategory()
    {
        
        if(isset($_GET['id']) and isset($_GET['p']))
        {
            $debut=($_GET['p']-1)*4;
            $data=array('id'=>$_GET['id'],
            'debut'=>$debut,
            'p'=>$_GET['p']
        );
            return $categories=Category::getProductsInCategory($data);
        }
        
    }
    public function getAllCategories()
    {
        $categories=Category::getAll();
        return $categories;
    }
    public function update(){
        if(isset($_POST['modify']))
        {
            
                $icone=file_get_contents($_FILES['icone']['tmp_name']);
                $photo=file_get_contents($_FILES['photo']['tmp_name']);
                $data=array(
                    'id'=>$_GET['id'],
                    'nom'=>$_POST['nom'],
                    'description'=>$_POST['description'],
                    'photo'=>$photo,
                    'icone'=>$icone,
                );
           $result=Category::update($data);
           if($result == 'ok')
           {
                header('location:http://localhost/fournisseurs/index');
           }else
           {
                echo $result;
           }
        }
    }
    public function add()
    {
        if(isset($_POST['submit']))
        {
            $icone=file_get_contents($_FILES["icone"]["tmp_name"]);
            $photo=file_get_contents($_FILES["photo"]["tmp_name"]);
            $data=array(
                'nom'=>$_POST['nom'],
                'description'=>$_POST['description'],
                'photo'=>$photo,
                'icone'=>$icone,
                'masquer'=>0,
            );
            $result=Category::add($data);
            if($result =='ok')
            {
                header('location:index');
            }
            else
            {
                echo $result;
            }
        }
    }
}
?>