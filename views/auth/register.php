<?php $this->layout("layouts/default", ["title" => "MeoMeo"]) ?>

<?php $this->start("page") ?>
<div class="container py-5">
  <section class=" bg-image">
    <div class="mask d-flex align-items-center gradient-custom-3">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-12 col-md-12 col-lg-5 col-xl-5">
            <div class="card" style="border-radius: 6px;">
              <div class="card-body p-4">
                <h4 class="text-uppercase text-center mb-4">ĐĂNG KÝ TÀI KHOẢN</h4>
                <form class="form-horizontal" role="form" method="POST" action="/register">
                  <div class="form-outline mb-3 <?=isset($errors['name']) ? ' has-error' : '' ?>">
                      <label class="form-label" for="name">Họ và tên</label>
                      <input type="text" id="name" name="name" class="form-control form-control-md" placeholder="Nhập họ và tên" 
                      value="<?=isset($old['name']) ? $this->e($old['name']) : '' ?>" required autofocus/>
                      <?php if (isset($errors['name'])): ?>
                          <span class="help-block">
                              <span class="text-danger"><?=$this->e($errors['name'])?></span>
                          </span>
                      <?php endif ?>   
                  </div>

                  <div class="form-outline mb-3 <?=isset($errors['email']) ? ' has-error' : '' ?>">
                      <label class="form-label" for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control form-control-md" placeholder="Nhập tài khoản email" 
                      value="<?=isset($old['email']) ? $this->e($old['email']) : '' ?>" required/>
                      <?php if (isset($errors['email'])): ?>
                          <span class="help-block">
                              <span class="text-danger"><?=$this->e($errors['email'])?></span>
                          </span>
                      <?php endif ?>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-outline mb-3 <?=isset($errors['birthdate']) ? ' has-error' : '' ?>">
                          <label class="form-label" for="birthdate">Ngày sinh</label>
                          <input type="date" id="birthdate" name="birthdate" class="form-control form-control-md" placeholder="Nhập mật khẩu" required/>
                          <?php if (isset($errors['birthdate'])): ?>
                              <span class="help-block">
                                  <span class="text-danger"><?=$this->e($errors['birthdate'])?></span>
                              </span>
                          <?php endif ?>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-outline mb-3 <?=isset($errors['sex']) ? ' has-error' : '' ?>">
                          <div class="d-flex flex-column">
                            <label class="form-label" for="sex">Giới tính</label>
                            <select name="sex" id="sex" class="p-2">
                              <option value="">--Chọn giới tính--</option>
                              <option value="Nam">Nam</option>
                              <option value="Nữ">Nữ</option>
                              <option value="Khác">Khác</option>
                            </select>
                            <?php if (isset($errors['sex'])): ?>
                                <span class="help-block">
                                    <span class="text-danger"><?=$this->e($errors['sex'])?></span>
                                </span>
                            <?php endif ?>
                          </div>
                      </div>
                    </div>
                  </div>
                  

                  <div class="form-outline mb-3 <?=isset($errors['password']) ? ' has-error' : '' ?>">
                      <label class="form-label" for="password">Mật khẩu</label>
                      <input type="password" id="password" name="password" class="form-control form-control-md" placeholder="Nhập mật khẩu" required/>
                      <?php if (isset($errors['password'])): ?>
                          <span class="help-block">
                              <span class="text-danger"><?=$this->e($errors['password'])?></span>
                          </span>
                      <?php endif ?>
                  </div>

                  <div class="form-outline mb-3 <?=isset($errors['password_confirmation']) ? ' has-error' : '' ?>">
                      <label class="form-label" for="password-confirm">Xác nhận mật khẩu</label>
                      <input type="password" id="password-confirm" name="password_confirmation" class="form-control form-control-md" placeholder="Nhập lại mật khẩu" required/>
                      <?php if (isset($errors['password_confirmation'])): ?>
                          <span class="help-block">
                              <span class="text-danger"><?=$this->e($errors['password_confirmation'])?></span>
                          </span>
                      <?php endif ?>
                  </div>


                  <div class="form-check d-flex justify-content-center mb-4">
                      <label class="form-check-label" for="form2Example3g">
                        <input
                          class="form-check-input me-2"
                          type="checkbox"
                          value=""
                          id="form2Example3cg"
                        />
                      Chấp nhận điều khoảng và dịch vụ <a href="#!" class="text-primary"><u>Xem</u></a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-block btn-lg btn-reg text-light">Đăng ký</button>
                  </div>

                  <p class="text-center text-muted mt-4 mb-0">Bạn đã có tài khoản? <a href="/login" class="fw-bold text-primary text-decoration-none"><u>Đăng nhập</u></a></p>

                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script>
 
</script>
<?php $this->stop() ?>
