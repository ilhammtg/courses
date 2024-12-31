<div class="container mt-4">
    <h1 class="mb-4">Edit User</h1>

    <form action="" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= $user['name']; ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= $user['email']; ?>">
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control" value="<?= $user['phone']; ?>">
        </div>
        <div class="mb-3">
            <label for="is_active" class="form-label">Active</label>
            <input type="checkbox" name="is_active" id="is_active" <?= $user['is_active'] ? 'checked' : ''; ?>>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
        <a href="<?= base_url('admin/users'); ?>" class="btn btn-secondary">Cancel</a>
    </form>
</div>