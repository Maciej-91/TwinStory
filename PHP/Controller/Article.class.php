<?php
class Article
{
	/** Attributs **/
    private $_idArticle;
    private $_chapitre;
    private $_titre;
    private $_contenu;

	/** Getters & Setters **/
    public function getIdArticle()
    {
        return $this->_idArticle;
    }
    public function setIdArticle($_idArticle)
    {
        $this->_idArticle = $_idArticle;

        return $this;
    }
    public function getChapitre()
    {
        return $this->_chapitre;
    }
    public function setChapitre($_chapitre)
    {
        $this->_chapitre = $_chapitre;

        return $this;
    }
    public function getTitre()
    {
        return $this->_titre;
    }
    public function setTitre($_titre)
    {
        $this->_titre = $_titre;

        return $this;
    }
    public function getContenu()
    {
        return $this->_contenu;
    }
    public function setContenu($_contenu)
    {
        $this->_contenu = $_contenu;

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