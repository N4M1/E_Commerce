<?php

namespace Controllers;

use Controllers\Controller;

class User extends Controller
{
    protected $modelName = 'User';

    public function show()
    {
        $usersTab = $this->model->findAll();

        \Renderer::render('users/show', compact('usersTab'));
    }

    public function search()
    {
        $searchValue = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_SPECIAL_CHARS);
        $result = [];
        if ($searchValue) {
            $result = $this->model->findByEmail($searchValue);
        }
        \Renderer::render('users/search', compact('result'));
    }
}
