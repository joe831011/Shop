<?php
// uuid_generator
// UUID格式: XXXXXXXX-XXXX-XXXX-XXXX-XXXXXXXXXXXX
function uuid_generator()
{
    $rawid = strtoupper( md5( uniqid( rand() , true ) ) );
    
    $workid = $rawid;
 
    // hopefully conform to the spec, mark this as a "random" type

    // lets handle the version byte as a number
    
    $byte = hexdec( substr($workid,12,2) );
    
    $byte = $byte & hexdec("0f");
    
    $byte = $byte | hexdec("40");

    $workid = substr_replace($workid, strtoupper(dechex($byte)), 12, 2);

    // hopefully conform to the spec, mark this common variant

    // lets handle the "variant"
    
    $byte = hexdec( substr($workid,16,2) );

    $byte = $byte & hexdec("3f");

    $byte = $byte | hexdec("80" );

    $workid = substr_replace($workid, strtoupper(dechex($byte)), 16, 2);
// build a human readable version
    $rid = substr($rawid, 0, 8).'-'
    .substr($rawid, 8, 4).'-'
    .substr($rawid,12, 4).'-'
    .substr($rawid,16, 4).'-'
    .substr($rawid,20,12);
// build a human readable version
    $wid = substr($workid, 0, 8).'-'
    .substr($workid, 8, 4).'-'
    .substr($workid,12, 4).'-'
    .substr($workid,16, 4).'-'
    .substr($workid,20,12);

    return $wid;
}
?>