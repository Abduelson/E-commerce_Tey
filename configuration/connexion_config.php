<?php 
    try{
        $acess=new PDO("mysql:host=localhost;dbname=Ecommerce_Tey;charset=utf8", "root", "");
        $acess->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }catch(Exception $e){
      $e->getMessage();
    }
?>