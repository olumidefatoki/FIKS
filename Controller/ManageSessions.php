<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
if (!isset($_SESSION['username'])) {
    header('location:../login.php');    
    exit;
    exit();
}

?>