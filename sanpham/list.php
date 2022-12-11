<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="../danhmuc/css/mdb.min.css">
<script src="./deletes.js"></script>
<style>
  .rom {
    display: flex;
    justify-content: flex-start;
  }

  .rounded {
    width: 50%;
    margin-left: 30px;
    /* float: right; */
  }

  .mb-3 {
    width: 100%;
    margin-top: 20px;
  }


  input[type='submit'] {
    margin: 20px;
    background-color: red;
  }
  input[type='text'] {
    margin: 20px 0px;
    margin-left: 300px;
  }

  .select {
    display: flex;
  }
</style>
<div class="container" style="width:85%;float:right">
  <div class="row">
    <div class="col-lg-12">
      <div class="main-box clearfix">
        <div class="table-responsive">
          <div class="rom">
            <a href="index.php?act=addsp"><input type="submit" name="themmoi" class="btn btn-primary" value="Thêm mới" style="background-color: blue;"></a>
            <form action="index.php?act=listsp" method="post" class="select">
              <select class="form-select mb-3" name="iddm" aria-label="Default select example">
              <option value="0" selected>Tất cả</option>
                <?php
                foreach ($listdm as $danhmuc) {
                  extract($danhmuc);
                  echo '<option value="' . $id . '">' . $name_dm . '</option>';
                }
                ?>
              </select>
              <input type="submit" name="listok" class="btn btn-primary" value="Tìm kiếm">
              <input autocomplete="off" type="text" class="form-control rounded" placeholder='Tìm kiếm ' style="min-width: 225px" name="kyw"/>
              <input type="submit" name="listok" class="btn btn-primary" value="Tìm kiếm">
            </form>
          </div>

          <table class="table user-list">
            <thead>
              <tr>
                <th><span>Hình</span></th>
                <th><span>Tên sản phẩm</span></th>
                <th class="text-center"><span>Giá</span></th>
                <th><span>Mã loại</span></th>
                <th><span>Lượt xem</span></th>
                <th><span>Thao tác</span></th>

              </tr>
            </thead>
            <?php
            foreach ($listsp as $sanpham) {
              //dùng để show tên biến ra
              extract($sanpham);
              $suasp = "index.php?act=suasp&id=" . $id;
              $xoasp = "index.php?act=xoasp&id=" . $id;
              $hinhpath = "../upload/" . $img;
              if (is_file($hinhpath)) {
                $hinh = "<img src='" . $hinhpath . "' height='80'>";
              } else {
                $hinh = "No photo";
              }
              echo '
              <tbody>
              <tr>
                <td>
                  ' . $hinh . '
               
                </td>
                <td>
                  ' . $name . '
                </td>
                <td class="text-center">
<span class="label label-default">' . $price . '</span>
                </td>
                <td>
                  <a href="#">' . $iddm . '</a>
                </td>
                <td>
                  <a href="#">' . $sanpham['view'] . '</a>
                </td>
                <td style="width: 20%;">

                  <a href="' . $suasp . '" class="table-link">
                    <span class="fa-stack">
                      <i class="fa fa-square fa-stack-2x"></i>
                      <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                  <a href="' . $xoasp . '" class="table-link danger">
                    <span class="fa-stack">
                      <i class="fa fa-square fa-stack-2x"></i>
                      <i class="fa fa-trash-o fa-stack-1x fa-inverse" onclick="xoa()"></i>
                    </span>
                  </a>
                </td>
              </tr>


            </tbody>
              ';
            } ?>



            <!-- <tbody>
              <tr>
                <td>
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                  <a href="#" class="user-link">Mila Kunis</a>
                  <span class="user-subhead">Admin</span>
                </td>
                <td>
                  2013/08/08
                </td>
                <td class="text-center">
                  <span class="label label-default">Inactive</span>
                </td>
                <td>
                  <a href="#">mila@kunis.com</a>
                </td>
                <td>
                  <a href="#">mila@kunis.com</a>
                </td>
                <td style="width: 20%;">

                  <a href="#" class="table-link">
                    <span class="fa-stack">
                      <i class="fa fa-square fa-stack-2x"></i>
                      <i class="fa fa-pencil fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                  <a href="#" class="table-link danger">
                    <span class="fa-stack">
                      <i class="fa fa-square fa-stack-2x"></i>
                      <i class="fa fa-trash-o fa-stack-1x fa-inverse"></i>
                    </span>
                  </a>
                </td>
              </tr>


            </tbody> -->
          </table>
        </div>

      </div>

    </div>
  </div>
</div>