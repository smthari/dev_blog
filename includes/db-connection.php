<?php


$server = 'localhost';
$user = 'root';
$password = '';
$db = 'dev_blog';

$dbcon = new PDO("mysql:host=$server;dbname=$db", $user, $password);

if ($dbcon) {
?>

    <script>
        console.log("database is connected");
    </script>

<?php
} else {
    echo "database not connected";
}

?>