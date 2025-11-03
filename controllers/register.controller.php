<?php
    use OpenShelf\Model\UserRepository;

    $db = OpenShelf\Database::getConnection();
    $userRepository = new userRepository($db);

    if($action == 'list') :

        $action = 'register';
    
    elseif($action == 'save') :

        if($_SERVER['REQUEST_METHOD'] === 'POST') :

            $username = $_POST['username'] ?? null;
            $user_email = $_POST['user-email'] ?? null;
            $user_cpf = $_POST['user-cpf'] ?? null;
            $user_password = $_POST['user-password'] ?? null;

            if(!empty($username) && !empty($user_email) && !empty($user_cpf) && !empty($user_password)) :

                $userData = [
                    'username' => $username,
                    'user_email' => $user_email,
                    'user_cpf' => $user_cpf,
                    'user_password' => $user_password
                ];

                try{
                    $userRepository->addUser($userData);
                    $_SESSION['success'] = 'Usuário registrado com sucesso! Por favor, faça o login.';
                    header('Location: /login');
                    exit();

                } catch(PDOException $e){
                    if ($e->getCode() == 23000) {
                         $_SESSION['error'] = 'Erro ao registrar. O e-mail ou CPF já está em uso.';
                    } else {
                         $_SESSION['error'] = 'Ocorreu um erro no banco de dados: ' . $e->getMessage();
                    }
                    header('Location: /register');
                    exit();
                }

            else :
                $_SESSION['error'] = 'Por favor, preencha todos os campos.';
                header('Location: /register');
            endif;

        endif;
        
        header('Location: /login');
        exit();

    endif;

    require_once('views.php');
?>