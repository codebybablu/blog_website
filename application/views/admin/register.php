<h2>Register</h2>

<form method="post" action="<?= base_url('admin/register/submit') ?>">

    <input type="text" name="name" placeholder="Name" required><br><br>

    <input type="email" name="email" placeholder="Email" required><br><br>

    <input type="password" name="password" placeholder="Password" required><br><br>

    <button type="submit">Register</button>

</form>

<a href="<?= base_url('admin/login') ?>">Login</a>