<?php
class VilleController{
    public function getAllVilles()
    {
        $villes=Ville::getAllVilles();
        return $villes;
    }
    public function addVille()
    {
        if(isset($_POST['submit']))
        {
            $data=array(
                'ville'=>$_POST['ville'],
            );
            $result = Ville::addVille($data);
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