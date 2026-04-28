<?php $this->load->view('admin/layout/header'); ?>

<p>Hello, <?= $this->session->userdata('admin_name'); ?></p>

<a href="<?= base_url('admin/logout') ?>">Logout</a>


<?php $this->load->view('admin/layout/footer'); ?>