<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" data-background-color="purple">
                        <h4 class="title">Edit Profile</h4>
                    </div>
                    <div class="card-content">
                        <?php echo form_open_multipart('admin/update_profile'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nama</label>
                                    <input type="text" class="form-control" name="nama" value="<?php echo isset($admin->nama) ? $admin->nama : ''; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="foto">Profile Picture:</label>
                                    <div class="form-image">
                                        <input type="file" id="foto" name="foto" class="form-control">
                                        <?php if (isset($admin->gambar)) : ?>
                                            <img src="<?= base_url('assets/gambar/' . $admin->gambar) ?>" alt="Current Image" width="200">
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                        <div class="clearfix"></div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>