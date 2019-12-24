<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if(isset($_SESSION['AWSession'])) : ?>

<div align="center">
<a href="<?php echo URLROOT; ?>/users/login" class="btn btn-light"><i class="fa fa-backward"></i>Back</a>
    <h2>Giriş Yaptınız</h2>
    <form method="POST">
        <div class="form-group" >
            <label for="title">Details: <sup>*</sup></label>
            <?php
                echo "<pre>";
                    $this->userModel->GetCustomerDetails($data);
                echo "</pre>";
            ?> 
        </div>
    </form>
</div>

<?php endif; ?>

<?php require APPROOT . '/views/inc/footer.php'; ?>


