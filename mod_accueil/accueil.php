<?php

/**
 * Class Accueil
 * Routeur du module Accueil
 * @author xxx
 */
class Accueil
{
    private $parametre = [];
    private $oControleur; //

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oControleur = new AccueilControleur($this->parametre);
    }

    public function choixAction(){

        $this->oControleur->liste();

    }
}
