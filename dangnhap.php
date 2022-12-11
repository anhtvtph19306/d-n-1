<?php
if (isset($_POST["dangnhap"])) {
    $err = [];
    // $checkuser= "/^[A-Z,a-z0-9_]{6,32}$/";
    if (empty($_POST["user"])) {
        $err["user"] = "Không được để trống username";
    } else {
        $user = $_POST["user"];
    }
    

    if (empty($_POST["pass"])) {
        $err["pass"] = "Không được để trống ô Password";
    } else {
      
            $pass = $_POST["pass"];
        
}}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="view/css/formdangnhap.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<style>
  .icondn a i:hover{
      color: #0dcaf0;
  }
  span{
        color: red;
    }
</style>
<body>
  <div class="all">

    <div class="container my-5 py-5 z-depth-1">


      <!--Section: Content-->
      <section class="px-md-5 mx-md-5 text-center text-lg-left dark-grey-text">


        <!--Grid row-->
        <div class="row d-flex justify-content-center">

          <!--Grid column-->
          <div class="col-md-6">

            <!-- Default form login -->
            <form class="text-center" action="index.php?act=dangnhap" method="post">

              <p class="h4 mb-4 icondn"><a href="index.php" style="margin-right:60px; color:black"><i class="fa-solid fa-house"></i></a> Đăng nhập</p>

              
              <div class="form-row mb-4">
                <div class="col">
                  <!-- username -->
                  <input type="text" name="user" id="defaultRegisterFormFirstName" class="form-control" placeholder="Username">
                  <span><?php if (!empty($err["user"])) echo $err["user"] ?></span><br>
                </div>
                
                <!-- <div class="col">
                  
                  <input type="text" name="address" id="defaultRegisterFormLastName" class="form-control" placeholder="Address">
                </div> -->
              </div>

              <!-- Password -->
              <input type="password" name="pass" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
              <span><?php if(!empty($err['pass'])) echo $err["pass"] ?></span><br>
              <div class="d-flex justify-content-around">
                <div>
                  <!-- Remember me -->
                  <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                    <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                  </div>
                </div>
                <div>
                  <!-- Forgot password -->
                  <a href="index.php?act=quenmk" style="padding:5px;">Quên mật khẩu?</a>
                  <!-- <a href="index.php?act=edit_taikhoan">Cập nhật tài khoản?</a> -->
                </div>
              </div>

              <!-- Sign in button -->
              <a href="index.php?act=dangki"></a> <button class="btn btn-info btn-block my-4" type="submit" name="dangnhap" value="Đăng nhập">Đăng nhập</button>
              <div class="thongbao" style="color: red;">
              <?php
    if(isset($thongbao)&&($thongbao!="")){
        echo $thongbao;
    }
?></div>
              <!-- Register -->
              <p>Not a member?
                <a href="index.php?act=dangki">Đăng kí</a>
              </p>
              
              <!-- Social login -->
              <p>or sign in with:</p>

              <a href="#" class="mx-1" role="button"><i class="fa-brands fa-facebook"></i></i></a>
              <a href="#" class="mx-1" role="button"><i class="fab fa-twitter"></i></a>
              <a href="#" class="mx-1" role="button"><i class="fab fa-linkedin-in"></i></a>
              <a href="#" class="mx-1" role="button"><i class="fab fa-github"></i></a>

            </form>
            <!-- Default form login -->

          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->


      </section>
      <!--Section: Content-->


    </div>
  </div>
</body>

</html>