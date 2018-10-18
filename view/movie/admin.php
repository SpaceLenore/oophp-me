<div class="content-wrap">
    <div class="dblinks">
        <ul>
            <li><a href="movie">Visa alla filmer</a></li>
            <li><a href="movie-search">Sök bland filmer</a></li>
            <li><a href="movie-create">Skapa ny film</a></li>
            <li><a href="movie-admin">Reigera / ta bort filmer</a></li>
        </ul>
    </div>

    <div class="restorelink">
        <form action="restore-database" method="post">
            <input type="submit" name="restore" value="Återställ Databasen">
        </form>
    </div>

<?php
if (!$res) {
    return;
}
?>

    <table class="dbtable">
        <tr class="first">
            <th>Rad</th>
            <th>Id</th>
            <th>Bild</th>
            <th>Titel</th>
            <th>År</th>
            <th>Uppdatera</th>
            <th>Ta bort</th>
        </tr>
        <?php $id = -1; foreach ($res as $row) :
            $id++; ?>
            <tr>
                <td><?= htmlentities($id); ?></td>
                <td><?= htmlentities($row->id) ?></td>
                <td><img class="thumb" src="<?= htmlentities($row->image) ?>"></td>
                <td><?= htmlentities($row->title) ?></td>
                <td><?= htmlentities($row->year) ?></td>
                <td><a href="movie-edit/<?= htmlentities($row->id) ?>">Redigera</a></td>
                <td>
                    <form action="movie-delete" method="post">
                        <input type="number" hidden readonly name="id" value="<?= htmlentities($row->id); ?>">
                        <input type="submit" name="delete" value="Ta Bort">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
