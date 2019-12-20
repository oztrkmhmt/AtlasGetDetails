<?php require APPROOT . '/views/inc/header.php'; ?>

<div align="center">
<a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light"><i class="fa fa-backward"></i>Back</a>
    <h2>Giriş Yaptınız</h2>
    <form method="">
        <div class="form-group" >
            <label for="title">HashCode: <sup>*</sup></label>
            <textarea name="main" class="form-control form-control-sm"></textarea>
        </div>
    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>


