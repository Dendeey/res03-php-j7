<?php

function checkRoute(string $route) : void 
{
    
    if(isset($route) === "connexion")
    {
        require "pages/login.php";
    }
    if(isset($route) === "creer-un-compte")
    {
        require "pages/register.php";
    }
    if(isset($route) === "mon-compte")
    {
        require "pages/account.php";
    }
    else
    {
        require "pages/homepage.php";
    }
    
    
}

?>