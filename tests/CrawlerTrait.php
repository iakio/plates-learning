<?php

trait CrawlerTrait {

    /** @var  \Symfony\Component\HttpKernel\Client */
    protected $client;

    /** @var  \Symfony\Component\DomCrawler\Crawler */
    protected $crawler;

    /**
     * @param $url
     * @return $this
     */
    protected function visit($url) {
        $this->client = $this->createClient();
        $this->crawler = $this->client->request('GET', $url);
        return $this;
    }

    /**
     * @param $text
     * @return $this
     */
    protected function dontSeeInTitle($text) {
        $this->assertNotContains($text, $this->crawler->filter('title')->text());
        return $this;
    }

    /**
     * @param $text
     * @return $this
     */
    protected function seeInTitle($text) {
        $this->assertContains($text, $this->crawler->filter('title')->text());
        return $this;
    }
}
