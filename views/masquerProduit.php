<?php
if(isset($_GET['id']))
{
$products=new ProductController();
$products->masquerProduct();
}
?>