<?php $this->load->view('admin/layout/header'); ?>

<h2>Edit Category</h2>

<form method="post" action="<?= base_url('admin/category/update/'.$category->id) ?>">
    <input type="text" name="name" value="<?= $category->name ?>">
    <button type="submit">Update</button>
</form>

<a href="<?= base_url('admin/category') ?>">Back</a>

<?php $this->load->view('admin/layout/footer'); ?>


