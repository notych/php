<?php

class Band implements iBand
{
	
	private $bandName;
	private $bandGanre;
    private $musicians;
    
    function __construct($bandName,$bandGanre)
    {
        $this->bandName = $bandName;
        $this->bandGanre = $bandGanre;
    }
    function setName($bandName)
    {
        $this->bandName = $bandName;
    }
    function getName()
    {
        return $this->bandName;
    }
    function setGenre($bandGanre)
    {
        $this->bandGanre = $bandGanre;
    }
    function getGenre()
    {
        return $this->bandGanre;
    }
    function addMusician(iMusician $Musician)
    {
        $this->musicians[]=$Musician;
        $Musician->assingToBand($this);
    }
    function getMusician()
    {
		return $this->musicians;
    }
    function __toString()
    {
        $s='Група:'.$this->getName().', Жанр:'.$this->getGenre();
        if(isset($this->musicians))
        {
            $s.='(Музиканты:'; 
            foreach ($this->musicians as $m)
            {
                $s=$s.$m;            
            }
            $s.=')';
        }   
        return $s;
    }
}