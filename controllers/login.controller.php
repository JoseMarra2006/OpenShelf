<?php
    use OpenShelf\Model\UserRepository;

    $db = OpenShelf\Database::getConnection();
    $userRepository = new UserRepository($db);

    if($action == 'list') :

        $action = 'login';
    
    elseif($action == 'logoff') :
        
        if(isset($_SESSION['logged']) && $_SESSION['logged'] == "true") :
            $_SESSION['logged'] = "false";
            unset($_SESSION['username']);
            unset($_SESSION['role']);

            $_SESSION['success'] = 'Logoff realizado com sucesso!';
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
                $_SESSION['success'] = 'Bem-vindo, Admin!';

                header('Location: /main-page');
                exit();

            endif;

            $user = $userRepository->findByEmail($user_email);

            if($user && $user['user_password'] == $user_password) :
                        $_SESSION['logged'] = "true";
                        $_SESSION['role'] = "user";                        
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['success'] = 'Login realizado com sucesso. Bem-vindo, ' . htmlspecialchars($user['username']) . '!';
    
                        header('Location: /main-page');
                        exit();

            else :
                
                $_SESSION['error'] = 'E-mail ou senha incorretos. Tente novamente.';
                header("Location: /login");
                exit();

            endif;

        endif;

    endif;

    require_once('views.php');
?>