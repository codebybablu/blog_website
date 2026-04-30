<?php $this->load->view('frontend/layout/header'); ?>

<h2>Latest Blogs</h2>

<div class="row">
<?php foreach($blogs as $blog): ?>
    <div class="col-md-4 mb-4">
        <div class="card">

            <img src="<?= base_url('uploads/'.$blog->image) ?>" class="card-img-top" style="height:200px;object-fit:cover;">

            <div class="card-body">
                <h5><?= $blog->title ?></h5>

                <small><?= $blog->category_name ?></small>

                <p>
                    <?= substr(strip_tags($blog->content), 0, 100) ?>...
                </p>

                <a href="<?= base_url('blog/'.$blog->slug) ?>" class="btn btn-primary btn-sm">
                    Read More
                </a>
            </div>

        </div>
    </div>
<?php endforeach; ?>
</div>

<?php $this->load->view('frontend/layout/footer'); ?>