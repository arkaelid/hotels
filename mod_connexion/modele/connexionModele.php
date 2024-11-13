<?php

class ConnexionModele extends Modele
{
    private $parametre;
    private $connexion;

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
        $this->connexion = new PDO('mysql:host=localhost;dbname=hotel', 'root', '');
    }

    public function ConnexionClient($lastName, $resNo)
    {
        $sql = "SELECT * FROM reservations WHERE LastName = :lastName AND ResNo = :resNo";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute([
            ':lastName' => $lastName,
            ':resNo' => $resNo
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function DeconnexionClient()
    {
        session_start();
        session_destroy();
    }
}