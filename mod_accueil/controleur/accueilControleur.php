<?php

class AccueilControleur {
    private $parametre;
    private $oModele;
    private $oVue;

    public function __construct($parametre) {
        $this->parametre = $parametre;
        $this->oModele = new AccueilModele($parametre);
        $this->oVue = new AccueilVue($parametre);
    }

    public function liste() {
        // Récupérer les statistiques via le modèle
        $stats = $this->oModele->getStatistiques();
        
        // Préparer les données pour la vue
        $tabBord = array(
            'titre' => 'Tableau de Bord',
            'statistiques' => array(
                'reservations' => array(
                    'nombre' => $stats['reservations'],
                    'libelle' => 'Réservations'
                ),
                'chambres' => array(
                    'nombre' => $stats['chambres'],
                    'libelle' => 'Chambres'
                ),
                'clients' => array(
                    'nombre' => $stats['clients'],
                    'libelle' => 'Clients'
                )
            )
        );
        
        // Passer les données à la vue
        $this->oVue->genererAffichage($tabBord);
    }
}