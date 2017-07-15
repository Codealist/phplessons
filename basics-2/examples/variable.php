<?php

$houseNumber = 42;

$numberToPrint   = $houseNumber;    # value
$numberToPrint2  = &$houseNumber; # reference

echo $numberToPrint;  # 42
echo $numberToPrint2; # 42

$houseNumber = 43;

echo $numberToPrint;  # 42
echo $numberToPrint2; # 43
