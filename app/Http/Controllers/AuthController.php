<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth0\SDK\Auth0;
use Auth0\SDK\Configuration\SdkConfiguration;
use App\Services\HasuraService;

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

    public function callback(Request $request)
    {
        if (null !== $this->auth0->getExchangeParameters()) {
            $this->auth0->exchange();
        }

        $user = $this->auth0->getCredentials()?->user;
        $email = $user['email'] ?? null;

        if (!$email) {
            abort(403, 'No se pudo obtener el correo del usuario.');
        }

        $hasura = new HasuraService();

        $query = <<<GQL
        query (\$email: String!) {
            users(where: {email: {_eq: \$email}}) {
                id
                firstName
            }
        }
        GQL;

        $response = $hasura->query($query, ['email' => $email]);
        $users = $response['data']['users'] ?? [];

        if (count($users) > 0) {
            // Usuario encontrado
            $request->session()->put('user', [
                'email' => $email,
                'first_name' => $users[0]['firstName'],
                // Puedes guardar más info si quieres
            ]);
            return redirect()->route('index');  // Redirige al home
        } else {
            // Usuario no encontrado
            return response()->view('auth.user_not_found', ['email' => $email]);
        }
    }
}
