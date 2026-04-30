
<?php $this->load->view('admin/layout/header'); ?>
<?php $this->load->view('admin/layout/sidebar'); ?>
<div class="container mt-4">

    <h3>Welcome, <?= $this->session->userdata('user_name'); ?> 👋</h3>

    <a href="<?= base_url('admin/logout') ?>" class="btn btn-danger btn-sm mb-3">Logout</a>

    <!-- 🔹 STATS -->
    <div class="row">
        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>Total Blogs</h5>
                <h2><?= $total_blogs ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>Published</h5>
                <h2><?= $published_blogs ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>Draft</h5>
                <h2><?= $draft_blogs ?></h2>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card p-3 text-center">
                <h5>Categories</h5>
                <h2><?= $total_categories ?></h2>
            </div>
        </div>
    </div>

    <!-- 🔹 QUICK ACTION -->
    <div class="mt-4">
        <a href="<?= base_url('admin/blog/create') ?>" class="btn btn-primary">Add Blog</a>
        <a href="<?= base_url('admin/category/create') ?>" class="btn btn-success">Add Category</a>
    </div>

</div>

<hr>

<h4 class="mt-4">Recent Blogs</h4>

<table class="table table-bordered mt-3">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>

        <?php if(!empty($recent_blogs)): ?>
            <?php foreach($recent_blogs as $key => $blog): ?>
                <tr>
                    <td><?= $key + 1 ?></td>
                    <td><?= $blog->title ?></td>
                    <td><?= $blog->category_name ?></td>

                    <td>
                        <?php if($blog->status == 'published'): ?>
                            <span class="badge bg-success">Published</span>
                        <?php else: ?>
                            <span class="badge bg-warning">Draft</span>
                        <?php endif; ?>
                    </td>

                    <td><?= date('d M Y', strtotime($blog->created_at)) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" class="text-center">No blogs found</td>
            </tr>
        <?php endif; ?>

    </tbody>
</table>

<?php $this->load->view('admin/layout/footer'); ?>