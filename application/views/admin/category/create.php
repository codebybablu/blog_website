<?php $this->load->view('admin/layout/header'); ?>

<h2>Add Category</h2>

<form method="post" action="<?= base_url('admin/category/store') ?>">
    <input type="text" name="name" placeholder="Category Name" required>
    <button type="submit">Save</button>
</form>

<a href="<?= base_url('admin/category') ?>">Back</a>

<?php $this->load->view('admin/layout/footer'); ?>