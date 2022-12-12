
<?php 

class Connexion {

    public static $bdd ; 
    public function __construct ()
	{
        
	
	}


    public static function  initConnexion()
    {
        $dns = "mysql:host=database-etudiants.iut.univ-paris8.fr;dbname=dutinfopw201611;charset=utf8";
        $user = "dutinfopw201611";
        $pass = "semugepu";
        self::$bdd = new PDO($dns , $user , $pass);
        //self::$bdd = new PDO('mysql:host=localhost;dbname=ecole;port=3306','root','');
        // Connexion à la base de données sur l'ordi de Armand
        //self::$bdd = new PDO('mysql:host=localhost;dbname=bdsaelivre2;port=3306','armand','armand12');
      


    }

}













?>