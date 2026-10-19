<?php

namespace Utils;

use SAE_PHP\views\LayoutView;
use SAE_PHP\views\ViewInterface;

class Template
{
    /**
     * Affiche une vue dans la mise en page commune.
     *
     * @param class-string<ViewInterface> $view   classe de la vue, ex : LoginView::class
     * @param array<string, mixed>        $params variables passées à la vue
     */
    public static function render(string $view, array $params = []): void
    {
        // permet de verifier si la classe de vue existe
        if (!class_exists($view)) {
            http_response_code(404);
            echo 'Vue introuvable (404)';
            return;
        }

        // permet de récupérer le HTML de la vue dans une variable $content
        ob_start();
        (new $view())->render($params);
        $content = (string) ob_get_clean();

        // On passe le contenu de la vue a la mise en page
        (new LayoutView())->render($params + ['content' => $content]);
    }
}
