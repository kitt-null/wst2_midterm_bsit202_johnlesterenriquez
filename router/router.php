<?php
require_once('../class/class.users.php');
require_once('../class/class.chat.php');

$users = new Users;
if($_GET['ind'] == 'resgister'){
    echo $users->register($_POST);
}
if($_GET['ind'] == 'login'){
    echo $users->login($_POST);
}

// if($_get['ind'] == 'send'){
//     $chat = new Chat;
//     $chat->send($_POST);
// }

// if($_GET['ind'] == 'collect'){
//     $chat = new chats;
//     echo ($chat->collect());
// }