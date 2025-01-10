<?php

class SairController {
    private $url = "http://localhost/projetos/cinema";

    public function index() {
        session_destroy();
        # Redireciona para o login
        header("location: " . $this->url . "/login");
    }
}