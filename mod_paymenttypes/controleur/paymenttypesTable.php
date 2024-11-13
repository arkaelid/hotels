<?php

/**
 * Class PaymenttypesTable
 */
class PaymenttypesTable
{
    // 1 déclarer les propriétés (attributs)
    private $Payment = "";
    private $Description = "";


    // 2 importer la méthode hydrater !
    public function hydrater(array $row) {

        foreach ($row as $k => $v) {
            // Concaténation : nom de la méthode setter à appeler
            $setter = 'set' . ucfirst($k);
            // fonction prend 2 paramètres : l'objet en cours et le nom de la méthode
            if (method_exists($this, $setter)) {
                // Invoquer la méthode
                $this->$setter($v);
            }
        }
    }

    // 3 puis  le constructeur !
    public function __construct($data = null) {

        if ($data != null) {

            $this->hydrater($data);
        }
    }


    // 4 ALT + INSER pour générer setter et getter !
    /**
     * @return string
     */
    public function getPayment()
    {
        return $this->Payment;
    }

    /**
     * @param string $Payment
     */
    public function setPayment($Payment)
    {
        $this->Payment = $Payment;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @param string $Description
     */
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }






}
