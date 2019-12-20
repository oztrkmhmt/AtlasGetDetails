<?php require APPROOT . '/views/inc/header.php'; ?>

<style>
@media(min-width:992px){
  .btnAlign{
    margin-left: 28% !important;
  }
}
</style>
  <div class="row">
    <div class="col-md-3 mx-auto">
      <div class="card card-body bg-light mt-5">
        <?php flash('register_success') ?>
        <h2 align="center">Oturum Aç</h2>
          <form action="<?php echo URLROOT; ?>/users/login" method="POST">
            <div class="form-group row">
              <div class="col-sm-12">
                <input type="text" name="username" placeholder="Kullanıcı Adı" class="form-control form-control-sm" value="">
              </div>
            </div>
            <div class="form-group row">
              <div class="col-sm-12">
                <input type="password" name="password" placeholder="Şifre" class="form-control form-control-sm " value="">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-5 btnAlign">
                <input type="submit" value="Giriş" class="btn btn-success btn-block">
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-md">
                <a href="<?php echo URLROOT; ?>users/register" class="btn btn-light btn-block">Parolanızı mı unuttunuz? </a>
              </div>
            </div>
          </form>
      </div>
    </div>
  </div>
<?php require APPROOT . '/views/inc/footer.php'; ?>

