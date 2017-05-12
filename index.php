<?php

function d($d)
{
    echo "<pre>";

    print_r($d);
    echo "\n";
}

include 'Client.php';

if (isset($_POST['email']) && !empty($_POST['email'])) {
    $client = new Client ($_POST);
    $client->setIsActive(1);
    $client->save();
    header('Location: list.php');
}
if (isset($_GET['edit'])) {
    $editClient = new Client();
    $editClient->fetchById($_GET['edit']);
   }

?>
<div class="container">

    <form method="post" action="" class="reg-form" name="reg-form">
        <fieldset>
            <legend>Client add data</legend>
            <ol>
                <li>
                    <label for="first_name">firstname</label>
                    <input type="text" name="first_name"  value="<?php echo isset($editClient) ? $editClient->getFirstName() : ''; ?>"
                           id="first_name"/>
                </li>
                <li>
                    <label for="second_name">second name</label>
                    <input type="text" name="second_name"  value="<?php echo isset($editClient) ? $editClient->getSecondName() : ''; ?>"
                           id="second_name"/>
                </li>
                <li>
                    <label for="last_name">last name</label>
                    <input type="text" name="last_name"  value="<?php echo isset($editClient) ? $editClient->getLastName() : ''; ?>"
                           id="last_name"/>
                </li>
                <li>
                    <label for="email">email</label>
                    <input type="email" name="email"  value="<?php echo isset($editClient) ? $editClient->getEmail() : ''; ?>"
                           id="email"/>
                </li>
                <li>
                    <label for="note">note</label>
                    <input type="text" name="note"  value="<?php echo isset($editClient) ? $editClient->getNote() : ''; ?>"
                           id="note"/>
                </li>

                <li>
                    <button type="submit" id="submit-btn">submit</button>
                </li>
            </ol>
        </fieldset>
    </form>
</div>

<a href="list.php">Go to list</a>
<head>
    <link rel="stylesheet" type="text/css" href="style.php">
</head>
