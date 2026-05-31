<h2>User Dashboard</h2>
<!-- showing user name -->
<p>Welcome <?= $this->session->userdata('user_name'); ?></p>

<a href="<?= base_url('admin/logout') ?>">Logout</a>
