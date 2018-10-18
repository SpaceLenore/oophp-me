<div class="content-wrap">
    <div class="dblinks">
        <ul>
            <li><a href="movie">Visa alla filmer</a></li>
            <li><a href="movie-search">Sök bland filmer</a></li>
            <li><a href="movie-create">Skapa ny film</a></li>
            <li><a href="movie-admin">Reigera / ta bort filmer</a></li>
        </ul>
    </div>

    <h1 class="search-title">Lägg till en film</h1>

    <h3 class="error"><?= $error ?></h3>

    <form action="movie-create" method="post">
        <label for="title">Filmtitel:</label><br>
        <input type="text" name="title"><br><br>

        <label for="image">Bild URL:</label><br>
        <input type="text" name="image"><br><br>

        <label for="year">År:</label><br>
        <input type="number" name="year"><br><br>

        <input type="submit" name="add" value="Lägg till film!">
    </form>
</div>
