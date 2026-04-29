<h2>Edit Blog</h2>

<form method="post" action="<?= base_url('admin/blog/update/'.$blog->id) ?>" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $blog->id ?>">
    <!-- TITLE -->
    <input type="text" name="title" value="<?= $blog->title ?>" placeholder="Title">
    <br><br>

    <!-- CONTENT -->
    <textarea name="content" placeholder="Content"><?= $blog->content ?></textarea>
    <br><br>

    <!-- CATEGORY -->
    <select name="category_id">
        <?php foreach($categories as $cat): ?>
            <option value="<?= $cat->id ?>" <?= ($cat->id == $blog->category_id) ? 'selected' : '' ?>>
                <?= $cat->name ?>
            </option>
        <?php endforeach; ?>
    </select>
    <br><br>

    <!-- OLD IMAGE -->
    <p>Current Image:</p>
    <img src="<?= base_url('uploads/'.$blog->image) ?>" width="100">
    <br><br>

    <!-- NEW IMAGE -->
    <input type="file" name="image">
    <br><br>

    <select name="status" class="form-control">
        <option value="draft" <?= ($blog->status == 'draft') ? 'selected' : '' ?>>Draft</option>
        <option value="published" <?= ($blog->status == 'published') ? 'selected' : '' ?>>Published</option>
    </select>

    <button type="submit">Update</button>

</form>