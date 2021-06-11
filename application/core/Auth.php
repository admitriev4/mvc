<?php
class Auth {
    public function logIn($user) {
        foreach ($user as $key => $value) {
            $arr[$key] = $value;
        }
        $_SESSION['fUser'] = $arr;

    }
    public function check($key) {
        if(isset($_SESSION[$key])) {
            return true;
        }
        else {
            return false;
        }
    }
    public function logOut() {
        unset($_SESSION['fUser']);
    }
}