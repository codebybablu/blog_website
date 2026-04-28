<h2>Categories</h2>

<a href="<?= base_url('admin/category/create') ?>">Add Category</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Action</th>
</tr>

<?php foreach($categories as $cat): ?>
<tr>
    <td><?= $cat->id ?></td>
    <td><?= $cat->name ?></td>
    <td>
        <a href="<?= base_url('admin/category/edit/'.$cat->id) ?>">Edit</a> |
        <a href="<?= base_url('admin/category/delete/'.$cat->id) ?>" onclick="return confirm('Delete?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>

</table>