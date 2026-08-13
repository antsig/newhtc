<?php
$lines = file('c:/laragon/www/htcpajak/pusatpel_pajak.sql');
$out = fopen('c:/laragon/www/newhtc/extract_insert.sql', 'w');
$in_insert = false;
foreach($lines as $line) {
    if(strpos($line, 'INSERT INTO `halamanstatis`') !== false) {
        $in_insert = true;
    }
    if($in_insert) {
        fwrite($out, $line);
        if(strpos($line, ';') !== false) $in_insert = false;
    }
}
fclose($out);
