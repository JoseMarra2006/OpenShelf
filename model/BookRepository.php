<?php
    class BookRepository {
        private $db;

        public function __construct(PDO $db) {
            $this->db = $db;
        }

        public function addBook(array $bookData) {
            $sql = "INSERT INTO books (book_title, book_pages, book_year, book_genre, book_author) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                $bookData['book_title'],
                $bookData['book_pages'],
                $bookData['book_year'],
                $bookData['book_genre'],
                $bookData['book_author']
            ]);
        }

        public function getAllBooks() {
            $stmt = $this->db->query("SELECT * FROM books ORDER BY id DESC");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>