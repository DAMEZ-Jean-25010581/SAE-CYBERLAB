<?php

namespace SAE_PHP\controllers;

use SAE_PHP\views\PlanSiteView;
use Utils\Template;

/**
 * Plan du site.
 */
class PlanSiteController
{
    public function execute(): void
    {
        Template::render(PlanSiteView::class, [
            'title' => 'CyberLab - Plan du site',
        ]);
    }
}
