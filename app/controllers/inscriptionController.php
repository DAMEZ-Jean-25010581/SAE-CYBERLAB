<?php

namespace SAE_PHP\controllers;

use SAE_PHP\views\InscriptionView;
use Utils\Template;

/**
 * Page « Inscription ».
 */
class InscriptionController
{
    public function execute(): void
    {
        Template::render(InscriptionView::class, [
            'title' => 'CyberLab - Inscription',
        ]);
    }
}
