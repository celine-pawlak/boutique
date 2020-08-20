<?php
    spl_autoload_register('mon_autoloader');

    function mon_autoloader($class)
        {
            require "class/$class.php";
        }
?>