<?php

namespace SAE_PHP\controllers;

use SAE_PHP\views\ErrorView;
use Utils\Template;

/**
 * Pages d'erreur (404, 403, 405, 500). Le code HTTP est envoyé par le routeur.
 */
class ErrorController
{
    public function execute(string $title = 'CyberLab - Page non trouvée'): void
    {
        Template::render(ErrorView::class, [
            'title' => $title,
        ]);
    }
}
