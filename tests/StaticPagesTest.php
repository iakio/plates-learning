<?php
class StaticPagesTest extends \Silex\WebTestCase
{

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel
     */
    public function createApplication()
    {
        return require __DIR__ . '/../src/app.php';
    }

    /** @test */
    public function home_page_should_not_have_a_custom_page_title() {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');
        $title = $crawler->filter('title')->text();
        $this->assertContains('Ruby on Rails', $title);
        $this->assertNotContains('Home', $title);
    }

}
