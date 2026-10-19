<?php

namespace SAE_PHP\views;

/**
 * Page d'erreur (ErrorController).
 */
class ErrorView implements ViewInterface
{
    /** @param array<string, mixed> $params */
    public function render(array $params = []): void
    {
        ?>
<section>
        <h1 class="main-title">404</h1>
        <h2 class="subtitle">Page non trouvée</h2>
        <p class="description">La page que vous recherchez n'existe pas ou a été déplacée.</p>
        <a href="/" class="btn">Retour à l'accueil</a>
</section>
<?php
    }
}
