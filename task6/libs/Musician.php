<?php
class Musician implements iMusician
{
  private $Name;
  private $Band;
  private $musicianType;
  private $Instruments;

  function __construct($Name, $Type) {
    $this->Name=$Name;
    $this->musicianType = $Type;
  }
  function addInstrument(iInstrument $Instrument)
  {
    $this->Instruments[] = $Instrument;
  }
  function getInstrument()
  {
		return $this->addInstruments;
	}
  function assingToBand(iBand $Band)
  {
	  $this->Band = $Band;
  }
	function getAssingToBand()
  {
		return $this->Band;
  }
	
	function setMusicianType($musicianType)
  {
		$this->musicianType = $musicianType;
  }
	
  function getMusicianType()
  {
		return $this->musicianType;
  }
  function __toString()
  {
    $s='(Name:'.$this->Name.', Type:'.$this->musicianType;    
   
  //
    if (isset($this->Instruments))
    {
      $s.='(Играет на:';  
      foreach ($this->Instruments as $i)
      {
        $s.=$i.' ';
      }   
    }
    $s.=')';
    return $s;
  }
}
