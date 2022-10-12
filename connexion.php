
<?php 

class Connexion {

    public static $bdd ; 
    public function __construct ()
	{
        
	
	}


    public static function  initConnexion()
    {
        $dns = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw20169";
        $user = "dutinfopw20169";
        $pass = "vubehety";
        self::$bdd = new PDO($dns , $user , $pass);


        //self::$bdd = new PDO('mysql:host=localhost;dbname=ecole;port=3306','root','');

    }

}













?>