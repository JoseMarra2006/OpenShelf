<?php

    $userRepository = new userRepository($db);
    if($action == 'list') :

        $action = 'login';
    
    elseif($action == 'logoff') :
        
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == "true") :
            $_SESSION['logged'] = "false";
            unset($_SESSION['username']);
            unset($_SESSION['role']);

            header('Location: /main-page');
            exit();

        endif;

    elseif($action == 'save') :

        if($_SERVER['REQUEST_METHOD'] === 'POST') :

            $user_email = $_POST['user-email'] ?? null;
            $user_password = $_POST['user-password'] ?? null;

            if($user_email == 'admin@admin.com' && $user_password == 'adminpassword123') :

                $_SESSION['logged'] = "true";
                $_SESSION['role'] = "admin";
                $_SESSION['username'] = "admin";

                header('Location: /main-page');
                exit();

            endif;

            $user = $userRepository->findByEmail($user_email);

            if($user && $user['user_password'] == $user_password) :
                        $_SESSION['logged'] = "true";
                        $_SESSION['role'] = "user";                        
                        $_SESSION['username'] = $users['username'];
    
                        header('Location: /main-page');
                        exit();

            else :
                
                $_SESSION['error'] = 'E-mail or password incorrect. Try again later.';

                header("Location: /login");
                exit();

            endif;

        endif;

    endif;

    require_once('views.php');
?>