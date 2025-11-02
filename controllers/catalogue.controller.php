<?php
    $bookRepo = new BookRepository($db);
    $lendingRepo = new LendingRepository($db);

    $catalogue_data = [];

    if($action == 'list') :

        $action = 'catalogue';
        $catalogue_data = $bookRepo->getAllBooks();
    
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
                
            if($username && book_lended) {
                
                $success = $lendingRepo->lendBook($username, $book_lended);

                if(!$success) {
                    $_SESSION['error'] = "You have already lended this book, return the book to lend it again.";
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
                
                $bookRepo->addBook($bookData);
                
            endif;

        endif;

        header('Location: /catalogue');

    endif;

    require_once("views.php");



