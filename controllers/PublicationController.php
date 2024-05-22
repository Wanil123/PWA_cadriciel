<?php

namespace Controllers;

use Bases\Controller;

class PublicationController extends Controller {

    public function index() {
        $this->vue("publications/index");
    }
}