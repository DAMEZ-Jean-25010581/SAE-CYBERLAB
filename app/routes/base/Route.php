<?php

namespace routes\base;

use Utils\Template;
use Utils\Csrf;

class Route
{
    private static array $routes = [];

    public static function add(string $path, callable $handler, array $methods = ['GET']): void
    {
        // ajoute une route à la liste des routes avec ses méthodes HTTP autorisées
        self::$routes[$path] = ['handler' => $handler, 'methods' => $methods];
    }

    public static function dispatch(): void
    {
        // Récupère l'action de l'URL (login, register, etc.)
        $action = $_GET['action'] ?? '';

        // Un seul mode d'accès : on refuse tout ce qui n'est pas une chaîne simple (comme : ?action[]=x)
        if (!is_string($action) || !preg_match('#^[a-z0-9_-]*$#i', $action)) {
            $action = '__invalid__';
        }

        // construit l'uri a partir de l'action 
        $uri = '/' . $action; // '' donne la racine '/'

        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        // cherche route declarée avec chemin identique à l'uri demandée par exemple : '/login'
        foreach (self::$routes as $path => $route) {
            if ($path === $uri) {
                // refuse les méthodes non prévues pour cette route (par exemple: GET sur /logout)
                if (!in_array($method, $route['methods'], true)) {
                    http_response_code(405);
                    header('Allow: ' . implode(', ', $route['methods']));
                    Template::render('error', [
                        'title' => 'CyberLab - Méthode non autorisée'
                    ]);
                    return;
                }

                // CSRF obligatoire pour toute méthode qui modifie l'état
                if (in_array($method, ['POST', 'PUT', 'PATCH', 'DELETE'], true)) {
                    $token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? null;

                    if (!is_string($token) || !Csrf::validateToken($token)) {
                        http_response_code(403);
                        Template::render('error', [
                            'title' => 'CyberLab - Requête refusée'
                        ]);
                        return;
                    }
                }

                // erreur 500 si quelque chose plante
                try {
                    call_user_func($route['handler']);
                } catch (\Throwable $e) {
                    error_log($e->getMessage()); // detail dans les logs serveur uniquement (pas d'affichage externe)
                    http_response_code(500);
                    Template::render('error', [
                        'title' => 'CyberLab - Erreur serveur'
                    ]);
                }
                return;
            }
        }

        // Si aucune route -> on affiche une page d'erreur 404
        http_response_code(404);
        Template::render('errorView', [
            'title' => 'CyberLab - Page non trouvée'
        ]);
    }
}