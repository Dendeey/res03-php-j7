<?php

// REQUIRES

require "logic/router.php";
require "logic/database.php";
require "models/User.php";


// CHECKROUTE

if(isset($_GET["route"]))
{
    return checkRoute($_GET["route"]);
}
else
{
    return checkRoute("");
}

// SAVE USER ON SUBMIT CLICK

if(isset($_POST["firstName"]) && isset($_POST["lastName"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirmPassword"])) 
{
    
    if($_POST["password"] === $_POST["confirmPassword"])
    {
        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        
        $user = new User($_POST["firstName"], $_POST["lastName"], $_POST["email"], $hashed_password);
        
        saveUser($user);
    }
    else
    {
        echo "Les mots de passes ne sont pas identiques";
    }
    
    
}
    


?>