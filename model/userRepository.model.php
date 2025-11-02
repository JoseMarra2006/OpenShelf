<?php
class userRepository{

    private $db;

    public function __construct(PDO $db){
    
        $this->db = $db;
    }

    public function findByEmail($email_user){
        $statement = $this->db->prepare("SELECT * FROM users WHERE user_email = ?");
        $statement->execute([$email_user]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function findByUsername($username){
        $statement = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        $statement->execute([$username]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addUser(array $userData){
        $sql = "INSERT INTO users (username, user_email, user_cpf, user_password) VALUES (?, ?, ?, ?)";
        $statement = $this->db->prepare($sql);

        return $statement->execute([
            $userData['username'],
            $userData['user_email'],
            $userData['user_cpf'],
            $userData['user_password']
        ]);
    }

    public function deleteUser($username){
        $statement = $this->db->prepare("DELETE FROM users WHERE username = ?");
        return $statement->execute([$username]);
    }

    public function updateUser($username, $newEmail, $newPassword){
        $sql = "UPDATE users SET user_email = ?, user_password = ? WHERE username = ?";
        $statement = $this->db->prepare($sql);
        return $statement->execute([$newEmail, $newPassword, $username]);
    }

    public function getAllUsers(){
        $statement = $this->db->query("SELECT * FROM users");
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>

