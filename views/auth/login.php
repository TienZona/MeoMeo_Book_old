<?php $this->layout("layouts/default", ["title" => 'MeoMeo123']) ?>

<?php $this->start("page") ?>
<div class="container">
<style>
        .gradient-custom-3 {
            background: #84fab0;
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));
            background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
        }
        .btn-reg {
            width: 200px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            background: #84fab0;
            transition: all ease .3s;
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
            background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
        }
        .btn-reg:hover {
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
    </style>
<section class=" bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center gradient-custom-3">
    <div class="container">
      <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12 col-md-12 col-lg-5 col-xl-5">
          <div class="card" style="border-radius: 6px;">
            <div class="card-body p-4">
              <h4 class="text-uppercase text-center mb-4">ĐĂNG NHẬP</h4>

              <form class="form-horizontal" role="form" method="POST" action="/login">
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
                <div class="form-outline mb-3 <?=isset($errors['password']) ? ' has-error' : '' ?>">
                    <label class="form-label" for="password">Mật khẩu</label>
                    <input type="password" id="password" name="password" class="form-control form-control-md" placeholder="Nhập mật khẩu" required/>
                    <?php if (isset($errors['password'])): ?>
                        <span class="help-block">
                            <span class="text-danger"><?=$this->e($errors['password'])?></span>
                        </span>
                    <?php endif ?>
                </div>

                <div class="form-check d-flex justify-content-center mb-4">
                    <label class="form-check-label">
                      <input
                        class="form-check-input me-2"
                        type="checkbox"
                        value=""
                        id="form2Example3cg"
                      />
                    Lưu thông tin đăng nhập!
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" class="btn btn-success btn-block btn-lg btn-reg text-light">Đăng nhập</button>
                </div>

                <p class="text-center text-muted mt-4 mb-0">Bạn chưa có tài khoản? <a href="/register" class="fw-bold text-primary text-decoration-none"><u>Đăng ký</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</div>
<?php $this->stop() ?>
