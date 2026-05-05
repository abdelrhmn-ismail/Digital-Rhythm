<?php
$ar_json = json_decode(file_get_contents('lang/ar.json'), true);
foreach ($ar_json as $k => $v) {
    if (stripos($k, 'Digital Rhythm') !== false) {
        echo "$k => $v\n";
    }
}
