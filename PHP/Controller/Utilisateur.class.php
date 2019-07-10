<?php
class Utilisateur
{
	/** Attributs **/
    private $_idUtilisateur;
    private $_email;
    private $_pseudo;
    private $_motDePasse;
    private $_confirm;

	/** Getters & Setters **/
    public function getIdUtilisateur()
    {
        return $this->_idUtilisateur;
    }
    public function setIdUtilisateur($_idUtilisateur)
    {
        $this->_idUtilisateur = $_idUtilisateur;

        return $this;
    }
    public function getEmail()
    {
        return $this->_email;
    }
    public function setEmail($_email)
    {
        $this->_email = $_email;

        return $this;
    }
    public function getPseudo()
    {
        return $this->_pseudo;
    }
    public function setPseudo($_pseudo)
    {
        $this->_pseudo = $_pseudo;

        return $this;
    }
    public function getMotDePasse()
    {
        return $this->_motDePasse;
    }
    public function setMotDePasse($_motDePasse)
    {
        $this->_motDePasse = $_motDePasse;

        return $this;
    }
    public function getConfirm()
    {
        return $this->_confirm;
    }
    public function setConfirm($_confirm)
    {
        $this->_confirm = $_confirm;

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