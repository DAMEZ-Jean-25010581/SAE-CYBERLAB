<?php

namespace SAE_PHP\views;

/**
 * Toutes les vues sont des classes avec une méthode render() qui affiche leur HTML.
 */
interface ViewInterface
{
    /** @param array<string, mixed> $params variables utilisées par la vue */
    public function render(array $params = []): void;
}
