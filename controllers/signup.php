<?php

ob_start();
require_once '../views/signup.view.php';
include '../config/pdo.php';
include '../utils/functions.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm'])) {

        $name = htmlspecialchars($_POST['name']);
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm = $_POST['confirm'];

        if ($password === $confirm) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $hash = password_hash($password, PASSWORD_DEFAULT);

                if (checkExists('name', $name, $pdo)) {
                    $error = "Le nom existe déjà en BDD";
                } else if (checkExists('email', $email, $pdo)) {
                    $error = "L'email est déjà utilisé";
                } else {

                    $sql = "INSERT INTO user (name, email, password) VALUES(?, ?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $result = $stmt->execute([$name, $email, $hash]);


                    if ($result) {
                        header('Location: ../views/login.view.php');
                        ob_end_flush();

                    } else {
                        $error = "Erreur lors de l'ajout : " . print_r($stmt->errorInfo());
                    }
                }

            } else {
                $error = " The email is not valid !";
            }
        } else {
            $error = "Passwords do not match !";
        }
    } else {
        $error = "Please fill all the fields !";
    }
}