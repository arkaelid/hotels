<?php
class Calendrier {
    private $parametre = array();
    private $oControleur;

    public function __construct($parametre) {
        $this->parametre = $parametre;
        $this->oControleur = new CalendrierControleur($this->parametre);
    }

    public function choixAction() {
        if (isset($this->parametre['action'])) {
            switch ($this->parametre['action']) {
                case 'voir':
                    $this->oControleur->afficherMois();
                    break;
                default:
                    $this->oControleur->afficherMois();
                    break;
            }
        } else {
            $this->oControleur->afficherMois();
        }
    }
}