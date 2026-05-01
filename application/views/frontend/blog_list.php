<?php $this->load->view('frontend/layout/header'); ?>

<div class="container mt-4">

<h2 class="mb-4">Latest Blogs</h2>

<div class="row">

<?php if(!empty($blogs)): ?>
    <?php foreach($blogs as $blog): ?>

        <div class="col-md-4 mb-4">
            <div class="card h-100">

                <!-- 🔹 IMAGE -->
                <?php if(!empty($blog->image)): ?>
                    <img src="<?= base_url('uploads/'.$blog->image) ?>"
                         class="card-img-top"
                         style="height:200px;object-fit:cover;">
                <?php else: ?>
                    <img src="https://via.placeholder.com/400x200"
                         class="card-img-top">
                <?php endif; ?>

                <div class="card-body">

                    <!-- 🔹 TITLE -->
                    <h5><?= $blog->title ?></h5>

                    <!-- 🔹 CATEGORY -->
                    <small class="text-muted">
                        <?= $blog->category_name ?>
                    </small>

                    <!-- 🔹 CONTENT -->
                    <p class="mt-2">
                        <?= substr(strip_tags($blog->content), 0, 100) ?>...
                    </p>

                    <!-- 🔹 BUTTON -->
                    <a href="<?= base_url('blog/'.$blog->slug) ?>"
                       class="btn btn-primary btn-sm">
                        Read More
                    </a>

                </div>

            </div>
        </div>

    <?php endforeach; ?>
<?php else: ?>
    <p>No blogs found</p>
<?php endif; ?>

</div>

</div>

<?php $this->load->view('frontend/layout/footer'); ?>