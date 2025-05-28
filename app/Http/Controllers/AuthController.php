<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public $auth0;

    public function __construct() {
        $configuration = new SdkConfiguration(
            domain: 'orientacion-vocacional.us.auth0.com',
            clientId: 'Mk0JTaW60Tw3dC0k9I6SqFjz4vEgvXjy',
            clientSecret: 'DZnF_CWBPhq4dINcm0xxPUzOnOIJSswc1xqAdc0Q08UMFX8XmCct5a_Q1VDGcye2',
            cookieSecret: 'test-orientacion-vocacional-10',
            redirectUri: 'http://localhost:8000/callback'
        );
        $this->auth0 = new Auth0($configuration); // ← CORREGIDO
    }

    public function auth0() {
        $session = $this->auth0->getCredentials(); // ← CORREGIDO

        if (null === $session || $session->accessTokenExpired) {
            // Redirect to Auth0 to authenticate the user.
            header('Location: ' . $this->auth0->login()); // ← CORREGIDO
            exit;
        }
    }

    public function callback(Request $request) {
        $input = $request->all();

        if (null !== $this->auth0->getExchangeParameters()) { // ← CORREGIDO
            $this->auth0->exchange(); // ← CORREGIDO
        }

        $user = $this->auth0->getCredentials()?->user; // ← CORREGIDO
        dd($user);
    }
}
