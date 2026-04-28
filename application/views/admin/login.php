<?php if($this->session->flashdata('success')): ?>
    <p style="color:green;">
        <?= $this->session->flashdata('success'); ?>
    </p>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
    <p style="color:red;">
        <?= $this->session->flashdata('error'); ?>
    </p>
<?php endif; ?>

<form method="post" action="<?= base_url('admin/loginSubmit') ?>">
    <input type="email" name="email" placeholder="Email"><br><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit">Login</button>
</form>

<a href="<?= base_url('admin/register') ?>">Register</a>
