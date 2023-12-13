<?= $this->extend('layout/html_snippet.php') ?>
<?= $this->section('content') ?>

<div class="container mt-3">
    <h3>Sign-In</h3>
    <form action="<?= base_url('signin') ?>" method="post">
        <?= csrf_field(); ?> 
        <?php
            if (!empty(session()->getFlashdata('fail'))): ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>
                        <?= session()->getFlashdata('fail'); ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>

        <div class="col-md-6 mt-3">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" placeholder="xyz@email.com" class="form-control" id="inputEmail43" value="<?= set_value('email') ?>" >
            <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'email') : ""; ?>
            </span>
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Enter Your Password"
                id="inputPassword43">
            <span class="text-danger">
                <?= isset($validation) ? display_error($validation, 'password') : ""; ?>
            </span>
        </div>
        <div class="col-12 mt-3">
            <button type="submit" name="submit" class="btn btn-info">Sign in</button>
        </div>
    </form>
    <div class="text mt-2">
    Have no account, <a href="<?= base_url('home/register') ?>">Create New</a>
    </div>
</div>


<?= $this->endsection() ?>