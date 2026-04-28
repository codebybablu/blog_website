<h2>User Dashboard</h2>

<p>Welcome <?= $this->session->userdata('user_name'); ?></p>

<a href="<?= base_url('admin/logout') ?>">Logout</a>