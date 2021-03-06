<?php

$name = 'squid';
$app_id = $app['app_id'];
$scale_min     = 0;
$colours       = 'mixed';
$unit_text     = 'hit ratio';
$unitlen       = 9;
$bigdescrlen   = 9;
$smalldescrlen = 9;
$dostack       = 0;
$printtotal    = 0;
$addarea       = 1;
$transparency  = 15;

$rrd_filename = rrd_name($device['hostname'], array('app', $name, $app_id));

if (is_file($rrd_filename)) {
    $rrd_list = array(
        array(
            'filename' => $rrd_filename,
            'descr'    => '1 minute',
            'ds'       => 'reqhitratio1',
            'colour'   => '582a72'
        ),
        array(
            'filename' => $rrd_filename,
            'descr'    => '5 minute',
            'ds'       => 'reqhitratio5',
            'colour'   => '28774f'
        ),
        array(
            'filename' => $rrd_filename,
            'descr'    => '60 minute',
            'ds'       => 'reqhitratio60',
            'colour'   => '28536c'
        )
    );
} else {
    echo "file missing: $rrd_filename";
}

require 'includes/graphs/generic_v3_multiline.inc.php';
