<?php
require_once "Config.php";

if(isset($_SESSION['usuario'])){
    include("Boundary/index.html");
}else{
    header("Location: login.php");
}