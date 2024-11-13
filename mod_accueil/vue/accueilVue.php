<?php

class AccueilVue {
    private $parametre;
    private $tpl;

    public function __construct($parametre) {
        $this->parametre = $parametre;
        $this->tpl = new Smarty();
    }

    public function genererAffichage($tabBord) {
        // Créer une instance de connexionVue pour générer le menu
        $connexionVue = new ConnexionVue($this->parametre);
        
        // Préparer les statistiques dans un format plus simple
        $statistiques = array(
            array(
                'nombre' => $tabBord['statistiques']['reservations']['nombre'],
                'libelle' => 'Réservations'
            ),
            array(
                'nombre' => $tabBord['statistiques']['chambres']['nombre'],
                'libelle' => 'Chambres'
            ),
            array(
                'nombre' => $tabBord['statistiques']['clients']['nombre'],
                'libelle' => 'Clients'
            )
        );
        
        // Assigner les variables au template
        $this->tpl->assign('SCRIPT_NAME', 'Accueil');
        $this->tpl->assign('menuConnexion', $connexionVue->genererMenu());
        $this->tpl->assign('tabBord', array('titre' => $tabBord['titre']));
        $this->tpl->assign('statistiques', $statistiques);
        
        // Afficher le header avant le contenu principal
        
        // Afficher le template principal
        $this->tpl->display('mod_accueil/vue/accueilVue.tpl');
    }
}