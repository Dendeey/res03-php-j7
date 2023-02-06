<?php

// REQUIRES

require "logic/router.php";
require "logic/database.php";


// CHECKROUTE

if(isset($_GET["route"]))
{
    checkRoute($_GET["route"]);
}
else
{
    checkRoute("");
}


// SAVE USER ON SUBMIT CLICK



if((isset($_POST["firstName"]) && !empty($_POST["firstName"])) && (isset($_POST["lastName"]) && !empty($_POST["lastName"])) && (isset($_POST["email"]) && !empty($_POST["email"])) && (isset($_POST["password"]) && !empty($_POST["password"])) && (isset($_POST["confirmPassword"]) && !empty($_POST["confirmPassword"]))) 
{
    
    
    
    if($_POST["password"] === $_POST["confirmPassword"])
    {
        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        
        $newUser = new User($_POST["firstName"], $_POST["lastName"], $_POST["email"], $hashed_password, $_POST["confirmPassword"]);
        
        saveUser($newUser);
    }
    else
    {
        echo "Les mots de passes ne sont pas identiques";
    }
    
}
    
if (password_verify($_POST["password"], $hashed_password)) 
{
    echo 'Password is valid!';
}
else 
{
    echo 'Invalid password.';
}

?>