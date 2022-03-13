<?php 

$link = mysqli_connect('localhost', 'root', '', 'nedviga');

if(mysqli_connect_errno()){
    echo 'Ошибка подключения к БД';
    exit();
}

