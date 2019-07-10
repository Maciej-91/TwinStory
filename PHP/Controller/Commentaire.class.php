<?php
class Commentaire
{
	/** Attributs **/
    private $_idCommentaire;
    private $_date;
    private $_commentaire;
    private $_idUtilisateur;

	/** Getters & Setters **/
    public function getIdCommentaire()
    {
        return $this->_idCommentaire;
    }
    public function setIdCommentaire($_idCommentaire)
    {
        $this->_idCommentaire = $_idCommentaire;

        return $this;
    }
    public function getDate()
    {
        return $this->_idDate;
    }
    public function setDate($_idDate)
    {
        $this->_idDate = $_idDate;

        return $this;
    }
    public function getCommentaire()
    {
        return $this->_commentaire;
    }
    public function setCommentaire($_commentaire)
    {
        $this->_commentaire = $_commentaire;

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