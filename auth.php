<?php
session_start();
require_once('config/db.php');


$db = new \Connect\Db();
$conn = $db->connect();


function auth($connect)
{

    if (isset($_SESSION["auth"])) {
        // вывод "Session is set"; // в целях проверки
        header("Location: profile.php");
    }

    if (isset($_POST["login"])) {

        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);
            $query = pg_query($connect, "SELECT * FROM users WHERE login='$login' AND password='$password'");
            $numrows = pg_fetch_assoc($query);

            if ($numrows != 0) {

                    $db_login = $numrows['login'];
                    $db_pass = $numrows['password'];


                if ($login == $db_login && $password == $db_pass) {

                    $_SESSION['auth'] = $login;

                    header("Location: profile.php");
                }
            } else {

                echo "Неправильно введен логин или пароль!";
            }
        } else {
            echo "Пожалуйста укажите ваши данные";
        }
    }
}
auth($conn);


?>
<h1>Авторизация</h1>
<form action="" method="POST">
    <label for="login">Логин</label>
        <input name="login">

    <label for="password">Пароль</label>
    <input name="password" type="password">

    <input type="submit" value="Отправить">

    <a href="index.php">
        На главную
    </a>
</form>
