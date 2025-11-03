<?php
    use OpenShelf\Model\BookRepository;
    use OpenShelf\Model\LendingRepository;

    $db = OpenShelf\Database::getConnection();
    $bookRepository = new BookRepository($db);
    $lendingRepository = new LendingRepository($db);

    $catalogue_data = [];

    if($action == 'list') :

        $action = 'catalogue';
        $catalogue_data = $bookRepository->getAllBooks();
    
    elseif($action == 'insert') :
        
        $action = 'insert-book';

    elseif($action == 'search-to-lend') :

        $action = 'search-book-to-lend';

    elseif($action == 'show-book-lend') :

        $action = 'show-book';

    elseif($action == 'save-lend') :
        
        if($_SERVER['REQUEST_METHOD'] === 'POST') :

            $book_lended = $_POST['book'] ?? null;  
            $username = $_SESSION['username'] ?? null;
                
            if($username && $book_lended) {
                
                $success = $lendingRepository->lendBook($username, $book_lended);

                if($success) {
                    $_SESSION['success'] = 'Livro "' . htmlspecialchars($book_lended) . '" emprestado com sucesso!';
                } else {
                    $_SESSION['error'] = "Você já emprestou este livro, devolva o livro para emprestá-lo novamente.";
                }

                header("Location: /catalogue");
                exit();
            }
        endif;

    elseif($action == 'save-book') :

        if($_SERVER['REQUEST_METHOD'] === 'POST') :

            $book_title = $_POST['book_title'];
            $book_pages = $_POST['book_pages'];
            $book_year = $_POST['book_year'];
            $book_genre = $_POST['book_genre'];
            $book_author = $_POST['book_author'];

            if(!empty($book_title) && !empty($book_pages) && !empty($book_year) && !empty($book_genre) && !empty($book_author)) : 

                $bookData = [
                    'book_title' => $book_title,
                    'book_pages' => $book_pages,
                    'book_year' => $book_year,
                    'book_genre' => $book_genre,
                    'book_author' => $book_author
                ];
                
                $bookRepository->addBook($bookData);
                $_SESSION['success'] = 'Livro "' . htmlspecialchars($book_title) . '" adicionado com sucesso!';
                
            else:
                $_SESSION['error'] = 'Todos os campos são obrigatórios para adicionar um livro.';
                header('Location: /catalogue/insert'); // Volta para o formulário
                exit();
            endif;

        endif;

        header('Location: /catalogue');
        exit();

    endif;

    require_once("views.php");
?>