<div class="content-wrap">
    <div class="dblinks">
        <ul>
            <li><a href="movie">Visa alla filmer</a></li>
            <li><a href="movie-search">Sök bland filmer</a></li>
            <li><a href="movie-create">Skapa ny film</a></li>
            <li><a href="movie-admin">Reigera / ta bort filmer</a></li>
        </ul>
    </div>

    <div class="search-box">
        <h1 class="search-title" id="search">Sök Efter filmer</h1>
        <form method="get" action="#search">
            <input class="search-bar" type="text" name="search" placeholder="Film eller År">
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
            </tr>
            <?php
            $id = -1;
            foreach ($res as $row) :
                $id++;
                ?>
            <tr>
                <td><?= htmlentities($id); ?></td>
                <td><?= htmlentities($row->id) ?></td>
                <td><img class="thumb" src="<?= htmlentities($row->image) ?>"></td>
                <td><?= htmlentities($row->title) ?></td>
                <td><?= htmlentities($row->year) ?></td>
            </tr>
            <?php
            endforeach;
            ?>
    </table>
</div>
