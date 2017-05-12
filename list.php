<?php

include 'Client.php';
$search = null;

if (isset($_GET['search'])) {
    $search = $_GET['search'];
}
$client = new Client();
$list = $client->fetchAll($search);

?>

<form method="get" action="" class="search-form" name="search-form">
<input type="text" name="search"  value="" id="search"/>
<button type="submit" id="submit-btn">search</button>
</form>

<?php
if (count($list)) {
    echo "<table><tr><th>id</th><th>first_name</th><th>second_name</th><th>last_name</th><th>email</th><th>note</th><th>edit</th><th>delete</th></tr>";

    foreach ($list as $row) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["first_name"]. "</td><td>" . $row["second_name"]. "</td><td>" . $row["last_name"]. "</td><td>" . $row["email"]. " </td><td>" . $row["note"]. "</td><td> <a href='index.php?edit=" . $row["id"] . "'>edit </a> </td><td> <a href='list.php?delete=" . $row["id"] . "'>delete </a></td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
if (isset($_GET['delete'])) {
          $client = new Client();
          $client->fetchById($_GET['delete']);
          $client->delete();
          header('Location: list.php');
    }

?>
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>
<a href="index.php">Go back</a>
