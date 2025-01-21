<?php

namespace Rodrigo\BuscadorDeCursos;

use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    /**
     * @var ClientInterface
     */
    private $httpClient;

    /**
     * @var Crawler
     */
    private $crawler;

    public function __construct(ClientInterface $httpClient, Crawler $crawlwe)
    {

        $this->httpClient = $httpClient;
        $this->crawler = $crawlwe;
    }

    public function buscar(string $url): array
    {

        $reposta = $this->httpClient->request('GET', $url);

        $html = $reposta->getBody();
        $this->crawler->addHtmlContent($html);

        $elementoCursos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach ($elementoCursos as $elemento) {
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }
}
