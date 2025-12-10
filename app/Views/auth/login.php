<?= $this->include('layouts/header'); ?>

<div class="row justify-content-center">
  <div class="col-md-4">
    <h3 class="mb-3">Login</h3>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger">
        <?= session()->getFlashdata('error'); ?>
      </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('login'); ?>">
      <div class="mb-3">
        <label for="user_name" class="form-label">Username</label>
        <input type="text" name="user_name" id="user_name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" id="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
  </div>
</div>

<?= $this->include('layouts/footer'); ?>
