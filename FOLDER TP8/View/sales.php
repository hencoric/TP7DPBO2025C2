<h3>Sales List</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Album</th>
        <th>Quantity</th>
        <th>Sale Date</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($sale->getAllSales() as $s): ?>
    <tr>
        <td><?= $s['id'] ?></td>
        <td><?= $s['title'] ?></td>
        <td><?= $s['quantity'] ?></td>
        <td><?= $s['sale_date'] ?></td>
        <td>
            <a href="?page=sales&edit=<?= $s['id'] ?>">Edit</a> |
            <a href="?page=sales&delete=<?= $s['id'] ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<h3>Add Sale</h3>
<form method="POST">
    <select name="album_id" required>
        <?php foreach ($album->getAllAlbums() as $a): ?>
            <option value="<?= $a['id'] ?>"><?= $a['title'] ?></option>
        <?php endforeach; ?>
    </select>
    <input type="number" name="quantity" placeholder="Quantity" required>
    <button type="submit" name="add_sale">Add Sale</button>
</form>

<?php if (isset($_GET['edit'])): ?>
    <?php 
    $saleToEdit = $sale->getAllSales()[array_search($_GET['edit'], array_column($sale->getAllSales(), 'id'))];
    ?>
    <h3>Edit Sale</h3>
    <form method="POST">
        <input type="hidden" name="id" value="<?= $saleToEdit['id'] ?>">
        <select name="album_id" required>
            <?php foreach ($album->getAllAlbums() as $a): ?>
                <option value="<?= $a['id'] ?>" <?= $saleToEdit['album_id'] == $a['id'] ? 'selected' : '' ?>><?= $a['title'] ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="quantity" value="<?= $saleToEdit['quantity'] ?>" required>
        <button type="submit" name="edit_sale">Update Sale</button>
    </form>

<?php endif; ?>
