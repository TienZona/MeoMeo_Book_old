<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?=$this->e($title)?></title>

    <!-- Styles -->
    <link href="library/bootstrap/bootstrap-5.1.3-dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css?v=1.5">
    <link rel="stylesheet" href="/fonts/fontawesome-free-6.1.1-web/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="library/bootstrap/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <script src="js/jQuery.js"></script>
    <script src="js/jquery.validater.js"></script>
    

    <?=$this->section("page_specific_css")?>
    <?php 
    if(isset($_SESSION['errors'])){
        $errs = $_SESSION['errors'];
        foreach($errs as $err){
            echo "<script>alert('$err')</script>";
        }
        unset($_SESSION['errors']);
    }
    if(isset($_SESSION['messages'])){
        $messages = $_SESSION['messages'];
        $mess = $messages['success'];
        echo "<script>alert('$mess')</script>";
        unset($_SESSION['messages']);
    }
    ?>
</head>
<body>
    <div class="qu-header">
        <div class="qu-main-header">
            <div class="container">
                <div class="row nav-bar"> 
                    <div class="col-4 nav-item">
                        <a href="/home" class="qu-logo text-white text-decoration-none fs-5">
                            <img src="/img/logo_meomeo.png" alt="" height="40px" >
                            MEOMEO
                        </a>
                    </div>
                    <div class="col-4 nav-item">
                        <div class="search">
                            <form class="form form-search"> 
                                <input type="text" class="px-3" placeholder="Search anything...">
                                <div class="btn-search">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-4 nav-item ">
                        <nav class="nav justify-content-end">
                            <a class="qu-nav text-white nav-link nav-notify" href="#">
                                <i class="fa-solid fa-bell"></i> 
                                Notify
                                
                            </a>
                            <?php if (! \App\SessionGuard::isUserLoggedIn()): ?>
                            <div class="qu-nav text-white nav-link nav-user">
                                <i class="fa-solid fa-user"></i> 
                                User
                                <div class="box-user">
                                    <a href="/register" class='user-box__content-item mb-2'>
                                        <span class="mx-2">????ng k??</span>
                                    </a>
                                    <a href="/login" class='user-box__content-item'>
                                        <span class="mx-2">????ng nh???p </span>
                                    </a>
                                </div>
                            </div>
                            <?php else: ?>
                            <div class="qu-nav text-white nav-link nav-user">
                                <i class="fa-solid fa-user"></i> 
                                <?=$this->e(\App\SessionGuard::user()->name)?>
                                <div class="box-user">
                                    <a href="/profile" class='user-box__content-item text-decoration-none mb-2'>
                                        <i class='fas fa-user-circle'></i>
                                        <span class="mx-2">T??i kho???n c???a t??i</span>
                                    </a>
                                    <a href="/logout" class='user-box__content-item text-decoration-none'>
                                        <i class="fa-solid fa-right-from-bracket"></i>
                                        <span class="mx-2">????ng xu???t </span>
                                    </a>
                                </div>
                            </div>
                            <?php endif ?>

                        </nav>
                    
                    </div>
                   
                </div>
            </div>
        </div>
    </div>    
    

    <div id="container" >
        <?=$this->section("page")?>

    </div>

    <div class="qu-footer bg-info p-4">
        <div class="container-xl">
            <h2 class="qu-footer__head text-center text-white">MEOMEO <hr class="qu-footer__hr"></h2>
            <div class="qu-footer__content">
                <div class="row p-2">
                    <div class="col-sm-3">
                        <h5 class="text-white ">Gi???i thi???u</h5>
                        
                        <div class="p-1">
                            <span class="text-white ">Question web l?? c???ng ?????ng h???i ????p v?? truy???n th??ng v??? ??i???u t???t ?????p. Kh??ng ch??? l?? gi???i ????p c??c c??u h???i th???c m???c tr???c truy???n m?? ch??ng t??i c??n h?????ng ?????n gi??p ????? nhau gi???a ?????i th?????ng.</span>
                            
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <h5 class="text-white ">H??? tr???</h5>
                        <div class="p-1">
                            
                            <span class="text-white ">Trang ch???</span><br>
                            <span class="text-white ">Ch??? ?????</span><br>
                            <span class="text-white ">H???i v?? ????p</span><br>
                            <span class="text-white ">Blog</span>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <h5 class="text-white ">B??i vi???t m???i nh???t</h5>
                    </div>
                    <div class="col-sm-3">
                        <h5 class="text-white ">Li??n h???</h5>
                        <div class="p-1">
                            <span class="text-white ">?????a ch???: Vi???t Nam</span><br>
                            <span class="text-white ">S??T: 0123456789</span>
                            <span class="text-white ">Email:questionweb@gmail.com</span>
                            <span class="text-white ">&copy; QUESTION WEB</span>
                        </div>
                    </div>
                </div>
                
                <hr class="qu-footer__hr">

            </div>
            <div class="qu-footer__footer">
                <span class="text-white ">B???n quy???n &copy; QUESTION WEB</span>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/js/wow.min.js"></script>

    <?=$this->section("page_specific_js")?>
</body>
</html>
