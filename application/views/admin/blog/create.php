<?php $this->load->view('admin/layout/header'); ?>

<form method="post" action="<?= base_url('admin/blog/store') ?>" enctype="multipart/form-data">

<input type="text" name="title" placeholder="Title"><br><br>

<textarea name="content" placeholder="Content"></textarea><br><br>

<select name="category_id">
<?php foreach($categories as $cat): ?>
<option value="<?= $cat->id ?>"><?= $cat->name ?></option>
<?php endforeach; ?>
</select><br><br>

<input type="file" name="image"><br><br>

<label>Status</label>
<select name="status" class="form-control">
    <option value="draft">Draft</option>
    <option value="published">Published</option>
</select>

<button type="submit">Save</button>

</form>

<?php $this->load->view('admin/layout/footer'); ?>
