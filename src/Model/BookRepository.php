<?php
namespace OpenShelf\Model;

use PDO;

class BookRepository {
    private $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    public function addBook(array $bookData) {
        $sql = "INSERT INTO books (book_title, book_pages, book_year, book_genre, book_author) VALUES (?, ?, ?, ?, ?)";
        $statement = $this->db->prepare($sql);
        return $statement->execute([
            $bookData['book_title'],
            $bookData['book_pages'],
            $bookData['book_year'],
            $bookData['book_genre'],
            $bookData['book_author']
        ]);
    }

    public function getAllBooks() {
        $statement = $this->db->query("SELECT * FROM books ORDER BY id DESC");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getNewestBooks($limit = 4) {
        $sql = "SELECT * FROM books ORDER BY id DESC LIMIT :limit";
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>