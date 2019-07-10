<?php
class Image
{
	/** Attributs **/
    private $_idImage;
    private $_source;
    private $_alt;
    private $_legende;
    private $_positionIMG;

	/** Getters & Setters **/
    public function getIdImage()
    {
        return $this->_idImage;
    }
    public function setIdImage($_idImage)
    {
        $this->_idImage = $_idImage;

        return $this;
    }
    public function getSource()
    {
        return $this->_source;
    }
    public function setSource($_source)
    {
        $this->_source = $_source;

        return $this;
    }
    public function getAlt()
    {
        return $this->_alt;
    }
    public function setAlt($_alt)
    {
        $this->_alt = $_alt;

        return $this;
    }
    public function getLegende()
    {
        return $this->_legende;
    }
    public function setLegende($_legende)
    {
        $this->_legende = $_legende;

        return $this;
    }

    public function getPositionIMG()
    {
        return $this->_positionIMG;
    }
    public function setPositionIMG($_positionIMG)
    {
        $this->_positionIMG = $_positionIMG;

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