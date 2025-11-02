<?php
    class LendingRepository {
        private $db;

        public function __construct(PDO $db) {
            $this->db = $db;
        }

        public function getBooksByUsername($username) {
            $sql = "SELECT b.book_title
                FROM lendings l
                JOIN users u ON l.user_id = u.id
                JOIN books b ON l.book_id = b.id
                WHERE u.username = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$username]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function lendBook($username, $bookTitle) {
            $sql_check = "SELECT l.id
                      FROM lendings l
                      JOIN users u ON l.user_id = u.id
                      JOIN books b ON l.book_id = b.id
                      WHERE u.username = ? AND b.book_title = ?";
            $stmt_check = $this->db->prepare($sql_check);
            $stmt_check->execute([$username, $bookTitle]);
            if ($stmt_check->fetch()) {
                return false; // Já emprestado
            }

            $sql = "INSERT INTO lendings (user_id, book_id)
                SELECT u.id, b.id
                FROM users u, books b
                WHERE u.username = ? AND b.book_title = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$username, $bookTitle]);
        }

        public function returnBook($username, $bookTitle) {
            $sql = "DELETE l FROM lendings l
                JOIN users u ON l.user_id = u.id
                JOIN books b ON l.book_id = b.id
                WHERE u.username = ? AND b.book_title = ?";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([$username, $bookTitle]);
        }
    }
?>