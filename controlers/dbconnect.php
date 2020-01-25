<?php
    function dbconnect(){
        $PDO = new PDO("mysql:host=localhost; dbname=masomo_tegra", "root", "");
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        return $PDO;
    }
?>