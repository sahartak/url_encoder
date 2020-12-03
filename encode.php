<?php
$url = 'http://google.com?gclid={gclid}&placement={placement}&adposition={adposition}&campid={campaignid}&device={device}&devicemodel={devicemodel}&creative={creative}&adid={adid}&target={targetid}&keyword={keyword}&matchtype={matchtype}';
require('Encoder.php');

$encoder = new Encoder();
$encoded = $encoder->encode($url);


echo $encoded;