<!DOCTYPE html>
<html>
<head>
    <title><?= $blog->title ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">

    <a href="<?= base_url() ?>" class="btn btn-secondary mb-3">← Back</a>

    <h2><?= $blog->title ?></h2>

    <p class="text-muted">
        Category: <?= $blog->category_name ?> |
        <?= date('d M Y', strtotime($blog->created_at)) ?>
    </p>

    <img src="<?= base_url('uploads/'.$blog->image) ?>"
         class="img-fluid mb-3"
         style="max-height:400px; object-fit:cover;">

    <div>
        <?= $blog->content ?>
    </div>

    <h4>Leave a Comment</h4>
    
    <form method="post" action="<?= base_url('add-comment') ?>">
        <input type="hidden" name="post_id" value="<?= $blog->id ?>">
        <input type="hidden" name="parent_id" value="0">
    
        <input type="text" name="name" class="form-control mb-2" placeholder="Name" required>
        <textarea name="comment" class="form-control mb-2" placeholder="Comment" required></textarea>
    
        <button class="btn btn-primary btn-sm">Submit</button>
    </form>
    
</div>


</body>
</html>