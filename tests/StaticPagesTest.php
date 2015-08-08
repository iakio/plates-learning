<?php
class StaticPagesTest extends \Silex\WebTestCase
{
    /** @var  \Symfony\Component\HttpKernel\Client */
    private $client;

    /** @var  \Symfony\Component\DomCrawler\Crawler */
    private $crawler;

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel
     */
    public function createApplication()
    {
        return require __DIR__ . '/../src/app.php';
    }

    /**
     * @param $url
     * @return $this
     */
    private function visit($url) {
        $this->client = $this->createClient();
        $this->crawler = $this->client->request('GET', $url);
        return $this;
    }

    /**
     * @param $text
     * @return $this
     */
    private function dontSeeInTitle($text) {
        $this->assertNotContains($text, $this->crawler->filter('title')->text());
        return $this;
    }

    /**
     * @param $text
     * @return $this
     */
    private function seeInTitle($text) {
        $this->assertContains($text, $this->crawler->filter('title')->text());
        return $this;
    }

    /** @test */
    public function home_page_should_not_have_a_custom_page_title() {
        $this->visit('/')
            ->seeInTitle('Ruby on Rails')
            ->dontSeeInTitle('Home');
    }

}
