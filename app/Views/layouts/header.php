<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Employee Management System</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?= site_url('employees'); ?>">EMS</a>

            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('employees'); ?>">Employees</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('employees/create'); ?>">Add Employee</a>
                        </li>
                    <?php endif; ?>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <?php if (session()->get('isLoggedIn')): ?>
                        <li class="nav-item">
                            <span class="navbar-text text-white me-3">
                                Hello, <?= esc(session()->get('name')); ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('logout'); ?>">Logout</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">