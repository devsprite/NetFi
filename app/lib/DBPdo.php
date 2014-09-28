<?php
class DBPdo
{
    public static function connexPDO(){
        include_once(__DIR__.'/configDB.php');
        try{
            $pdo = new PDO(DB_TYPE.':host='.DB_HOST.';dbname='.DB_NAME.'',DB_USER, DB_PASSWORD);
            //$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->exec("SET CHARACTER SET utf8");
            return $pdo;
        }catch(PDOException $except){
            echo "Échec de la connexion, ".$except->getMessage();
            return false;
            exit();
        }
    }
}