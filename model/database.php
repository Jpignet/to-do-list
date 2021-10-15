<?php
try{
    $bdd = new PDO( 'mysql:host=localhost;dbname=to_do_list;charset=UTF8', 'root', '');
}catch(Exception $e){
    die('Une erreur a été trouvé : ' . $e->getMessage());
}
