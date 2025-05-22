<?php

namespace App\Http\Controllers;

use App\Services\HasuraService;

class HasuraTestController extends Controller
{
    protected $hasura;

    public function __construct(HasuraService $hasura)
    {
        $this->hasura = $hasura;
    }

    public function showQuestions()
    {
        $query = '
            query {
                questions {
                    id
                    description
                }
            }
        ';

        $response = $this->hasura->query($query);

        $questions = $response['data']['questions'] ?? [];
        return view('test', compact('questions'));
    }
}
