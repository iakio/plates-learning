<?php
class StaticPagesController
{
    private $view;

    public function __construct(\League\Plates\Engine $view) {
        $this->view = $view;
    }

    public function home() { return $this->view->render('home'); }
    public function help() { return $this->view->render('help'); }
    public function about() { return $this->view->render('about'); }
    public function contact() { return $this->view->render('contact'); }
}
