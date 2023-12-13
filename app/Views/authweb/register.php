<?= $this->extend('layout/html_snippet.php'); ?>
<?= $this->section('content') ?>

<div class="container">
    <h4>Sign-Up</h4>
    <section class="mt-3">
        <form class="row g-3" action="<?= base_url('signup') ?>" method="post">
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

            <?php
            if (!empty(session()->getFlashdata('success'))): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <strong>
                        <?= session()->getFlashdata('success'); ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>


            <div class="col-md-6">
                <label for="fname" class="form-label">First Name</label>
                <input type="fname" name="fname" class="form-control" placeholder="Enter your First name"
                    id="inputEmail44">
                <span class="text-danger">
                    <?= isset($validation) ? display_error($validation, 'fname') : ""; ?>
                </span>
            </div>
            <div class="col-md-6">
                <label for="lname" class="form-label">Last Name</label>
                <input type="lname" name="lname" class="form-control" placeholder="Enter your Last name"
                    id="inputPassword4">
                <span class="text-danger">
                    <?= isset($validation) ? display_error($validation, 'lname') : ""; ?>
                </span>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" placeholder="xyz@email.com" class="form-control" id="inputEmail43">
                <span class="text-danger">
                    <?= isset($validation) ? display_error($validation, 'email') : ""; ?>
                </span>
            </div>
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Country</label>
                <input type="country" name="country" placeholder="Enter your Country name" class="form-control"
                    id="inputEmail42">
                <span class="text-danger">
                    <?= isset($validation) ? display_error($validation, 'country') : ""; ?>
                </span>
            </div>
            <div class="col-md-6">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
                <span class="text-danger">
                    <?= isset($validation) ? display_error($validation, 'address') : ""; ?>
                </span>

            </div>
            <div class="col-md-6">
                <label for="phone" class="form-label">Contact No.</label>
                <input type="text" class="form-control" name="phone" id="Contact"
                    placeholder="Enter Your Contact number">
                <span class="text-danger">
                    <?= isset($validation) ? display_error($validation, 'phone') : ""; ?>
                </span>
            </div>

            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" name="city" class="form-control" placeholder="Enter your city" id="inputCity">
                <span class="text-danger">
                    <?= isset($validation) ? display_error($validation, 'city') : ""; ?>
                </span>
            </div>
            <div class="col-md-4">
                <label for="inputState" class="form-label">State</label>
                <input type="text" name="state" class="form-control" placeholder="Enter your state" id="state">
                <span class="text-danger">
                    <?= isset($validation) ? display_error($validation, 'state') : ""; ?>
                </span>
            </div>
            <div class="col-md-2">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" name="zip" class="form-control" placeholder="Enter your Zip code" id="inputZip">
                <span class="text-danger">
                    <?= isset($validation) ? display_error($validation, 'zip') : ""; ?>
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
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Confirm Password</label>
                <input type="password" name="cpassword" class="form-control" placeholder="Re-Enter your Password"
                    id="inputPassword4">
                <span class="text-danger">
                    <?= isset($validation) ? display_error($validation, 'cpassword') : ""; ?>
                </span>
            </div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
            </div>
        </form>
        <div class="col-12 mt-2">
                <!-- <button type="submit" name="submit" class="btn btn-primary">Sign in</button> -->
                I already have acount <a href="<?= base_url('home/login') ?>">Login to your Account</a>
        </div>

    </section>
</div>

<?= $this->endsection() ?>