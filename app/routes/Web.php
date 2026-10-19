<?php

namespace routes;

use routes\base\Route;
use Utils\SessionHelpers;
use Utils\Template;

class Web
{
    public function __construct()
    {
        Route::add('/', function () {
            (new \SAE_PHP\controllers\HomeController())->execute();
        });

        Route::add('/home', function () {
            (new \SAE_PHP\controllers\HomeController())->execute();
        });

        Route::add('/login', function () {
            (new \SAE_PHP\controllers\Login())->execute();
        });

        Route::add('/register', function () {
            (new \SAE_PHP\controllers\Register())->execute();
        });

        Route::add('/logout', function () {
            (new \SAE_PHP\controllers\Logout())->execute();
        });

        Route::add('/forgot_password', function () {
            (new \SAE_PHP\controllers\ForgotPassword())->execute();
        });

        Route::add('/reset_password', function () {
            (new \SAE_PHP\controllers\ResetPassword())->execute();
        });

        Route::add('/account', function () {
            (new \SAE_PHP\controllers\Account())->execute();
        });

        Route::add('/a-propos', function () {
            Template::render('aProposView', [
                'title' => 'CyberLab - À propos'
            ]);
        });

        Route::add('/contact', function () {
            (new \SAE_PHP\controllers\ContactController())->contact();
        });

        Route::add('/mentions-legales', function () {
            Template::render('mentionsLegalesView', [
                'title' => 'CyberLab - Mentions légales'
            ]);
        });

        Route::add('/plan-site', function () {
            Template::render('planSiteView', [
                'title' => 'CyberLab - Plan du site'
            ]);
        });

        Route::add('/plan-du-site', function () {
            Template::render('planSiteView', [
                'title' => 'CyberLab - Plan du site'
            ]);
        });
    }
}
