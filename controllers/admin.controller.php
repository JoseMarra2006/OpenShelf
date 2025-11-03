<?php
use OpenShelf\Model\UserRepository;

$db = OpenShelf\Database::getConnection();
$userRepository = new UserRepository($db);

$all_users_data = [];
$current_user_data = []; 

if($action == 'list') :
    
    $all_users_data = $userRepository->getAllUsers();
    $action = 'admin';

elseif($action == 'edit') :
    
    $username_to_edit = $_POST['user'] ?? null;
    if ($username_to_edit) {
        $current_user_data = $userRepository->findByUsername($username_to_edit);
        if ($current_user_data) {
            $_SESSION['admin_editing_username'] = $current_user_data['username']; 
            $action = 'edit-profile';
        } else {
            $_SESSION['error'] = 'Usuário não encontrado.';
            header('Location: /admin');
            exit();
        }
    } else {
        header('Location: /admin');
        exit();
    }

elseif ($action == 'update') : 

    if($_SERVER['REQUEST_METHOD'] === 'POST') :

        $username_to_update = $_SESSION['admin_editing_username'] ?? null;
        $new_user_email = $_POST['user-email'] ?? null;
        $new_user_password = $_POST['user-password'] ?? null;

        if ($username_to_update && !empty($new_user_email) && !empty($new_user_password)) :
            
            $userRepository->updateUser($username_to_update, $new_user_email, $new_user_password);
            $_SESSION['success'] = 'Usuário ' . htmlspecialchars($username_to_update) . ' atualizado com sucesso.';
            unset($_SESSION['admin_editing_username']);

        else :
            $_SESSION['error'] = 'Falha ao atualizar. Dados incompletos.';
        endif;

    endif;

    header('Location: /admin');
    exit();    

elseif($action == 'delete') :

    $username_to_delete = $_POST['user'] ?? null;

    if ($username_to_delete) :
        if (isset($_SESSION['username']) && $username_to_delete === $_SESSION['username']) {
             $_SESSION['error'] = 'Você não pode deletar a si mesmo por esta ação.';
        } else {
            $userRepository->deleteUser($username_to_delete);
            $_SESSION['success'] = 'Usuário ' . htmlspecialchars($username_to_delete) . ' deletado com sucesso.';
        }
    else:
        $_SESSION['error'] = 'Nome de usuário inválido para deleção.';
    endif;

    header('Location: /admin');
    exit();    

endif;

require_once('views.php');    
?>