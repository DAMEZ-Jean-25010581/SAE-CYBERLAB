<?php

namespace SAE_PHP\controllers;

use SAE_PHP\views\AuthentificationView;
use Utils\Template;

/**
 * Page « Authentification ».
 */
class AuthentificationController
{
    public function execute(): void
    {
        Template::render(AuthentificationView::class, [
            'title' => 'CyberLab - Authentification',
        ]);
    }
}
