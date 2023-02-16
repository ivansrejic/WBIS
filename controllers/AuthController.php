<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\models\LoginModel;
use app\models\RegistrationModel;

class AuthController extends Controller
{
    public function login()
    {
        if (Application::$app->session->get(Application::$app->session->USER_SESSION) !== false)
        {
            header("location:" . "/home");
        }
        return $this->view("login", "auth", null);
    }

    public function accessDenied()
    {
        return $this->view("accessDenied", "auth", null);
    }

    public function loginProcess()
    {
        $login = new LoginModel();
        $login->mapData($this->router->request->all());
        $login->validate();
        if ($login->errors)
        {
            return $this->view("login", "auth", $login);
        }

        if ($login->login())
        {
            Application::$app->session->set(Application::$app->session->USER_SESSION, $login->email);
            header("location:" . "/home");
        }

        Application::$app->session->setFlash("login", "Login nije uspesno prosao!");

        return $this->view("login", "auth", $login);
    }

    public function logout()
    {
        Application::$app->session->remove(Application::$app->session->USER_SESSION);
        Application::$app->session->remove(Application::$app->session->ROLE_SESSION);
        Application::$app->session->remove(Application::$app->session->CART_SESSION);
        header("location:" . "/login");
    }

    public function registration()
    {
        return $this->view("registration", "auth", null);
    }

    public function registrationProcess()
    {
        $registration = new RegistrationModel();
        $registration->mapData($this->router->request->all());
        $registration->validate();
        if ($registration->errors)
        {
            Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_ERROR,"Registration failed");
            return $this->view("registration", "auth", $registration);
        }

        $registration->registration();

        Application::$app->session->setFlash(Application::$app->session->FLASH_MESSAGE_SUCCESS,"Registration successfull");

        return $this->view("registration", "auth", null);
    }

    public function authorize()
    {
        return [];
    }
}