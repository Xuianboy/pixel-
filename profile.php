<?php
session_start();

require_once('config/db.php');
use Connect\Db;

$db = new Db();
$conn = $db->connect();

    if(!isset($_SESSION["auth"])):
        header("location:auth.php");
    else:
        $session_login = $_SESSION["auth"];
        $query = pg_query($conn,"SELECT * FROM users WHERE login='$session_login'");

        $row = pg_fetch_assoc($query);
?>


    <div >
        <h2>Добро пожаловать, <span><?php echo $session_login;?>! </span></h2>
        <p>Имя:<?php echo $row['name']?> </p>
        <p>Email:<?php echo $row['email']?> </p>
        <p><a href="logout.php">Выйти</a> из системы</p>
    </div>


<?php endif; ?>