<?php
class CalendrierVue {
    private $parametre = array();
    private $tpl;

    public function __construct($parametre) {
        $this->parametre = $parametre;
        $this->tpl = new Smarty();
    }

    public function genererCalendrier($mois, $annee, $reservations, $hotel_info) {
        // Préparer les données du calendrier
        $premier_jour = mktime(0, 0, 0, $mois, 1, $annee);
        $nombre_jours = date('t', $premier_jour);
        $jour_semaine = date('w', $premier_jour);
        
        // Initialiser le tableau des réservations par date
        $reservations_par_date = array();
        $total_reservations = count($reservations);
        
        // Debug des données reçues
        error_log("Données reçues dans la vue : " . print_r($reservations, true));
    
        // Pour chaque jour du calendrier
        $dateActuelle = date('Y-m-d', strtotime("$annee-$mois-01"));
        while (date('m', strtotime($dateActuelle)) == $mois) {
            // Vérifier si il y a des réservations pour cette date
            if (isset($reservations[$dateActuelle])) {
                foreach ($reservations[$dateActuelle] as $reservation) {
                    // Création de l'info de réservation
                    $reservations_par_date[$dateActuelle][] = [
                        'resNo' => $reservation['ResNo'],
                        'nom' => trim($reservation['LastName']) . ' ' . trim($reservation['FirstName']),
                        'chambre' => $reservation['Room'],
                        'dateIn' => $reservation['DateIn'],
                        'dateOut' => $reservation['DateOut']
                    ];
                }
            }
            // Passer au jour suivant
            $dateActuelle = date('Y-m-d', strtotime($dateActuelle . ' +1 day'));
        }
    
        // Liste des mois pour le sélecteur
        $liste_mois = array(
            1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril',
            5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août',
            9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'
        );
    
        // Plage d'années
        $annee_courante = date('Y');
        $annee_min = $annee_courante - 25;
        $annee_max = $annee_courante + 5;
    
        // Préparer les dates pour le template
        $date_debut = sprintf('%04d-%02d-01', $annee, $mois);
        $date_fin = date('Y-m-t', strtotime($date_debut));
    
        // Assigner les variables au template
        $this->tpl->assign('mois', $mois);
        $this->tpl->assign('annee', $annee);
        $this->tpl->assign('nombre_jours', $nombre_jours);
        $this->tpl->assign('jour_semaine', $jour_semaine);
        $this->tpl->assign('nom_mois', $this->getNomMois($mois));
        $this->tpl->assign('hotel_info', $hotel_info);
        $this->tpl->assign('liste_mois', $liste_mois);
        $this->tpl->assign('annee_min', $annee_min);
        $this->tpl->assign('annee_max', $annee_max);
        $this->tpl->assign('date_debut', $date_debut);
        $this->tpl->assign('date_fin', $date_fin);
        $this->tpl->assign('total_reservations', $total_reservations);
        $this->tpl->assign('reservations_par_date', $reservations_par_date);
        
        // Afficher le template
        $this->tpl->display('mod_calendrier/vue/calendrier.tpl');
    }

    private function getNomMois($mois) {
        $noms = array(
            1 => 'Janvier', 2 => 'Février', 3 => 'Mars', 4 => 'Avril',
            5 => 'Mai', 6 => 'Juin', 7 => 'Juillet', 8 => 'Août',
            9 => 'Septembre', 10 => 'Octobre', 11 => 'Novembre', 12 => 'Décembre'
        );
        return $noms[(int)$mois];
    }
}