<?php
class CommentaireController
{
    public function getAllComments()
    {
        if(isset($_GET['id'])) 
        {
            $data=array(
                'id_produit'=>$_GET['id'],
            );
        }
        $comment=Commentaire::getAllComments($data);
        return $comment;
    }
    public function add()
    {
        if(isset($_POST['submit']))
        {
            
                $data=array(
                    'commentaire'=>$_POST['commentaire'],
                    'id_produit'=>$_GET['id'],
                    'id_client'=>$_SESSION['id_client'],
                    
                );
                $result = Commentaire::add($data);
                if($result=='ok')
                {
                    header('location:http://localhost/fournisseurs/product/'.$_GET['id']);
                }else
                {
                    echo $result;
                }
            }
        
    }
}
?>