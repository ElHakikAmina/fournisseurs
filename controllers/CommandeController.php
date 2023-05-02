<?php
class CommandeController
{
    // dashboard client
    public function totalCommandeLivreeduClient(){
        $data=array(
            'id_client'=>$_SESSION['id_client'],
        );
        return Commande::totalCommandeLivreeduClient($data); }
        //
    public function totalCommandeNonLivreeduClient(){
        $data=array(
            'id_client'=>$_SESSION['id_client'],
        );
        return Commande::totalCommandeNonLivreeduClient($data);
    }
    //
    public function totalCommandeduClient(){ 
        $data=array(
            'id_client'=>$_SESSION['id_client'],
        );
        return Commande::totalCommandeduClient($data);
    }
    public function getAllCommandesduClient()
    {
        $data=array(
            'id_client'=>$_SESSION['id_client'],
        );
        return  $commandes=Commande::getAllCommandesduClient($data);
    }
    public function totalCommandeNonEnvoyeeduClient(){
        $data=array(
            'id_client'=>$_SESSION['id_client'],
        );
        return Commande::totalCommandeNonEnvoyeeduClient($data);
    }
    public function afficheCommandeProduit(){
     
        if(isset($_GET['id']))
        {
            $data = array(
                'id_commande'=>$_GET['id'],
            );
            return  $commandes=Commande::afficheCommandeProduit($data);
        }    
    }
    public function changerEtat()
    {
        if(isset($_POST['envoyerMtn']))
        {
            $date = date('d-m-y ');
            $data=array(
            'id_commande'=>$_POST['id_commande'],
            'date_envoi'=>$date,
            );
            $result = Commande::changerEtat($data);
            if($result === 'ok')
            {
               header("location:http://localhost/fournisseurs/dashboardClient"); 
            } 
        }elseif (isset($_POST['livrerMtn']))
        {
            $date = date('d-m-y ');
            $data=array(
                'id_commande'=>$_POST['id_commande'],
                'date_livraison'=>$date,
            );
            $result = Commande::changerEtat($data);
            if($result === 'ok')
            {
               header("location:http://localhost/fournisseurs/dashboardClient");
            } 
        }
    }
    public function deleteCommande()
    {
        if(isset($_POST['supprimer']))
        {
            $data['id_commande']=$_POST['id_commande'];
            $result = Commande::deleteCommande($data);
            if($result === 'ok')
            {
               header("location:http://localhost/fournisseurs/dashboard"); 
            } 
        } 
    }
    public function acheterDansPanier(){
        if(isset($_POST['acheter']))
        {
            $date = date('d-m-y h:i:s');
            $data=array(
                'id_commande'=>$_POST['id_commande'],
                'id_produit'=>$_POST['id_produit'],
                'date_creation'=>$date,
                'quantite'=>$_POST['quantite'],
                'acheter'=>1,
            );
            
            $result = Commande::acheterDansPanier($data);
            if($result=='ok')
            {
                header('location:http://localhost/fournisseurs/historiquecommandes');
            }else
            {
                echo $result;
            }
        }
    }
    public function deleteProductCommande(){
        if(isset($_GET['id']))
        {
            $data['id']=$_GET['id'];
            $result = Commande::deleteProductCommande($data);
            if($result === 'ok')
            {
               header("location:http://localhost/fournisseurs/historiquecommandes");
            } 
        }  
    }
    public function panier(){return  $commandes=Commande::panier(); }
    public function historiqueDesCommandes(){return  $commandes=Commande::historiqueDesCommandes(); }
    public function getCommandeLivree(){return  $commandes=Commande::getCommandeLivree(); }
    public function getCommandeNonlivree(){return  $commandes=Commande::getCommandeNonlivree(); }
    public function getCommandeNonenvoyee(){return  $commandes=Commande::getCommandeNonenvoyee(); }
    public function getCommandeNonConfirmee(){return  $commandes=Commande::getCommandeNonConfirmee(); }
    public function getAllCommandes() {return  $commandes=Commande::getAll(); }
    public function totalCommandeNonConfirmee() { return Commande::totalCommandeNonConfirmee(); }
    public function totalCommandeLivree(){return Commande::totalCommandeLivree(); }
    public function totalCommandeNonLivree(){return Commande::totalCommandeNonLivree();}
    public function totalCommandeNonEnvoyee(){return Commande::totalCommandeNonEnvoyee();}
    public function totalCommande(){ return Commande::totalCommande();}
    public function order()
    {
        if(isset($_POST['acheter']) && $_SESSION['logged']!=true)
        {
            header('location:http://localhost/fournisseurs/login');
        }
        else if(isset($_POST['ajouter_au_panier']) && $_SESSION['logged']!=true)
        {
            header('location:http://localhost/fournisseurs/login');
        }
        else if(isset($_POST['ajouter_au_panier']) )
        {
            
            $date = date('d-m-y');
            $data=array(
                'date_creation'=>$date,
                //'date_envoi'=>$_POST['date_envoi'],
                //'date_livraison'=>$_POST['date_livraison'],
                'id_client'=>$_SESSION['id_client'],
                'quantite'=>$_POST['quantite'],
                'id_produit'=>$_POST['id_produit'],
                'id_commande'=>$_SESSION['id_client'],
                'acheter'=>0,
            );
            $result = Commande::order($data);
            if($result=='ok')
            {
                header('location:http://localhost/fournisseurs/panier');
            }else
            {
                echo $result;
            }
        }elseif(isset($_POST['acheter']) && $_SESSION['logged']==true)
        {
            $date = date('d-m-y');
            $data=array(
                'date_creation'=>$date,
                //'date_envoi'=>$_POST['date_envoi'],
                //'date_livraison'=>$_POST['date_livraison'],
                'id_client'=>$_SESSION['id_client'],
                'quantite'=>$_POST['quantite'],
                'id_produit'=>$_POST['id_produit'],
                'id_commande'=>$_SESSION['id_client'],
                'acheter'=>1,
            );
            // var_dump($data); 
            // die();
            $result = Commande::order($data);
            if($result=='ok')
            {
                header('location:http://localhost/fournisseurs/historiquecommandes');
            }else
            {
                echo $result;
            }
        }
            
    }
}
?>