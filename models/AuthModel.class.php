<?php
class AuthModel extends Model
{
    public function insert($username, $password)
    {
        $stmt = $this->mysqli->prepare(
            "INSERT INTO users (username, password) 
             VALUES (?, ?)"
        );

        $stmt->bind_param(
            "sss",
            $username,
            $password,
        );

        $stmt->execute();
    }

    public function getByUsername($username)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        return $stmt->get_result();
    }
}