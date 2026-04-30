<?php
$current = $this->uri->segment(2); // blog / category / dashboard
?>

<div class="d-flex">

    <!-- 🔹 SIDEBAR -->
    <div id="sidebar" class="sidebar bg-dark text-white" style="min-height:100vh;">

        <h4 class="p-3">Admin Panel</h4>

        <ul class="nav flex-column px-2">

            <li class="nav-item">
                <a href="<?= base_url('admin/dashboard') ?>"
                   class="nav-link text-white <?= ($current == 'dashboard') ? 'bg-primary' : '' ?>">
                    🏠 Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('admin/blog') ?>"
                   class="nav-link text-white <?= ($current == 'blog') ? 'bg-primary' : '' ?>">
                    📝 Blogs
                </a>
            </li>

            <li class="nav-item">
                <a href="<?= base_url('admin/category') ?>"
                   class="nav-link text-white <?= ($current == 'category') ? 'bg-primary' : '' ?>">
                    📂 Categories
                </a>
            </li>

            <li class="nav-item mt-3">
                <a href="<?= base_url('admin/logout') ?>" class="nav-link text-danger">
                    🚪 Logout
                </a>
            </li>

        </ul>
    </div>

    <div style="flex:1; padding:20px;">