<?php
session_start();
if(!isset($_SESSION['iduser']) || $_SESSION['idrole']!=1){
    header("location: login.php");
    exit();
}
