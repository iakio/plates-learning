<?php
class StaticPagesTest extends \Silex\WebTestCase
{
    use CrawlerTrait;

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
        $this->visit('/')
            ->seeInTitle('Ruby on Rails')
            ->dontSeeInTitle('Home');
    }

    /** @test */
    public function help_page_should_have_a_custom_page_title() {
        $this->visit('help')
            ->seeInTitle('Ruby on Rails')
            ->seeInTitle('Help');
    }

    /** @test */
    public function about_page_should_have_a_custom_page_title() {
        $this->visit('about')
            ->seeInTitle('Ruby on Rails')
            ->seeInTitle('About Us');
    }

    /** @test */
    public function contact_page_should_have_a_custom_page_title() {
        $this->visit('contact')
            ->seeInTitle('Ruby on Rails')
            ->seeInTitle('Contact');
    }
}
