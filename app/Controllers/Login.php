<?php

namespace App\Controllers;

use App\Models\User;


class Login extends BaseController {
  public function index() {
    if ($this->session->get('logged_in') === true) {
      return redirect()->to('/dash');
    }

    echo view('templates/header');
    echo view('login');
    echo view('templates/footer');
  }

  public function validateLogin() {
    $user_table = new User();
    $data = $this->getFormFields();

    $user = $user_table->getUser($data['userId']);

    if (! $user) {
      return redirect()->to('/login');
    }

    if (! $user_table->checkPassword($data['userId'], $data['userPass'])) {
      return redirect()->to('/login');
    }

    $user_data = [
      'name' => $user_table->getName($data['userId']),
      'logged_in' => true
    ];

    $this->session->set($user_data);

    return redirect()->to('/dash');
  }

  function getFormFields() {
    $request = service('request');

    $data = [
      'userId' => $request->getPost('id'),
      'userPass' => $request->getPost('pass'),
    ];
    
    return $data;
  }

  public function logout() {
    $this->session->remove(
      ['name', 'logged_in']
    );

    return redirect()->to('/login');
  }
}