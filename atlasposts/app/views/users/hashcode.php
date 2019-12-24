<?php require APPROOT . '/views/inc/header.php'; ?>

<div align="center">
<a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light"><i class="fa fa-backward"></i>Back</a>
    <h2>Giriş Yaptınız</h2>
    <form method="POST">
        <div class="form-group" >
            <label for="title">Details: <sup>*</sup></label>
            <?php
                echo "<pre>";
                    var_dump($_SESSION['customerDetails']);
                echo "</pre>";
            ?> 
        </div>
    </form>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>


