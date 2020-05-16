<?php

require_once 'common.php';

class AccountDAO {

    public function authenticate($username){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "SELECT *
                FROM Login_Database
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

        $sql = "INSERT INTO Login_Database
                values(:username,:password)
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username",$username, PDO::PARAM_STR);
        $stmt->bindParam(":password",$password, PDO::PARAM_STR);


        $check = True;
        $check  = $stmt->execute();

        $stmt = null;
        $pdo = null;

        return $check;
    }

    public function ClientRegister($Name,$Income,$Goal){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "INSERT INTO user_info
                values(:Name,0,:Income,'',:Goal,'Basic',0)
                ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":Name",$Name, PDO::PARAM_STR);
        $stmt->bindParam(":Income",$Income, PDO::PARAM_INT);
        $stmt->bindParam(":Goal",$Goal, PDO::PARAM_INT);
        
        $check = True;
        $check  = $stmt->execute();

        $stmt = null;
        $pdo = null;

        return $check;
    }

    public function AutoCreateAccount(){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "INSERT INTO account_info
                values(0,'basic','basic','SGD','6%','Active',0,'')
                ";
        $stmt = $pdo->prepare($sql);
        
        $check = True;
        $check  = $stmt->execute();

        $stmt = null;
        $pdo = null;

        return $check;
    }
    public function getHashedPassword($username){
        $connMgr = new ConnectionManager();
        $pdo = $connMgr->getConnection();

        $sql = "SELECT password
                FROM Login_Database
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
