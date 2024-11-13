<?php


class PaymenttypesControleur
{

    private $parametre = array(); //tableau
    private $oModele; // Object
    private $oVue; // Object

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oModele = new PaymenttypesModele($parametre);

        $this->oVue = new PaymenttypesVue($parametre);
    }

    public function lister(){

        $valeurs = $this->oModele->getListePaymenttypes();

        $this->oVue->genererAffichagePaymenttypes($valeurs);

    }

    public function form_consulter() {
        $paymentId = $this->parametre['Payment'];  // Récupère l'ID du paiement
        $valeurs = $this->oModele->getUnPaymenttype($paymentId);  // Appelle le modèle
        $this->oVue->genererAffichageFiche($valeurs);  // Passe les valeurs à la vue
    }
    
    public function form_modifier() {
        $paymentId = $this->parametre['Payment'];  // Récupère l'ID du paiement
        $valeurs = $this->oModele->getUnPaymenttype($paymentId);  // Récupère les données du type de paiement
    
        // Vérifiez si les données sont valides
        if ($valeurs === null) {
            echo "Erreur : Type de paiement non trouvé.";
            return; // Arrêtez l'exécution si les données ne sont pas valides
        }
    
        // Si le formulaire a été soumis pour mise à jour
        if (isset($this->parametre['description'])) {
            $controlePaymenttype = new PaymenttypesTable($this->parametre);
            $isUpdated = $this->oModele->updatePaymenttypes($controlePaymenttype);
            
            if ($isUpdated) {
                header('Location: index.php?gestion=paymenttypes'); // Redirige vers la liste si la mise à jour a réussi
                exit();
            } else {
                echo "Erreur lors de la mise à jour du type de paiement."; // Message d'erreur
            }
        } else {
            // Affiche le formulaire de modification
            $this->oVue->genererModifFiche($valeurs);
        }
    }
    
    
    public function form_supprimer() {
        $paymentId = $this->parametre['Payment'];  // Récupère l'ID du paiement
        $isDeleted = $this->oModele->DeleteUnPaymenttype($paymentId);  // Appelle le modèle
    
        if ($isDeleted) {
            // Redirection vers la liste des types de paiement après suppression
            header('Location: index.php?gestion=paymenttypes');
            exit(); // Toujours utiliser exit() après header() pour arrêter l'exécution du script
        } else {
            
            echo "Erreur lors de la suppression.";
        }
    }
    public function form_ajouter() {
        if (isset($this->parametre['description'])) {
            $description = $this->parametre['description'];  // Récupère la description depuis le formulaire
    
            $isAdded = $this->oModele->ajoutUnPaymenttype($description);  // Appelle le modèle pour ajouter
    
            if ($isAdded) {
                // Redirection vers la liste des types de paiement après ajout
                header('Location: index.php?gestion=paymenttypes');
                exit();
            } else {
                echo "Erreur lors de l'ajout du type de paiement."; // Message d'erreur
            }
        } else {
            // Si aucune donnée n'est soumise, afficher le formulaire
            $this->oVue->genererAjoutFiche(null);
        }
    }
    
}
