<?php

require_once 'common.php';

class AccountDAO {

    public function authenticate($username){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "SELECT *
                FROM users
                WHERE username = :username
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username",$username, PDO::PARAM_STR);
        $auth_success=null;
        if($stmt->execute()){
            if($stmt->fetch()){
                $auth_success = true;
            }
        }

        $stmt = null;
        $pdo = null;

        return $auth_success;
    }

    public function register($username,$password){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "INSERT INTO users
                values(:username,:password)
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username",$username, PDO::PARAM_STR);
        $stmt->bindParam(":password",$password, PDO::PARAM_STR);
        $stmt->execute();

        $stmt = null;
        $pdo = null;

        return;
    }
    public function getHashedPassword($username){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "SELECT password
                FROM users
                WHERE username = :username
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username",$username, PDO::PARAM_STR);
        $hashed=null;
        if($stmt->execute()){
            if($row = $stmt->fetch()){
                $hashed = $row['password'];
            }
        }

        $stmt = null;
        $pdo = null;

        return $hashed;
    }
}
