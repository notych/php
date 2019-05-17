<?php
class Instrument implements iInstrument
{
	private $instrName;
	private $catName;

    function __construct($instrName,$catName)
    {
        $this->instrName = $instrName;
        $this->catName = $catName;     
    }    
    function setName($instrName)
    {
        $this->instrName = $instrName;
    }
    function getName()
    {
        return $this->instrName;
    }
    function setCategory($catName)
    {
        $this->categoryName = $catName;
    }
    function getCategory()
    {
        return $this->catName;
    }
    function __toString()
    {
        return '(Name:'.$this->instrName.' Category:'.$this->catName.')';
    }
}
