<?php
/**
 *  Class PaymenttypesModele
 * 	Classe héritée de la classe abstraite Modele (modele.php)
 *
 */

class PaymenttypesModele extends modele
{
    private $parametre = array(); //tableau


    function __construct($parametre)
    {

        $this->parametre = $parametre;
    }


    public function getListePaymenttypes()
    {

        $sql = "SELECT * FROM paymenttypes";

        $resultat = $this->executeRequete($sql);


       if ($resultat->rowCount() > 0) {

            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)) {

                $listePaymenttypes[] = new PaymenttypesTable($row);

            }

            return $listePaymenttypes;

        } else {

            return null;
        }


    }

    public function getUnPaymenttype($paymentId) {
        $sql = "SELECT * FROM paymenttypes WHERE Payment = ?";
        $resultat = $this->executeRequete($sql, array($paymentId));  // Exécute la requête avec l'ID
        if ($resultat) {
            return new PaymenttypesTable($resultat->fetch(PDO::FETCH_ASSOC));  // Retourne les détails sous forme d'objet
        }
        return null; // Retourne null si aucune donnée n'est trouvée
    }
    
    public function updatePaymenttypes (PaymenttypesTable $valeurs) {
        $sql = "UPDATE paymenttypes SET Description = ? WHERE Payment = ?";
        $resultat = $this->executeRequete($sql, [
            $valeurs->getDescription(),
            $valeurs->getPayment(),
        ]);
        
        // Vérifiez si la mise à jour a réussi
        return $resultat ? true : false; // Retourne true si la mise à jour a réussi
    }
    
    public function DeleteUnPaymenttype($paymentId) {
        $sql = "DELETE FROM Paymenttypes WHERE Payment = ?";
        $resultat = $this->executeRequete($sql, array($paymentId));  // Exécute la requête avec l'ID
        return new PaymenttypesTable($resultat->fetch(PDO::FETCH_ASSOC));  // Retourne les détails sous forme d'objet
    }
    public function ajoutUnPaymenttype($description) {
        $sql = "INSERT INTO paymenttypes (Description) VALUES (?)";
        $resultat = $this->executeRequete($sql, array($description));  // Exécute la requête d'insertion
    
        // Retourner true si l'insertion a été réussie
        return $resultat ? true : false;
    }
    
}
