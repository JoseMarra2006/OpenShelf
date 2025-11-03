<?php
use OpenShelf\Model\UserRepository;

$db = OpenShelf\Database::getConnection();
$userRepository = new userRepository($db);

$all_users_data = [];

if($action == 'list') :

    $all_users_data = $userRepository->getAllUsers();
    $action ='user';

elseif ($action == 'register'):

    $action = 'insert_user';

elseif ($action == 'save'):

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
            
            try {
                $userRepository->addUser($userData);
                $_SESSION['success'] = 'Usuário ' . htmlspecialchars($username) . ' criado com sucesso.';
            } catch (PDOException $e) {
                if ($e->getCode() == 23000) {
                    $_SESSION['error'] = 'Erro ao criar usuário. Email ou CPF já podem estar em uso.';
                } else {
                    $_SESSION['error'] = 'Erro no banco de dados: ' . $e->getMessage();
                }
            }

        else:
            $_SESSION['error'] = 'Todos os campos são obrigatórios.';
        endif;

    endif;

    header('Location: /user');
    exit();
    
endif;

require_once("views.php");
?>