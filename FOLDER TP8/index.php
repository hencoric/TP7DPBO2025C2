<?php
require_once 'class/Album.php';
require_once 'class/Artist.php';
require_once 'class/Sale.php';

$album = new Album();
$artist = new Artist();
$sale = new Sale();

// Album Create, Update/Edit, Delete
if (isset($_POST['add_album'])) {
    $album->addAlbum($_POST['title'], $_POST['artist_id'], $_POST['price']);
}

if (isset($_POST['edit_album'])) {
    $album->editAlbum($_POST['id'], $_POST['title'], $_POST['artist_id'], $_POST['price']);
}

if (isset($_GET['delete'])) {
    $album->deleteAlbum($_GET['delete']);
}

// Artist Create, Update/Edit, Delete
if (isset($_POST['add_artist'])) {
    $artist->addArtist($_POST['name']);
}

if (isset($_POST['edit_artist'])) {
    $artist->editArtist($_POST['id'], $_POST['name']);
}

if (isset($_GET['delete'])) {
    $artist->deleteArtist($_GET['delete']);
}

// Sale Create, Update/Edit, Delete
if (isset($_POST['add_sale'])) {
    $sale->addSale($_POST['album_id'], $_POST['quantity']);
}

if (isset($_POST['edit_sale'])) {
    $sale->editSale($_POST['id'], $_POST['album_id'], $_POST['quantity']);
}

if (isset($_GET['delete'])) {
    $sale->deleteSale($_GET['delete']);
}

$search = $_GET['search'] ?? '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Store</title>
    <link rel="stylesheet" href="style.css">
</head>


<body>
    <?php include 'view/header.php'; ?>
    <main>
        <nav>
            <a href="?page=albums">Albums</a> |
            <a href="?page=artists">Artists</a> |
            <a href="?page=sales">Sales</a>
        </nav>

        <form method="GET" style="margin-bottom: 20px;">
            <input type="hidden" name="page" value="<?= $_GET['page'] ?? '' ?>">
            <input type="text" name="search" placeholder="Search..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'albums') include 'view/albums.php';
            elseif ($page == 'artists') include 'view/artists.php';
            elseif ($page == 'sales') include 'view/sales.php';
        }
        ?>
    </main>
    <?php include 'view/footer.php'; ?>
</body>



</html>
