<?php
    class App
        {
            static $db = null;
            static function getDatabase()
                {
                    if(!self::$db)
                        {
                             self::$db = new Database('boutique', 'root', '');
                        }                   
                    return self::$db;
                }
            static function redirect($page)
                {
                    header("Location:$page");
                }
        }
?>