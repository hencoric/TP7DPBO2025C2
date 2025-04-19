<h3>Artist List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($artist->getAllArtists($_GET['search'] ?? '') as $a): ?>
    <tr>
        <td><?= $a['id'] ?></td>
        <td><?= $a['name'] ?></td>
        <td>
            <a href="?page=artists&edit=<?= $a['id'] ?>">Edit</a> |
            <a href="?page=artists&delete=<?= $a['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>


<h3>Add Artist</h3>
<form method="POST">
    <input type="text" name="name" placeholder="Artist Name" required>
    <button type="submit" name="add_artist">Add Artist</button>
</form>

<?php if (isset($_GET['edit'])): ?>
    <?php 
    $artistToEdit = $artist->getAllArtists()[array_search($_GET['edit'], array_column($artist->getAllArtists(), 'id'))];
    ?>
    <h3>Edit Artist</h3>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $artistToEdit['id'] ?>">
        <input type="text" name="name" value="<?= $artistToEdit['name'] ?>" required>
        <button type="submit" name="edit_artist">Update Artist</button>
    </form>
<?php endif; ?>
