<?php

namespace SAE_PHP\controllers;

use SAE_PHP\views\AProposView;
use Utils\Template;

/**
 * Page « À propos ».
 */
class AProposController
{
    public function execute(): void
    {
        Template::render(AProposView::class, [
            'title' => 'CyberLab - À propos',
        ]);
    }
}
