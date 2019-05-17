<?php


include 'libs/iInstrument.php';
include 'libs/iMusician.php';
include 'libs/iBand.php';

include 'libs/Instrument.php';
include 'libs/Musician.php';
include 'libs/Band.php';

$guitar = new Instrument('Гитара Гипсон','Струнные');
$baraban = new Instrument('Барабан Ямаха','Ударные');
$synthesizer = new Instrument('Синтезатор Роланд','Електроные');

$valera = new Musician('Валера','Струнные');
$valera->addInstrument($guitar);

$kolya = new Musician('Коля','Ударные');
$kolya->addInstrument($baraban);

$petya = new Musician('Петя','Клавишные');
$petya->addInstrument($synthesizer);

$band = new Band('Жуть','rock');
$band->addMusician($valera);
$band->addMusician($petya);
$band->addMusician($kolya);

include 'templates/index.php';
?>
