<?php
class Users{
    //login
    public function login($data){
        session_start();
        $pdo = new PDO('mysql:host=localhost;dbname=bsit202_enriquezjl_chatroom','root','');

        $query = 'SELECT * FROM accounts WHERE email=:email and password=:password';

        $check = $pdo->prepare($query);
        $check->bindValue('email',$data['login_email']);
        $check->bindValue('password',$data['login_password']);
        $check->execute();

        $records = $check->fetchAll();
        if(count($records) == 0){
            echo 'user or pw not found';
        }else{
            $_SESSION['auth'] = $records;
            echo 'success';
        }
    }
    //registration
    public function registration($data){
        $pdo = new PDO('mysql:host=localhost;dbname=bsit202_enriquezjl_chatroom','root','');

        $query = 'SELECT * FROM accounts WHERE email=:email';

        $check = $pdo->prepare($query);
        $check->bindValue('email',$data['email']);
        $check->execute();

        $records = $check->fetchAll();
        if(count($records)== 0){
            $query = 'INSERT INTO accounts(email,password,name) VALUES(:email,:password,:name)';
            $stmt = $pdo->prepare($query);
            $stmt->bindValue('email',$data['email']);
            $stmt->bindValue('password',$data['password']);
            $stmt->bindValue('name',$data['name']);

            $stmt->execute();

            return 'success';
        }else{
            return 'existing';
        }
    }
}