<?php
class CalendrierModele extends Modele {
    private $parametre;
    private $connexion;

    public function __construct($parametre) {
        $this->parametre = $parametre;
        try {
            $this->connexion = new PDO('mysql:host=localhost;dbname=hotel', 'root', '', [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            error_log("Erreur de connexion à la base de données : " . $e->getMessage());
            throw new Exception("Impossible de se connecter à la base de données.");
        }
    }
    

    public function getReservationsMois($mois, $annee) {
        if (!isset($_SESSION['client'])) {
            return array();
        }

        // Debug des tables liées
        error_log("--- Vérification des tables ---");
        
        // Vérifier la table hotels uniquement
        $sql_hotels = "SELECT * FROM hotels WHERE Hotel = :hotel";
        $stmt_hotels = $this->connexion->prepare($sql_hotels);
        $stmt_hotels->execute([':hotel' => $_SESSION['client']['Hotel']]);
        $hotel_data = $stmt_hotels->fetch(PDO::FETCH_ASSOC);
        error_log("Données hotel : " . print_r($hotel_data, true));

        // Requête principale simplifiée
        $sql = "SELECT r.*, h.Name as HotelName
                FROM reservations r
                LEFT JOIN hotels h ON r.Hotel = h.Hotel
                WHERE r.Hotel = :hotel
                AND (
                    (r.DateIn BETWEEN :debut AND :fin)
                    OR (r.DateOut BETWEEN :debut AND :fin)
                    OR (:debut BETWEEN r.DateIn AND r.DateOut)
                )";

        try {
            $stmt = $this->connexion->prepare($sql);
            $stmt->execute([
                ':hotel' => $_SESSION['client']['Hotel'],
                ':debut' => "$annee-$mois-01",
                ':fin' => date('Y-m-t', strtotime("$annee-$mois-01"))
            ]);
            
            $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);
            error_log("Résultats finaux : " . print_r($resultats, true));
            return $resultats;

        } catch (PDOException $e) {
            error_log("Erreur SQL : " . $e->getMessage());
            return array();
        }
    }

    public function getHotelInfo() {
        if (!isset($_SESSION['client'])) {
            return null;
        }

        $lastName = trim($_SESSION['client']['LastName']);

        $sql = "SELECT h.* 
                FROM hotels h 
                INNER JOIN reservations r ON h.Hotel = r.Hotel 
                WHERE r.LastName LIKE :lastName 
                LIMIT 1";

        $stmt = $this->connexion->prepare($sql);
        $stmt->execute([':lastName' => $lastName . '%']);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}