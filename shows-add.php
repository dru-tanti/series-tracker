<?php
    include 'libraries/form.php';
    include 'libraries/database.php';
    include 'libraries/login-check.php';

    include 'template/header.php';

    $channels = get_all_channels();

	// we can use a function to make this part easy.
    $formdata = get_formdata();
?>

<header class="page-header row no-gutters py-4 border-bottom">
    <div class="col-12">
        <h6 class="text-center text-md-left">Shows</h6>
        <h3 class="text-center text-md-left">New Show</h3>
    </div>
</header>

<form class="row content" action="shows-add-process.php" method="post">
    <div class="col-12 col-lg-9">
        <div class="card">
            <div class="card-body">
<?php if (has_error($formdata, 'show-name')): ?>
                <div class="alert-danger mb-3 p-3">
                    <?php echo get_error($formdata, 'show-name'); ?>
                </div>
<?php endif; ?>
                <input type="text" name="show-name" class="form-control mb-3" placeholder="New Show"
                    value="<?php echo get_value($formdata, 'show-name'); ?>">

<?php if (has_error($formdata, 'show-desc')): ?>
                <div class="alert-danger mb-3 p-3">
                    <?php echo get_error($formdata, 'show-desc'); ?>
                </div>
<?php endif; ?>
                <textarea name="show-desc" rows="8" cols="80" placeholder="What is this show about?" class="form-control mb-3"><?php echo get_value($formdata, 'show-desc'); ?></textarea>

<?php if (has_error($formdata, 'show-channel')): ?>
            <div class="alert-danger mb-3 p-3">
                <?php echo get_error($formdata, 'show-channel'); ?>
            </div>
<?php endif; ?>
            <div class="form-group row">
                <label for="input-show-channel" class="col-sm-3 col-form-label">Channel:</label>
                <div class="col-sm-9">
                    <select class="custom-select mb-3" name="show-channel" id="input-show-channel">
                        <option disabled selected>Choose an Channel</option>
<?php while ($channel = mysqli_fetch_assoc($channels)): ?>
                        <option value="<?php echo $channel['id']; ?>"><?php echo $channel['name']; ?></option>

<?php endwhile; ?>
                    </select>
                </div>
            </div>

<?php if (has_error($formdata, 'show-airtime')): ?>
            <div class="alert-danger mb-3 p-3">
                <?php echo get_error($formdata, 'show-airtime'); ?>
            </div>
<?php endif; ?>
                <div class="form-group row">
                    <label for="input-show-airtime" class="col-sm-3 col-form-label">Airtime:</label>
                    <div class="col-sm-9">
                        <input type="text" name="show-airtime" class="form-control mb-3" placeholder="00:00"
                            id="input-show-airtime" value="<?php echo get_value($formdata, 'show-airtime'); ?>">
                    </div>
                </div>

<?php if (has_error($formdata, 'show-duration')): ?>
                <div class="alert-danger mb-3 p-3">
                    <?php echo get_error($formdata, 'show-duration'); ?>
                </div>
<?php endif; ?>
                <div class="form-group row">
                    <label for="input-show-duration" class="col-sm-3 col-form-label">Duration (mins):</label>
                    <div class="col-sm-9">
                        <input type="number" name="show-duration" class="form-control mb-3" placeholder="0"
                            id="input-show-duration" value="<?php echo get_value($formdata, 'show-duration'); ?>">
                    </div>
                </div>

<?php if (has_error($formdata, 'show-rating')): ?>
                <div class="alert-danger mb-3 p-3">
                    <?php echo get_error($formdata, 'show-rating'); ?>
                </div>
<?php endif; ?>
                <div class="form-group row">
                    <label for="input-show-rating" class="col-sm-3 col-form-label">Rating:</label>
                    <div class="col-sm-9">
                        <input type="number" name="show-rating" class="form-control mb-3" placeholder="0"
                            step="0.1" id="input-show-rating" value="<?php echo get_value($formdata, 'show-rating'); ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-lg-3 mt-3 mt-lg-0">
        <div class="card">
            <div class="card-body">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</form>

<?php include 'template/footer.php'; ?>
