<?php
    session_start();
    
    require_once("inc/db_query.php");
    //require_once("inc/authorization.php");

    $db = new DBQuery();
    //$authorization = new Authorization();

    if(!isset($_GET["house"])){
        header("Location: timeline.php");
        die();
    }

    if($_GET["house"] == "oem"){
        include("src/oem.php");
    }else if($_GET["house"] === "inline"){
        include("src/inline.php");
    }else{
        header("Location: timeline.php");
    }

?>