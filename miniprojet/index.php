<?php

// REQUIRES

require "logic/router.php";

// FUNCTION CHECKROUTE

if(isset($_GET["route"]))
{
    return checkRoute($_GET["route"]);
}
else
{
    return checkRoute("");
}

?>