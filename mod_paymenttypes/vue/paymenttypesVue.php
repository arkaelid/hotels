<?php


class PaymenttypesVue
{

    private $parametre = array(); //tableau
    private $tpl; // objet smarty



    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->tpl = new Smarty();

    }

    private function chargementValeurs() {

        $this->tpl->assign('login', 'Ici le nom de la personne identifiée');

        $this->tpl->assign('titreVue', 'Les Hôtels');

    }


    public function genererAffichagePaymenttypes($valeurs){


        $this->chargementValeurs();

        $this->tpl->assign('titrePage', 'Liste des types de paiements');

        $this->tpl->assign('listePaymenttypes', $valeurs);

        $this->tpl->display('mod_paymenttypes/vue/paymenttypesListeVue.tpl');
    }

    public function genererAffichageFiche($valeurs){

        $this->chargementValeurs();

        $this->tpl->assign('titrePage', 'Fiche Type de Paiement : Consultation');

        $this->tpl->assign('unPaiementtype', $valeurs);

        $this->tpl->display('mod_paymenttypes/vue/paymenttypesFicheVue.tpl');

    }

    public function genererModifFiche($valeurs) {
        $this->chargementValeurs();
        $this->tpl->assign('unPaiementtype', $valeurs); // $valeurs doit être un objet PaymenttypesTable
        $this->tpl->display('mod_paymenttypes/vue/paymenttypesModifVue.tpl');
    }
    
    
    
    public function genererAjoutFiche($valeurs){

        $this->chargementValeurs();

        $this->tpl->assign('titrePage', 'Fiche Type de Paiement : Modification');

        $this->tpl->assign('unPaiementtype', $valeurs);

        $this->tpl->display('mod_paymenttypes/vue/paymenttypesAjoutVue.tpl');

    }

}
