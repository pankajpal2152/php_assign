<?= $this->include('layouts/header'); ?>

<h3 class="mb-3">Edit Employee</h3>

<form action="<?= site_url('employees/update/' . $employee['id']); ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control"
           value="<?= esc($employee['name']); ?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Address</label>
    <textarea name="address" class="form-control" required><?= esc($employee['address']); ?></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Designation</label>
    <input type="text" name="designation" class="form-control"
           value="<?= esc($employee['designation']); ?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Salary</label>
    <input type="number" step="0.01" name="salary" class="form-control"
           value="<?= esc($employee['salary']); ?>" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Picture</label><br>
    <?php if ($employee['picture']): ?>
      <img src="<?= base_url('uploads/' . $employee['picture']); ?>"
           alt="Picture" width="80" height="80"><br><br>
    <?php endif; ?>
    <input type="file" name="picture" class="form-control">
    <small class="text-muted">Leave blank to keep existing picture.</small>
  </div>

  <button type="submit" class="btn btn-primary">Update</button>
  <a href="<?= site_url('employees'); ?>" class="btn btn-secondary">Back</a>
</form>

<?= $this->include('layouts/footer'); ?>
