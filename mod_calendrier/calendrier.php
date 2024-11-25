<?php
class Calendrier extends Smarty {
    private $parametre = array();
    private $oControleur;

    public function __construct($parametre = []) {
        $this->parametre = $parametre;
        parent::__construct();
        
        // Configuration des dossiers
        $this->setTemplateDir('mod_calendrier/vue/');
        $this->setCompileDir('templates_c/');
        
        // Définir le chemin des plugins Smarty
        $this->addPluginsDir(SMARTY_PLUGINS_DIR);
        
        // Chargement du plugin date_format
        if (!function_exists('smarty_modifier_date_format')) {
            require_once(SMARTY_PLUGINS_DIR . 'modifier.date_format.php');
        }
        
        // Enregistrement sécurisé des modificateurs
        try {
            if (!isset($this->registered_plugins['modifier']['date_format'])) {
                $this->registerPlugin('modifier', 'date_format', 'smarty_modifier_date_format');
            }
            if (!isset($this->registered_plugins['modifier']['reset'])) {
                $this->registerPlugin('modifier', 'reset', 'reset');
            }
            if (!isset($this->registered_plugins['modifier']['end'])) {
                $this->registerPlugin('modifier', 'end', 'end');
            }
            if (!isset($this->registered_plugins['modifier']['in_array'])) {
                $this->registerPlugin('modifier', 'in_array', 'in_array');
            }
            if (!isset($this->registered_plugins['modifier']['range'])) {
                $this->registerPlugin('modifier', 'range', 'range');
            }
        } catch (Exception $e) {
            error_log("Erreur lors de l'enregistrement des plugins Smarty : " . $e->getMessage());
        }
        
        // Initialiser le contrôleur
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

    // Méthodes pour les modificateurs personnalisés
    public function modifierReset($array) {
        if (!is_array($array)) {
            return $array;
        }
        return reset($array);
    }
    
    public function modifierEnd($array) {
        if (!is_array($array)) {
            return $array;
        }
        return end($array);
    }
    
    public function modifierRange($start, $end = null, $step = 1) {
        if ($end === null) {
            $end = $start;
            $start = 1;
        }
        return range((int)$start, (int)$end, (int)$step);
    }
}