<?php

class AccueilModele extends Modele {
    private $parametre;

    public function __construct($parametre) {
        $this->parametre = $parametre;
    }

    public function getStatistiques() {
        $stats = array();
        
        // Nombre de réservations
        $sql = "SELECT COUNT(*) as nb FROM reservations";
        $resultReservations = $this->executeRequete($sql);
        $stats['reservations'] = $resultReservations->fetch(PDO::FETCH_ASSOC)['nb'];
        
        // Nombre de chambres uniques
        $sql = "SELECT COUNT(DISTINCT Room) as nb FROM rooms";
        $resultChambres = $this->executeRequete($sql);
        $stats['chambres'] = $resultChambres->fetch(PDO::FETCH_ASSOC)['nb'];
        
        // Nombre de clients uniques
        $sql = "SELECT COUNT(DISTINCT CONCAT(FirstName, LastName)) as nb FROM reservations";
        $resultClients = $this->executeRequete($sql);
        $stats['clients'] = $resultClients->fetch(PDO::FETCH_ASSOC)['nb'];
        
        return $stats;
    }
}