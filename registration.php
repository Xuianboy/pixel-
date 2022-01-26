<?php
session_start();
require_once('config/db.php');


$db = new \Connect\Db();
$conn = $db->connect();

function register($connect)
{

    if (isset($_SESSION["auth"])) {
        // вывод "Session is set"; // в целях проверки
        header("Location: profile.php");
    }

    if (!empty($_POST['login']) and !empty($_POST['password'])) {

        $login = $_POST['login'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];



        $query = pg_query($connect, "INSERT INTO users (login,name,email,password) VALUES ('$login','$name','$email','$password')");
        return $query;
    }
}
register($conn);
?>
<html>
<h1>Регистрация</h1>
<form action="" method="post">
    <label for="login">Логин</label>
    <input class="form-styling" type="text" name="login" placeholder="Логин"/>

    <label for="name">Имя</label>
    <input class="form-styling" type="text" name="name" placeholder="Имя"/>

    <label for="email">Email</label>
    <input class="form-styling" type="text" name="email" placeholder="Email"/>

    <label for="password">Пароль</label>
    <input class="form-styling" type="password" name="password" placeholder="Пароль"/>

    <p><input type="submit" value="Зарегистрироваться"></p>

    <a href="index.php">
       На главную
    </a>

</form>
</body>
</html>
