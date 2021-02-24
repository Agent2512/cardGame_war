<?php
function load($page){
    require "./components/startHead.php";
    require "./pages/$page";
    require "./components/endHead.php";
}