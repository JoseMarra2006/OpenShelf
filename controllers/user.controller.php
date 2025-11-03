<?php
global $db;
$userRepository = new userRepository($db);

$all_users_data = [];

if($action == 'list') :

    $action ='user';

elseif ($action == 'register'):

    $action = 'insert_user';

elseif ($action == 'save'):

    if($_SERVER['REQUEST_METHOD'] === 'POST') :

        $username = $_POST['username'] ?? null;
        $user_email = $_POST['user_email'] ?? null;
        $user_cpf = $_POST['user_cpf'] ?? null;
        $user_password = $_POST['user_password'] ?? null;
    
        if(!empty($username) && !empty($user_email) && !empty($user_cpf) && !empty($user_password)) :

           $userData = [
               'username' => $username,
               'user_email' => $user_email,
               'user_cpf' => $user_cpf,
               'user_password' => $user_password
            ];
            
            $userRepo->addUser($userData);

        endif;

    endif;

    header('Location: /user');
    exit();
    
endif;

require_once("views.php");