<a href="<?= base_url('admin/blog/create') ?>">Add Blog</a>

<table border="1">
<tr>
    <th>ID</th>
    <th>Title</th>
    <th>Category</th>
    <th>Image</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php foreach($blogs as $b): ?>
<tr>
    <td><?= $b->id ?></td>
    <td><?= $b->title ?></td>
    <td><?= $b->category_name ?></td>
    <td>
      <img src="<?= base_url('uploads/'.$b->image) ?>" width="50">
    </td>
    <td><?= $b->status ?></td>
    <td>
        <a href="<?= base_url('admin/blog/edit/'.$b->id) ?>">Edit</a>
        <a href="<?= base_url('admin/blog/delete/'.$b->id) ?>">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>