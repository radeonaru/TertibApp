<?php
class AuthsController
{

    public function loginForm()
    {

        if (Session::has('auth')) {
            return Helper::redirect('/');
        }

        return Helper::view('auth/login', ["flash" => Flasher::flash()]);
    }

    public function login()
    {

        if (Session::has('auth')) {
            return Helper::redirect('/');
        }

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            if ($username == "rian" && $password = "rian") {
                Session::push('auth', new Auth(1, $username, 'admin'));
                Helper::redirect('/dashboard');
            } else {
                echo "Login gagal";
                Flasher::setFlash("danger", "SLIWIK");
                Helper::redirect('/login');
            }
        } else {
            echo "Login gagal";
        }
    }
}
