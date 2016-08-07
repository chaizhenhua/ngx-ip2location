<?php

$ip2loc_prefix = 'IP2LOCATION_';
$ip2loc_fields = array(
    'COUNTRY_SHORT',
    'COUNTRY_LONG',
    'REGION',
    'CITY',
    'ISP',
    'LATITUDE',
    'LONGITUDE',
    'DOMAIN',
    'ZIPCODE',
    'TIMEZONE',
    'NETSPEED',
    'IDDCODE',
    'AREACODE',
    'WEATHERSTATIONCODE',
    'WEATHERSTATIONNAME',
    'MCC',
    'MNC',
    'MOBILEBRAND',
    'ELEVATION',
    'USAGETYPE',
);
$buffer = null;

foreach ($ip2loc_fields as $field) {
    $index = $ip2loc_prefix . $field;  
    if (!empty($_SERVER[$index])) {
        $value = $_SERVER[$index];       
    } else {
        $value = 'N/A';
    }
    $buffer .= $field . ' => "' . $value . '"<br/>';
}

echo $buffer;