<?php

session_start();


// REQUIRES

require "logic/router.php";
require "logic/database.php";




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
    
if(isset($_POST["loginEmail"]) && !empty($_POST["loginEmail"]) && isset($_POST["loginPassword"]) && !empty($_POST["loginPassword"]))
{
    
    $loadEmail = loadUser($_POST["loginEmail"]);
    $userPassword = $_POST["loginPassword"];
    
    
    if(password_verify($userPassword, $loadEmail->getPassword())) 
    {
        $_GET["route"] = "mon-compte";
        $_SESSION["isConnected"] = true;
        $_SESSION["userId"] = $loadEmail->getId();
        var_dump($_SESSION);
        echo 'Welcome !';
    }
    else 
    {
        echo 'Invalid password.';
    }
        
}
    
    

// CHECKROUTE

if(isset($_GET["route"]))
{
    checkRoute($_GET["route"]);
}
else
{
    checkRoute("");
}


?>