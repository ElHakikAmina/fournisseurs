<?php
class HomeController
{
    public function __construct()
    {
        $this->router();
    }
    //
    public function router()
   {
    $page='';
    if(isset($_GET['page']) and !empty($_GET['page']))
    {
        $page=htmlspecialchars($_GET['page']);
    }
    $pages=['artisan','uniteproduction','grossisste','cooperative','modifyProfile','addVille','addRole','contact','profile','category','panier','historiquecommandes','commandelivree','commandenonlivree','commandenonenvoyee','commandeConfirmee','commandeNonConfirmee','afficheproduitadmin','affichecategory','afficheclient','commandesClient','dashboard','product','login','register','index','addCategory','modifyCategory','addProduct','modifyProduct','search','masquerProduit','afficheProduitMasquer','afficheCommandeProduit'];
    if(in_array($page,$pages))
    {
        //$home->index($page);
        include ('views/'.$page.'.php');
    }else if($page=='logout')
    {
        include ('controllers/'.$page.'.php');
    }
}

}
?>