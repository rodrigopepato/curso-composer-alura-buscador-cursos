<?php

require 'vendor/autoload.php';

use Rodrigo\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;


$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();
// $resposta = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php');

// $html = $resposta->getBody();

// $crawler = new Crawler();
// $crawler->addHtmlContent($html);

// $cursos = $crawler->filter('span.card-curso__nome');

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    echo $curso . PHP_EOL;
}
