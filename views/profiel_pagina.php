<?php 
include '../code/database.php';
$db = new Database();
$profiel = $db->profiel_pagina();

// if ($_SESSION['is_admin']) {

    ?>
<table>
        <tr>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Email</th>
            <th>Telefoonnummer</th>
        </tr>
        <?php foreach ($profiel as $entry) { ?>
         <tr>
                <td><?= $entry['voornaam'] ?></td>
                <td><?= $entry['achternaam'] ?></td>
                <td><?= $entry['email'] ?></td>
                <td><?= $entry['telefoonnummer'] ?></td>
                </tr>
        <?php } //endforeach ?>
        <tr>
        <td colspan="3"></td>
    	</tr>
    </table>
    	<textarea name="post" action="post.php" method="post" input type="text" name="post" id="post">
  			</textarea>
		<button type="submit">Post</button>



