<?php
class Parametre
{
    private static $adresseRoot;
    private static $serverRoot;
    private static $host;
    private static $port;
    private static $dbname;
    private static $login;
    private static $pwd;
    
    /* Getters & Setters */

    public static function getAdresseRoot()
    {
        return Parametre::$adresseRoot;
    }
    
    public static function getServerRoot()
    {
        return self::$serverRoot;
    }
    public static function getHost()
    {
        return self::$host;
    }
    public static function getPort()
    {
        return self::$port;
    }
    public static function getDbname()
    {
        return self::$dbname;
    }
    public static function getLogin()
    {
        return self::$login;
    }
    public static function getPwd()
    {
        return self::$pwd;
    }

    /* init */
    public static function init()
    { // init créé le lien avec le fichier parametre.ini
        if (file_exists("Parametre.ini")) $fic="Parametre.ini"; else $fic="../../Parametre.ini";

        $fp = fopen($fic, "r");

        while (!feof($fp))
        {
            $ligne = fgets($fp, 4096);
            if ($ligne)
            {
                $info = explode(":", $ligne);
                $param[] = substr($info[1], 0, strlen($info[1]) - 2);
            }
        }

        self::$serverRoot = $param[0];
        self::$adresseRoot = $param[1];
        self::$host = $param[2];
        self::$port = $param[3];
        self::$dbname = $param[4];
        self::$login = $param[5];
        self::$pwd = $param[6];
    }

}
?>