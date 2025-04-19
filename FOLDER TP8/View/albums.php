<h3>Album List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Album Name</th>
        <th>Artist</th>
        <th>Price</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($album->getAllAlbums($_GET['search'] ?? '') as $a): ?>
    <tr>
        <td><?= $a['id'] ?></td>
        <td><?= $a['title'] ?></td>
        <td><?= $a['artist_name'] ?></td>
        <td><?= $a['price'] ?></td>
        <td>
            <a href="?page=albums&edit=<?= $a['id'] ?>">Edit</a> |
            <a href="?page=albums&delete=<?= $a['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>



<h3>Add Album</h3>
<form method="POST">
    <input type="text" name="title" placeholder="Title" required>

    <select name="artist_id" required>
        <?php foreach ($artist->getAllArtists() as $a): ?>
            <option value="<?= $a['id'] ?>"><?= $a['name'] ?></option>
        <?php endforeach; ?>
    </select>
    
    <input type="number" name="price" placeholder="Price" required>
    <button type="submit" name="add_album">Add Album</button>
</form>

<?php if (isset($_GET['edit'])): ?>
    <?php 
    $albumToEdit = $album->getAllAlbums()[array_search($_GET['edit'], array_column($album->getAllAlbums(), 'id'))];
    ?>
    <h3>Edit Album</h3>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $albumToEdit['id'] ?>">
        <input type="text" name="title" value="<?= $albumToEdit['title'] ?>" required>
        
        <select name="artist_id" required>
            <?php foreach ($artist->getAllArtists() as $a): ?>
                <option value="<?= $a['id'] ?>" <?= $albumToEdit['id'] == $a['id'] ? 'selected' : '' ?>><?= $a['name'] ?></option>
            <?php endforeach; ?>
        </select>
        
        <input type="number" name="price" value="<?= $albumToEdit['price'] ?>" required>
        <button type="submit" name="edit_album">Update Album</button>
    </form>
<?php endif; ?>
