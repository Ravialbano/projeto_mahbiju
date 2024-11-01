<?php 
session_start();
if(!isset($_SESSION['nome'])){
    header('location: index.html?erro=true');
}
?>