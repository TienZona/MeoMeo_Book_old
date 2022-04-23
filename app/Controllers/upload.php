<?php
$target_file = $target_dir . basename($_FILES["file"]["name"]);
$uploadOk = 1;
$hasExist = 0;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["file"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    $errors['img'] = 'File is not an image';
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  $errors['img'] = 'Sorry, file already exists.';
  
  $hasExist = 1;
}

// Check file size
if ($_FILES["file"]["size"] > 1000000) {
  $errors['img'] = 'Sorry, your file is too large.';
  
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  $errors['img'] = 'Tệp tải lên phải là ảnh JPG, JPEG, PNG & GIF';
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0 || $hasExist == 1) {
  $errors['img'] = 'Không thể tải ảnh lên!';
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    echo "<script>alert(\"Tải ảnh lên thành công!\")</script>";
  } else {
    $errors['img'] = 'Xin lỗi, đã xảy ra lỗi khi tải tệp của bạn lên.';

  }
}
?>