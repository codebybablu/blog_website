<?php $this->load->view('frontend/layout/header'); ?>

<div class="container mt-4">

    <div class="row">

        <!-- 🔹 LEFT: BLOGS -->
        <div class="col-md-8">

            <h2 class="mb-4">Latest Blogs</h2>

            <div class="row">

                <?php if(!empty($blogs)): ?>
                    <?php foreach($blogs as $blog): ?>

                        <div class="col-md-6 mb-4">
                            <div class="card h-100">

                                <!-- IMAGE -->
                                <?php if(!empty($blog->image)): ?>
                                    <img src="<?= base_url('uploads/'.$blog->image) ?>"
                                         class="card-img-top"
                                         style="height:200px; object-fit:cover;">
                                <?php else: ?>
                                    <img src="https://via.placeholder.com/400x200"
                                         class="card-img-top">
                                <?php endif; ?>

                                <div class="card-body">

                                    <h5><?= $blog->title ?></h5>

                                    <small class="text-muted">
                                        <?= $blog->category_name ?>
                                    </small>

                                    <p class="mt-2">
                                        <?= substr(strip_tags($blog->content), 0, 100) ?>...
                                    </p>

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

            <!-- 🔥 PAGINATION -->
            <!-- <div class="mt-4 text-center">
                <?= $links ?>
            </div> -->

            <?php if(!empty($links)): ?>
                <div class="mt-4 text-center">
                    <?= $links ?>
                </div>
            <?php endif; ?>

        </div>

        <!-- 🔹 RIGHT: SIDEBAR -->
        <div class="col-md-4">

            <!-- CATEGORY -->
            <div class="card mb-4">
                <div class="card-header">
                    Categories
                </div>

                <ul class="list-group list-group-flush">

                    <li class="list-group-item">
                        <a href="<?= base_url() ?>">All</a>
                    </li>

                    <?php foreach($categories as $cat): ?>
                        <li class="list-group-item">
                            <a href="<?= base_url('?category='.$cat->id) ?>">
                                <?= $cat->name ?>
                            </a>
                        </li>
                    <?php endforeach; ?>

                </ul>
            </div>

            <!-- SEARCH -->
            <div class="card">
                <div class="card-header">
                    Search
                </div>

                <div class="card-body">
                    <form method="get">

                        <input type="text"
                               name="search"
                               value="<?= $this->input->get('search') ?>"
                               class="form-control mb-2"
                               placeholder="Search...">

                        <!-- keep category if selected -->
                        <input type="hidden"
                               name="category"
                               value="<?= $this->input->get('category') ?>">

                        <button class="btn btn-primary w-100">
                            Search
                        </button>

                    </form>
                </div>
            </div>

        </div>

    </div>

</div>

<?php $this->load->view('frontend/layout/footer'); ?>