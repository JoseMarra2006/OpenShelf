<?php
    global $db;
    $userRepository = new userRepository($db);

    if($action == 'list') :

        $action = 'register';
    
    elseif($action == 'save') :

        if($_SERVER['REQUEST_METHOD'] === 'POST') :

            $username = $_POST['username'];
            $user_email = $_POST['user-email'];
            $user_cpf = $_POST['user-cpf'];
            $user_password = $_POST['user-password'];

            if(!empty($username) && !empty($user_email) && !empty($user_cpf) && !empty($user_password)) :

                $userData = [
                    'username' => $username,
                    'user_email' => $user_email,
                    'user_cpf' => $user_cpf,
                    'user_password' => $user_password
                ];

                try{
                    $userRepository->addUser($userData);
                }catch(PDOException $e){
                }

            endif;

        endif;

        header('Location: /login');

    endif;

    require_once('views.php');