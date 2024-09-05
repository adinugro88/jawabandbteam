<?php

require 'vendor/autoload.php';

use Goutte\Client;


$client = new Client();

$crawler = $client->request('GET', 'https://id.wikipedia.org/wiki/Daftar_kabupaten_di_Indonesia');


$tabel = $crawler->filter('table.kabupaten');


$filename = 'kabupaten.csv';
$file = fopen($filename, 'w');


$tabel->each(function ($node) use ($file) {
    $node->filter('tr')->each(function ($tr) use ($file) {
        $row = [];
        $tr->filter('td')->each(function ($td) use (&$row) {
            $row[] = $td->text();
        });
        if (!empty($row)) {
            fputcsv($file, $row);
        }
    });
});

fclose($file);

echo "Data telah disimpan ke dalam file $filename\n";