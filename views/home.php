<?php 
    $this->layout("layouts/default", ["title" => 'MeoMeo123']);
?>

<?php $this->start("page")?>
<?php
$username = $_SESSION['user_name'];
$avatar = $_SESSION['user_avatar'];
$user_id = $_SESSION['user_id'];

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

function checkLike($id_post, $arrs){
    foreach($arrs as $item){
        if($item['id_post'] == $id_post)
            return true;
    }
    return false;
}
?>
<div class="container-xl py-4">
    <div class="row gx-4">
        <div class="qu-box-left col-9 col-xl-9">
            <div class="qu-post">
                <div class="qu-post-head bg-light">

                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex">
                                <div class="" style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                                    <img src="img/avatar/<?php echo $avatar; ?>" width="50px" height="50px" class="d-inline-block align-top" alt="">
                                </div>
                                <span class="qu-post-name text-info mx-4"> <?php echo $username ?></span>
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="" data-bs-toggle="modal" data-bs-target="#modal">
                                <div class="box-post text-center">
                                    <span class="text-secondary p-4"  data-bs-dismiss="modal">Chào bạn, đặt câu hỏi vào đây?</span>
                                </div>
                            </a>
                            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered ">
                                    <form action="/newPost"  role="form"  method="post" enctype="multipart/form-data">
                                        <div class="modal-content">
                                            <div class="modal-header text-center">
                                                <h5 class="modal-title fw-bold" id="modalLabel">Tạo câu hỏi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <style>
                                                
                                            </style>
                                            <div class="modal-body">
                                                <div class="modal-body__head d-flex">
                                                    <div class="head-img">
                                                        <img src="img/avatar/<?php echo $avatar ?>" alt="">
                                                    </div>
                                                    <div class="head-info mx-3 d-flex align-items-center">
                                                        <h5 class="text-primary fw-bold"><?php echo $username ?></h5>
                                                        <input type="text" name="id_user" value="<?php echo $user_id; ?>" hidden>
                                                    </div>
                                                </div>
                                                <div class="modal-body__content my-3">
                                                    <textarea name="content" class="area-content" cols="53" rows="1" placeholder="Nhập câu hỏi"></textarea>
                                                    <div class="">
                                                        <img id="image" class="mb-3" src="./img/cai-dat-sql-server-2019.png" alt="" width="100%">
                                                        <span>Thêm ảnh: <input id="file-upload" name="file" type="file"></span>
                                                        
                                                    </div>
                                                </div>

                                                </div>

                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" class="btn btn-primary" name="submit">Đăng bài</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row px-4">
                        <h4 class="mb-4 heading-post">Bài viết nổi bật</h4>
                        <div class="post-list">
                            <?php  foreach($posts as $index => $post) :?>
                            <?php 
                                $id_post = $post['id'];
                            ?>
                            <div class="post-item my-4">
                                <div class="post-item__head d-flex justify-content-between align-items-center">
                                    <div class="post-item__head-info d-flex align-items-center">
                                        <div class="head-info__img">
                                            <img src="img/avatar/<?= $post['avatar'] ?>" alt="">
                                        </div>
                                        <h5 class="mx-4 my-0 text-primary  fw-bold"><?= $post['username'] ?></h5>
                                    </div>
                                    <div class="post-item__head-time d-flex align-items-center">
                                        <span class="mx-2 my-0">Ngày đăng: <?= substr($post['created_at'],0,10) ?></span>
                                        <span class="mx-2 my-0">Vào lúc:  <?= substr($post['created_at'],-8,10) ?> </span>
                                    </div>
                                    <?php
                                    if($user_id == $post['id_user']):
                                    ?>
                                    <a href="/deletePost?id_post=<?= $post['id'] ?>" class="text-danger mx-2 delete-post float-end text-decoration-none">
                                        <i class=" fa-solid fa-trash"></i>
                                        Xóa bài viết
                                    </a>
                                    <?php endif; ?>
                                </div>
                                <hr>
                                <div class="post-item__content">
                                    <p class="post-content fs-5 mx-3 fw-bold"><?= $post['content'] ?></p>
                                    <img class="post-img" src="img/post/<?= $post['image'] ?>" alt="">
                                </div>
                                <hr>
                                <div class="post-item__interactive">
                                    <div id="like"  class="interactive-like active text-dark mx-2">
                                        <span class="interactive-like__quantity"><?= $post['number_like'] ?></span>
                                        Like
                                        <i class="icon-like fs-4 fa-solid fa-thumbs-up 
                                        <?php  if(checkLike($post['id'], $postLikes)) echo "text-primary" ?>
                                        " 
                                        onclick="likePost(this, <?= $id_post ?>, <?= $user_id ?>)"></i>
                                    </div>
                                </div>
                                <hr>
                                <div class="post-item__comment">
                                    <div class="row justify-content-around" height="30px">
                                        <div class="head-info__img col-2">
                                            <img src="/img/avatar/<?=$avatar?>" alt="">
                                        </div>
                                        <div class="col-10 d-flex justify-content-between">
                                            <textarea name="content" class="comment-content px-3 area-content" cols="70" rows="1" placeholder="Nhập bình luận của bạn"></textarea>
                                            <button type="submit" class="btn-comment btn btn-primary" onclick="handleComment(this, <?= $id_post ?>, <?= $user_id ?>)">Bình luận</button>
                                        </div>
                                    </div>
                                    <div id="comment" class="mx-2">
                                            <span class="comment__quantity"><?= count($post['comments']) ?></span>
                                            Bình luận
                                        </div>
                                    <p class="comment-see text-center fs-6 mx-2 text-primary">Xem bình luận</p>
                                    <div class="comment-list comment-list p-2 d-none bg-light">
                                        <?php foreach($post['comments'] as $comment): ?>
                                        <div class="comment-item ">
                                            <div class="d-flex align-items-center my-2">
                                                <div class="head-info__img col-2">
                                                    <img src="img/avatar/<?= $comment['avatar'] ?>" alt="">
                                                </div>
                                                <h5 class="fs-5 text-primary px-2 m-0"><?= $comment['username'] ?></h5>
                                                <span class="mx-3"><?= $comment['created_at'] ?></span>
                                            </div>
                                            <div class="mx-5">
                                                <p class="comment-item__content"> <?= $comment['content'] ?></p>
                                            </div>
                                            <div class="vote-list d-flex mx-5">
                                                <div class="vote-item px-3">
                                                    <i class="vote-like icon-vote fa-regular fa-thumbs-up"></i> 
                                                    0
                                                </div>
                                                <div class="vote-item px-3">
                                                    <i class="vote-star icon-vote fa-regular fa-star" onclick="starUser(this, <?= $id_post ?>, <?= $user_id ?>)"></i>
                                                    0
                                                </div>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                        
                                </div>
                            </div>

                            <?php endforeach; ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <div class="qu-box-right col-3">
            <div class="qu-post">
                <div class="qu-post-head d-flex justify-content-center bg-primary">
                    <h6 class="text-light mx-1 ">TOP STAR </h6>
                    <i class="fa-solid mx-1 fa-star" style="color: yellow"></i>
                </div>
                <div class="qu-top10-post">
                    <div class="list-group list-group-flush">
                        <div class="top-star-item d-flex align-items-center p-2">
                            <div class="" style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                                <img src="img/avatar/<?php echo $avatar; ?>" width="50px" height="50px" class="d-inline-block align-top" alt="">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h5 class=" text-info mx-3 my-0"> <?php echo $username ?></h5>
                                <span class="text-center">500 <i class="fa-solid mx-1 fa-star" style="color: yellow"></i></span>
                            </div>
                        </div>
                        <hr class="m-0">
                        <div class="top-star-item d-flex align-items-center p-2">
                            <div class="" style="width: 50px; height: 50px; border-radius: 50%; overflow: hidden;">
                                <img src="img/avatar/<?php echo $avatar; ?>" width="50px" height="50px" class="d-inline-block align-top" alt="">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h5 class=" text-info mx-3 my-0"> <?php echo $username ?></h5>
                                <span class="text-center">500 <i class="fa-solid mx-1 fa-star" style="color: yellow"></i></span>
                            </div>
                        </div>
                        <hr class="m-0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // like bài viết
    function likePost(item, id_post, id_user){
        if(item.classList.contains("text-primary")){
            item.classList.remove('text-primary');
            const numberElement = item.parentElement.querySelector('.interactive-like__quantity');
            const number = parseInt(numberElement.innerHTML) - 1;
            numberElement.innerHTML = number;
            postAjax('/unLikePost', id_post, id_user);

        }else{
            item.classList.add('text-primary');
            const numberElement = item.parentElement.querySelector('.interactive-like__quantity');
            const number = parseInt(numberElement.innerHTML) + 1;
            numberElement.innerHTML = number;
            const data = {
                id_post: id_post,
                id_user: id_user
            }
            postAjax('/likePost', data);
        }
    }

    function postAjax(url, data){
        $.ajax({
            url: url,
            method: "POST",
            data: data,
            cache: false,
            error: function(xhr ,text){
                alert('Đã có lỗi: ' + text);
            }
        });
    }

    function handleComment(item, id_post, id_user){
        const areaText = item.parentElement.querySelector('.comment-content');
        $.ajax({
            url: '/addComment',
            method: "POST",
            data: {id_post: id_post, id_user: id_user, content: areaText.value},
            cache: false,
            error: function(xhr ,text){
                alert('Đã có lỗi: ' + text);
            }
        });
        location.reload();
    }

     // sử lý đăng bài

     $('#file-upload').change( function(event) {
        var tmppath = URL.createObjectURL(event.target.files[0]);
        $("#image").fadeIn("fast").attr('src',tmppath); 
    });
    $('.area-content').each(function () {
        this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
        if(this.scrollHeight < 20){
            this.setAttribute('style', 'height: auto;overflow-y:hidden;');
        }
    }).on('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    // Hiển thị comment bài viết
    $('.comment-see').each(function(index, item){
        item.onclick = function(){
            if(item.innerHTML == 'Xem bình luận'){
                $('.comment-list')[index].classList.remove('d-none');
                item.innerHTML = 'Ẩn bình luận';
            }else{
                $('.comment-list')[index].classList.add('d-none');
                item.innerHTML = 'Xem bình luận';

            }
        }
    })
    

    // like và star cho bình luận

    const iconLike = $('.vote-like');
    const iconStar = $('.vote-star');


    iconLike.each(function(index, item){
        item.onclick = function(){
            if(item.classList.contains("fa-regular")){
                item.classList.remove('fa-regular');
                item.classList.add('fa-solid')
            }else{
                item.classList.remove('fa-solid')
                item.classList.add('fa-regular');
            }
        }
    })

    function starUser(item, id_post, id_user){
        const data = {
            id_post: id_post,
            id_user: id_user
        }
        if(item.classList.contains("fa-solid")){
            item.classList.remove('fa-solid');
            item.classList.add('fa-regular');
            // const numberElement = item.parentElement.querySelector('.interactive-like__quantity');
            // const number = parseInt(numberElement.innerHTML) - 1;
            // numberElement.innerHTML = number;
            postAjax('/unstarUser', data);

        }else{
            item.classList.remove('fa-regular');
            item.classList.add('fa-solid');
            // const numberElement = item.parentElement.querySelector('.interactive-like__quantity');
            // const number = parseInt(numberElement.innerHTML) + 1;
            // numberElement.innerHTML = number;
            postAjax('/starUser', data);
            
        }
    }
    
</script>
<?php $this->stop() ?>