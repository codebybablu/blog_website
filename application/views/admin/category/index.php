<?php $this->load->view('admin/layout/header'); ?>

<h2>Category List</h2>

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
            <a href="<?= base_url('admin/category/delete/'.$cat->id) ?>">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?php $this->load->view('admin/layout/footer'); ?>