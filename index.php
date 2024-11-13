<?php
session_start();
require_once 'include/configuration.php';

Autoloader::chargerClasses();


if (!isset($_REQUEST['gestion'])) {

    $_REQUEST['gestion'] = 'accueil';

}


$oRouteur = new $_REQUEST['gestion']($_REQUEST);

$oRouteur->choixAction();


