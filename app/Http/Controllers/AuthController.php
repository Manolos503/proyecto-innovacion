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
            domain: 'dev-62jxa14bxgpd6hrq.us.auth0.com',
            clientId: 'QKnR6JrOCE8X7TIFNMQQcXc62m19Zhek',
            clientSecret: 'sRxdWoG-F2vtB_yeDHAhF7c3YGDYlo0-vpoHyt8BCZ-xEBFWb_jBvj4FJhRaUNSU',
            cookieSecret: 'base64:11SDSpMgvU7wJz1KLzLcocSrJmfZPJ8k3YnotLnGSTs=',
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
