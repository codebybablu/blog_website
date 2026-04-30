<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .sidebar {
            width: 250px;
            transition: all 0.3s;
        }

        .sidebar.collapsed {
            margin-left: -250px;
        }
    </style>
</head>
<body>

<!-- 🔹 TOP BAR -->
<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">

        <!-- Toggle Button -->
        <button class="btn btn-light btn-sm" id="toggleSidebar">
            ☰
        </button>

        <span class="text-white">Admin Panel</span>

    </div>
</nav>