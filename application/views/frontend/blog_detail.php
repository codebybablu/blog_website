<?php $this->load->view('frontend/layout/header'); ?>

<h2><?= $blog->title ?></h2>

<p>
    Category: <?= $blog->category_name ?> |
    <?= date('d M Y', strtotime($blog->created_at)) ?>
</p>

<img src="<?= base_url('uploads/'.$blog->image) ?>" class="img-fluid mb-3">

<p><?= $blog->content ?></p>

<a href="<?= base_url() ?>" class="btn btn-secondary">Back</a>

<?php $this->load->view('frontend/layout/footer'); ?>