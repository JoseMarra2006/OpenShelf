<?php
use OpenShelf\Model\UserRepository;
use OpenShelf\Model\LendingRepository;

$db = OpenShelf\Database::getConnection();
$userRepository = new UserRepository($db);
$lendingRepository = new LendingRepository($db);

$current_user_data = [];
$my_books_data = [];

$username_session = $_SESSION['username'] ?? null;
if (!$username_session) {
    $_SESSION['error'] = 'Você precisa estar logado para acessar esta página.';
    header('Location: /login');
    exit();
}

if($action == 'list') :
    
    $current_user_data = $userRepository->findByUsername($username_session);
    $my_books_data = $lendingRepository->getBooksByUsername($username_session);
    $action = 'my-profile';

elseif ($action == 'edit') :

    $current_user_data = $userRepository->findByUsername($username_session);
    $action = 'edit-profile';

elseif ($action == 'update') :

    if($_SERVER['REQUEST_METHOD'] === 'POST') :

        $new_user_email = $_POST['user-email'] ?? null;
        $new_user_password = $_POST['user-password'] ?? null;

        if (!empty($new_user_email) && !empty($new_user_password)) :
            
            $userRepository->updateUser($username_session, $new_user_email, $new_user_password);
            $_SESSION['success'] = 'Perfil atualizado com sucesso.';

        else :
            $_SESSION['error'] = 'Falha ao atualizar. Dados incompletos.';
        endif;

    endif;

    header('Location: /my-profile');
    exit();

elseif($action == 'delete') :

    $userRepository->deleteUser($username_session);

    $_SESSION['logged'] = "false";
    unset($_SESSION['username']);
    unset($_SESSION['role']);
    session_destroy();

    session_start();
    $_SESSION['success'] = 'Sua conta foi deletada com sucesso.';
    header('Location: /main-page');
    exit();
    
elseif($action == 'return') :

    $book_return = $_POST['book'] ?? null;

    if ($book_return) {
        $lendingRepository->returnBook($username_session, $book_return);
        $_SESSION['success'] = 'Livro "' . htmlspecialchars($book_return) . '" devolvido com sucesso.';
    } else {
        $_SESSION['error'] = 'Não foi possível devolver o livro.';
    }

    header("Location: /my-profile");
    exit();

endif;

require_once('views.php');
?>