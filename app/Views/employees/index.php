<?= $this->include('layouts/header'); ?>

<h3 class="mb-3">Employee List</h3>

<a href="<?= site_url('employees/create'); ?>" class="btn btn-success mb-3">
    Add New Employee
</a>

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Picture</th>
            <th>Name</th>
            <th>Address</th>
            <th>Designation</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($employees)): ?>
            <?php foreach ($employees as $emp): ?>
                <tr>
                    <td><?= $emp['id']; ?></td>
                    <td>
                        <?php if ($emp['picture']): ?>
                            <img src="<?= base_url('uploads/' . $emp['picture']); ?>"
                                alt="Picture" width="60" height="60">
                        <?php else: ?>
                            N/A
                        <?php endif; ?>
                    </td>
                    <td><?= esc($emp['name']); ?></td>
                    <td><?= esc($emp['address']); ?></td>
                    <td><?= esc($emp['designation']); ?></td>
                    <td><?= esc($emp['salary']); ?></td>
                    <td>
                        <a href="<?= site_url('employees/edit/' . $emp['id']); ?>"
                            class="btn btn-sm btn-primary">Edit</a>
                        <a href="<?= site_url('employees/delete/' . $emp['id']); ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Are you sure?');">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">No employees found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<?= $this->include('layouts/footer'); ?>