<?php

$url = 'http://google.com?NWZjOGRmNTQxZjE5NmdjbGlk={gclid}&NWZjOGRmNTQxZjE5ZHBsYWNlbWVudACZ2={placement}&NWZjOGRmNTQxZjFhMmFkcG9zaXRpb24CZ1={adposition}&NWZjOGRmNTQxZjFhNWNhbXBpZACZ2={campaignid}&NWZjOGRmNTQxZjFhN2RldmljZQCZ2={device}&NWZjOGRmNTQxZjFhOWRldmljZW1vZGVs={devicemodel}&NWZjOGRmNTQxZjFhYWNyZWF0aXZl={creative}&NWZjOGRmNTQxZjFhYmFkaWQCZ1={adid}&NWZjOGRmNTQxZjFhZHRhcmdldACZ2={targetid}&NWZjOGRmNTQxZjFhZmtleXdvcmQCZ1={keyword}&NWZjOGRmNTQxZjFiMW1hdGNodHlwZQCZ2={matchtype}';

require('Decoder.php');

$decoder = new Decoder();
$decoded = $decoder->decode($url);
echo $decoded;