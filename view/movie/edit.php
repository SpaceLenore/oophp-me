<?php
if (!$res) {
    return;
}
?>
<div class="content-wrap">
    <div class="dblinks">
        <ul>
            <li><a href="../movie">Visa alla filmer</a></li>
            <li><a href="../movie-search">Sök bland filmer</a></li>
            <li><a href="../movie-create">Skapa ny film</a></li>
            <li><a href="../movie-admin">Reigera / ta bort filmer</a></li>
        </ul>
    </div>

<h1 class="search-title">Redigera Film</h1>

<?php
$id = -1;
foreach ($res as $row) :
    $id++;
    ?>
    <form action="../movie-edit/<?= htmlentities($row->id) ?>" method="post">
        <label for="title">Titel</label><br>
        <input type="text" name="title" value="<?= htmlentities($row->title) ?>"><br><br>
        <label for="">Bild</label><br>
        <input type="text" name="image" value="<?= htmlentities($row->image) ?>"><br><br>
        <label for="year">År</label><br>
        <input type="number" name="year" value="<?= htmlentities($row->year) ?>"><br><br>
        <input type="submit" name="update" value="Updatera film">
    </form>
<?php endforeach; ?>
