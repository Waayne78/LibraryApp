<?php

ob_start();

require_once '../views/login.view.php';
include './config/pdo.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $sql = "SELECT * FROM user WHERE email = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$email]);
            $result = $stmt->fetch();

            if ($result) {
                $hash = $result['password'];

                if (password_verify($password, $hash)) {

                    session_start();
                    $_SESSION['user'] = $result;
                    $_SESSION['user']['logged'] = true;

                    header('Location: ../views/index.php');
                    ob_end_flush();

                } else {
                    $error = "Le mot de passe est incorrect";
                }
            } else {
                $error = "L'email n'existe pas en BDD";
            }
        } else {
            $error = "L'email n'est pas au bon format";
        }
    }
}
