<?php
interface iMusician
{
    public function addInstrument(iInstrument $Instrument);
    public function getInstrument();
    public function assingToBand(iBand $Band);
    public function getMusicianType();
}