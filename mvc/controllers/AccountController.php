<?php

class Account extends Controller
{
        function index()
        {
        }
        function login()
        {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $tblAccount = $this->model("Accounts");
                        $username = $this->test_input($_POST["username"]);
                        $password = $this->test_input($_POST["password"]);
                        $acc = $tblAccount->validate($username, $password);
                        if ($acc->num_rows != null) {
                                $row = mysqli_fetch_assoc($acc);
                                $_SESSION['account_id'] = $row['id'];
                                $_SESSION['username'] = $row['username'];
                                $_SESSION['role'] = $row['role'];
                                header("Location: /php-mvc/home");
                        }
                } else {
                        $this->view("default", "pages/login");
                        $this->view->render();
                }
        }
        function logout()
        {
                unset($_SESSION['account_id']);
                unset($_SESSION['username']);
                unset($_SESSION['role']);
                header("Location: /php-mvc/home");
        }
        function test_input($data)
        {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
        }
}
