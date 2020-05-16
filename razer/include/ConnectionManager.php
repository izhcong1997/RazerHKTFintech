<?php

class ConnectionManager {

    public function getConnection() {
        $servername = 'bank-db-instance2.ccv1wbsl31a1.ap-southeast-1.rds.amazonaws.com';
        $username = 'cong_bank_admin';
        $password = 'congbird';
        $dbname = 'Account';
        $port = '3306';
        
        // Create connection
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname;port=$port",
                        $username,
                        $password);     

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // if fail, exception will be thrown

        // Return connection object
        return $pdo;
    }

}