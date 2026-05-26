<?php $this->load->view('frontend/layout/header'); ?>

// internal style
<style>
    body {
        background: #f8f9fa;
    }

    /* BLOG CARD */
    .blog-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        transition: 0.3s;
    }

    .blog-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    /* IMAGE */
    .blog-img {
        height: 200px;
        object-fit: cover;
    }

    /* TITLE */
    .blog-title {
        font-size: 18px;
        font-weight: 600;
    }

    /* CATEGORY */
    .blog-category {
        font-size: 12px;
        color: #0d6efd;
        font-weight: 500;
    }

    /* BUTTON */
    .btn-read {
        border-radius: 20px;
        padding: 5px 15px;
    }

    /* SIDEBAR */
    .sidebar-card {
        border-radius: 10px;
    }

    /* CATEGORY LINK */
    .category-link {
        text-decoration: none;
        color: #333;
    }

    .category-link:hover {
        color: #0d6efd;
        padding-left: 5px;
        transition: 0.2s;
    }
</style>

<div class="container mt-4">

    <div class="row">

        <!-- 🔹 LEFT: Side BLOGS -->
        <div class="col-md-8">

            <h2 class="mb-4 fw-bold">Latest Articles</h2>

            <div class="row">

                <?php if (!empty($blogs)): ?>
                    <?php foreach ($blogs as $blog): ?>

                        <div class="col-md-6 mb-4">
                            <div class="card blog-card h-100">

                                <!-- IMAGE -->
                                <?php if (!empty($blog->image)): ?>
                                    <img src="<?= base_url('uploads/' . $blog->image) ?>"
                                        class="blog-img w-100">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/400x200"
                                        class="blog-img w-100">
                                <?php endif; ?>

                                <div class="card-body">

                                    <!-- CATEGORY -->
                                    <div class="blog-category mb-1">
                                        <?= $blog->category_name ?>
                                    </div>

                                    <!-- TITLE -->
                                    <div class="blog-title mb-2">
                                        <?= $blog->title ?>
                                    </div>

                                    <!-- CONTENT -->
                                    <p class="text-muted">
                                        <?= substr(strip_tags($blog->content), 0, 90) ?>...
                                    </p>

                                    <!-- BUTTON -->
                                    <a href="<?= base_url('blog/' . $blog->slug) ?>"
                                        class="btn btn-outline-primary btn-sm btn-read">
                                        Read More →
                                    </a>

                                </div>

                            </div>
                        </div>

                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No blogs found</p>
                <?php endif; ?>

            </div>

            <!-- 🔥 PAGINATION -->
            <?php if (!empty($links)): ?>
                <div class="mt-4 text-center">
                    <?= $links ?>
                </div>
            <?php endif; ?>

        </div>

        <!-- 🔹 RIGHT: SIDEBAR -->
        <div class="col-md-4">

            <!-- CATEGORY -->
            <div class="card sidebar-card mb-4 shadow-sm">
                <div class="card-header fw-bold">
                    Categories
                </div>

                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <a class="category-link" href="<?= base_url() ?>">All</a>
                    </li>

                    <?php foreach ($categories as $cat): ?>
                        <li class="list-group-item">
                            <a class="category-link"
                                href="<?= base_url('?category=' . $cat->id) ?>">
                                <?= $cat->name ?>
                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>

            <!-- SEARCH -->
            <div class="card sidebar-card shadow-sm">
                <div class="card-header fw-bold">
                    Search
                </div>

                <div class="card-body">
                    <form method="get">

                        <input type="text"
                            name="search"
                            value="<?= $this->input->get('search') ?>"
                            class="form-control mb-2"
                            placeholder="Search blog...">

                        <!-- keep category -->
                        <input type="hidden"
                            name="category"
                            value="<?= $this->input->get('category') ?>">

                        <button class="btn btn-primary w-100">
                            Search
                        </button>

                    </form>

                </div>
            </div>

            <!-- 🔹 RECENT POSTS -->
            <div class="card sidebar-card mt-4 shadow-sm">
                <div class="card-header fw-bold">
                    Recent Posts
                </div>

                <div class="card-body p-2">

                    <?php foreach ($recent_posts as $post): ?>

                        <div class="d-flex mb-3">

                            <!-- IMAGE -->
                            <img src="<?= base_url('uploads/' . $post->image) ?>"
                                style="width:70px;height:60px;object-fit:cover;border-radius:6px;">

                            <!-- CONTENT -->
                            <div class="ms-2">

                                <a href="<?= base_url('blog/' . $post->slug) ?>"
                                    style="text-decoration:none; font-size:13px; font-weight:500; color:#333;">
                                    <?= substr($post->title, 0, 50) ?>
                                </a>

                                <div style="font-size:11px; color:#888;">
                                    <?= date('d M Y', strtotime($post->created_at)) ?>
                                </div>

                            </div>

                        </div>

                    <?php endforeach; ?>

                </div>

                
            </div>
        </div>
    </div>

</div>

<?php $this->load->view('frontend/layout/footer'); ?>