<?php
class CalendrierControleur {
    private $parametre = array();
    private $oModele;
    private $oVue;

    public function __construct($parametre) {
        $this->parametre = $parametre;
        $this->oModele = new CalendrierModele($this->parametre);
        $this->oVue = new CalendrierVue($this->parametre);
    }

    public function afficherMois() {
        $mois = isset($this->parametre['mois']) ? $this->parametre['mois'] : date('m');
        $annee = isset($this->parametre['annee']) ? $this->parametre['annee'] : date('Y');
    
        if (!is_numeric($mois) || !is_numeric($annee) || $mois < 1 || $mois > 12) {
            // Valeurs invalides, définir des valeurs par défaut
            $mois = date('m');
            $annee = date('Y');
        }
    
        try {
            $reservations = $this->oModele->getReservationsMois($mois, $annee);
            error_log("Réservations récupérées dans le contrôleur : " . count($reservations));

            // Restructuration des réservations par date
            $reservationsParDate = [];
            foreach ($reservations as $reservation) {
                $dateDebut = strtotime($reservation['DateIn']);
                $dateFin = strtotime($reservation['DateOut']);
                
                // Pour chaque jour de la réservation
                $currentDate = $dateDebut;
                while ($currentDate <= $dateFin) {
                    $dateKey = date('Y-m-d', $currentDate);
                    if (!isset($reservationsParDate[$dateKey])) {
                        $reservationsParDate[$dateKey] = [];
                    }
                    $reservationsParDate[$dateKey][] = $reservation; // Ajout de la réservation complète
                    $currentDate = strtotime('+1 day', $currentDate);
                }
            }

            $hotel_info = $this->oModele->getHotelInfo();
            $this->oVue->genererCalendrier($mois, $annee, $reservationsParDate, $hotel_info);
            
        } catch (Exception $e) {
            error_log("Erreur dans afficherMois: " . $e->getMessage());
            // Ajouter une gestion des erreurs utilisateur si nécessaire
        }
    }
    
    
}