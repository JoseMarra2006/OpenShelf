<?php
use OpenShelf\Model\BookRepository;

$db = OpenShelf\Database::getConnection();
$bookRepository = new BookRepository($db);
$author_books_data = [];

if ($action == 'list') :
     
    $action = 'author';
    $author_books_data = $bookRepository->getAllBooks();

elseif ($action == 'register-book') :

    $action = 'author-register-book'; 

elseif ($action == 'save') :

    if($_SERVER['REQUEST_METHOD'] === 'POST') :

        $author_name = $_POST['author_name'] ?? null; 
        $book_title = $_POST['book_title'] ?? null;
        $book_pages = $_POST['book_pages'] ?? null;
        $book_year = $_POST['book_year'] ?? null;
        $book_genre = $_POST['book_genre'] ?? null;

        if (!empty($author_name) && !empty($book_title) && !empty($book_pages) && !empty($book_year) && !empty($book_genre)) :

            $bookData = [
                'book_title' => $book_title,
                'book_pages'=> $book_pages,
                'book_year'=> $book_year,
                'book_genre'=> $book_genre,
                'book_author' => $author_name
            ];
            
            $bookRepository->addBook($bookData);
            $_SESSION['success'] = 'Livro "' . htmlspecialchars($book_title) . '" adicionado com sucesso!';

        else:
            $_SESSION['error'] = 'Todos os campos são obrigatórios.';
            header('Location: /author/register-book');
            exit();
        endif;

    endif;

    header('Location: /catalogue');
    exit();

endif;

require_once("views.php");
?>