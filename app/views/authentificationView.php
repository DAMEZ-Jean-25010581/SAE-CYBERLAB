<?php

namespace SAE_PHP\views;

/**
 * Page « Authentification » (AuthentificationController).
 */
class AuthentificationView implements ViewInterface
{
    /** @param array<string, mixed> $params */
    public function render(array $params = []): void
    {
        ?>
<section>
        <h1 class="main-title">AUTHENTIFICATION</h1>
</section>
<?php
    }
}
