<?php
class Avis
{
	/** Attributs **/
    private $_idAvis;
    private $_saisie;
    private $_idUtilisateur;

	/** Getters & Setters **/
    public function getIdAvis()
    {
        return $this->_idAvis;
    }
    public function setIdAvis($_idAvis)
    {
        $this->_idAvis = $_idAvis;

        return $this;
    }
    public function getSaisie()
    {
        return $this->_saisie;
    }
    public function setSaisie($_saisie)
    {
        $this->_saisie = $_saisie;

        return $this;
    }
    public function getIdUtilisateur()
    {
        return $this->_idUtilisateur;
    }
    public function setIdUtilisateur($_idUtilisateur)
    {
        $this->_idUtilisateur = $_idUtilisateur;

        return $this;
    }

    /** Construct & Hydrate **/
    public function __construct(array $options = [])
    {
        if (!empty($options))
        {
            $this->hydrate($options);
        }
    }
    public function hydrate($data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (is_callable([$this, $method]))
            {
                $this->$method($value);
            }
        }
    }
}
?>