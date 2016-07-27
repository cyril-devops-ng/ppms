<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
define('FORTE_PPMS_APP', 1);
require_once "includes/db.inc.php";
require_once "includes/dbconfig.inc.php";

$get = $_GET; $post = $_POST; $session = $_SESSION;

require_once 'controller/controller.php';

?>