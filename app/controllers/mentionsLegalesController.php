<?php

namespace SAE_PHP\controllers;

use SAE_PHP\views\MentionsLegalesView;
use Utils\Template;

/**
 * Mentions légales.
 */
class MentionsLegalesController
{
    public function execute(): void
    {
        Template::render(MentionsLegalesView::class, [
            'title' => 'CyberLab - Mentions légales',
        ]);
    }
}
