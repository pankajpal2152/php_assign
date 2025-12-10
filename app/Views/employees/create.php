<?= $this->include('layouts/header'); ?>

<h3 class="mb-3">Add New Employee</h3>

<form action="<?= site_url('employees/store'); ?>" method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label class="form-label">Name</label>
    <input type="text" name="name" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Address</label>
    <textarea name="address" class="form-control" required></textarea>
  </div>

  <div class="mb-3">
    <label class="form-label">Designation</label>
    <input type="text" name="designation" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Salary</label>
    <input type="number" step="0.01" name="salary" class="form-control" required>
  </div>

  <div class="mb-3">
    <label class="form-label">Picture</label>
    <input type="file" name="picture" class="form-control">
  </div>

  <button type="submit" class="btn btn-primary">Save</button>
  <a href="<?= site_url('employees'); ?>" class="btn btn-secondary">Back</a>
</form>

<?= $this->include('layouts/footer'); ?>
