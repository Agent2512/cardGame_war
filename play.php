<?php
require "inc/inc.php";
session_start();
if(isset($_GET["game"]) == false) header("Location: index.php");
if(isset($_SESSION["username"]) == false) header("Location: index.php");

$username = $_SESSION["username"];

// printf("<pre>");
// printf($_SESSION["username"]);
// printf("</pre>");


load("play.php");