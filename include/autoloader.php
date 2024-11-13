<?php
/**
 * Description of autoloader
 *
 * @author tvosgiens
 */
class Autoloader
{
    public static function chargerClasses()
    {
        // Enregistre la méthode d'autoload
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($maClasse)
    {
        // Mettre en minuscule la première lettre de la classe
        $maClasse = lcfirst($maClasse);

        // Répertoires où chercher les classes
        $repertoires = array(
            'mod_accueil/',
            'mod_accueil/controleur/',
            'mod_accueil/modele/',
            'mod_accueil/vue/',
            'mod_paymenttypes/',
            'mod_paymenttypes/controleur/',
            'mod_paymenttypes/modele/',
            'mod_paymenttypes/vue/',
            'mod_connexion/',
            'mod_connexion/controleur/',
            'mod_connexion/modele/',
            'mod_connexion/vue/',
        );

        // Recherche dans chaque répertoire
        foreach ($repertoires as $repertoire) {
            // Vérifie si un fichier .php existe dans les répertoires
            if (file_exists($repertoire . $maClasse . '.php')) {
                require_once($repertoire . $maClasse . '.php');
                return;
            }
        }
    }
}