<?php
class CalendrierVue {
    private $smarty;
    
    public function __construct() {
        $this->smarty = new Smarty();
        // Configuration de base de Smarty
        $this->smarty->template_dir = 'mod_calendrier/vue/';
        $this->smarty->compile_dir = 'templates_c/';
        
        // Enregistrer le modificateur floor
        $this->smarty->registerPlugin('modifier', 'floor', 'floor');
    }

    public function genererCalendrier($mois, $annee, $reservations, $hotel_info) {
        // Assigner les informations de l'hôtel au template
        $this->smarty->assign('hotel_info', $hotel_info);
        
        // Préparer les données du calendrier
        $premier_jour = mktime(0, 0, 0, $mois, 1, $annee);
        $nombre_jours = date('t', $premier_jour);
        $jour_semaine = date('w', $premier_jour);
        
        // Initialiser le tableau des réservations par date
        $reservations_par_date = array();
        $total_reservations = 0;
        $periodes_reservees = [];
        
        // Debug des données reçues
        error_log("Données reçues dans la vue : " . print_r($reservations, true));
    
        // Restructurer les réservations pour les regrouper par numéro de réservation
        $reservations_uniques = array();
        
        foreach ($reservations as $date => $reservationsJour) {
            foreach ($reservationsJour as $reservation) {
                $resNo = $reservation['ResNo'];
                if (!isset($reservations_uniques[$resNo])) {
                    $reservations_uniques[$resNo] = array(
                        'ResNo' => $resNo,
                        'LastName' => $reservation['LastName'],
                        'FirstName' => $reservation['FirstName'],
                        'Room' => $reservation['Room'],
                        'DateIn' => $reservation['DateIn'],
                        'DateOut' => $reservation['DateOut'],
                        'jours' => array()
                    );
                    
                    // Vérifier si c'est une nouvelle période de réservation
                    $dateIn = strtotime($reservation['DateIn']);
                    $dateOut = strtotime($reservation['DateOut']);
                    $nouvelle_periode = true;
                    
                    foreach ($periodes_reservees as $periode) {
                        // Si la nouvelle réservation chevauche une période existante ou est adjacente
                        if (
                            ($dateIn >= $periode['debut'] && $dateIn <= strtotime('+1 day', $periode['fin'])) ||
                            ($dateOut >= strtotime('-1 day', $periode['debut']) && $dateOut <= $periode['fin'])
                        ) {
                            $nouvelle_periode = false;
                            break;
                        }
                    }
                    
                    if ($nouvelle_periode) {
                        $periodes_reservees[] = [
                            'debut' => $dateIn,
                            'fin' => $dateOut
                        ];
                        $total_reservations++;
                    }
                }
                
                // Extraire le jour du mois de la date
                $jour = (int)substr($date, -2);
                $reservations_uniques[$resNo]['jours'][] = $jour;
            }
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
        $this->smarty->assign('mois', $mois);
        $this->smarty->assign('annee', $annee);
        $this->smarty->assign('nombre_jours', $nombre_jours);
        $this->smarty->assign('jour_semaine', $jour_semaine);
        $this->smarty->assign('nom_mois', $this->getNomMois($mois));
        $this->smarty->assign('hotel_info', $hotel_info);
        $this->smarty->assign('liste_mois', $liste_mois);
        $this->smarty->assign('annee_min', $annee_min);
        $this->smarty->assign('annee_max', $annee_max);
        $this->smarty->assign('date_debut', $date_debut);
        $this->smarty->assign('date_fin', $date_fin);
        $this->smarty->assign('total_reservations', $total_reservations);
        $this->smarty->assign('reservations_uniques', $reservations_uniques);
        
        // Afficher le template
        $this->smarty->display('mod_calendrier/vue/calendrier.tpl');
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