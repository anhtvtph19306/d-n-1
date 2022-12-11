<?php
include "../model/pdo.php";
include "header.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/taikhoan.php";
include "../model/binhluan.php";
include "../model/cart.php";

//controller danhmuc
if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            //kiểm tra user kích vào add
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = $_POST['tenloai'];
                insert_danhmuc($tenloai);
                $thongbao = "Thêm thành công";
            }

            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdm = load_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_danhmuc($_GET['id']);
            }
            $listdm = load_danhmuc();

            include "danhmuc/list.php";
            break;
        case 'update':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $danhmuc = load_1st_danhmuc($_GET['id']);
            }
            include "danhmuc/update.php";
            break;
        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $tenloai = $_POST['tenloai'];
                $id = $_POST['id'];
                update_danhmuc($id, $tenloai);
                $thongbao = "Cập nhật thành công";
            }

            $sql = "SELECT * FROM category ORDER BY id desc";
            $listdm = pdo_query($sql);


            include "danhmuc/list.php";
            break;

            /* controller sapham */
        case 'addsp':
            //kiểm tra user kích vào add
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['describe'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                $thongbao = "Thêm thành công";
            }
            $listdm = load_danhmuc();
            include "sanpham/add.php";
            break;
        case 'listsp':
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = '';
                $iddm = '';
            }
            $listdm = load_danhmuc();
            $listsp = loadall_sanpham($kyw, $iddm);
            include "sanpham/list.php";
            break;
        case 'xoasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_sanpham($_GET['id']);
            }
            $listdm = load_danhmuc();
            $listsp = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;

        case 'suasp':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = load_1st_sanpham($_GET['id']);
            }
            $listdm = load_danhmuc();
            include "sanpham/update.php";
            break;

        case 'updatesp':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $describe = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                //file
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                    // echo "The file ". htmlspecialchars( basename( $_FILES["hinh"]["name"])). " has been uploaded.";
                } else {
                    // echo "Sorry, there was an error uploading your file.";
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $describe, $hinh);
                $thongbao = "Cập nhật thành công";
            }
            $listdm = load_danhmuc();
            $listsp = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'dskh':
            $listtaikhoan = loadall_taikhoan("", 0);
            include "taikhoan/list.php";
            break;
        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan("", 0);

            include "taikhoan/list.php";
            break;
        case 'suatk':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $taikhoan = load_one_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan("", 0);
            include "taikhoan/update.php";
            break;
        case 'edit_taikhoan':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $id = $_POST['id'];

                update_taikhoan($id, $user, $pass, $email, $address, $tel);
            }
            $listtaikhoan = loadall_taikhoan("", 0);
            include 'taikhoan/list.php';
            break;
        case 'dsbl':
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_binhluan($_GET['id']);
            }
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'listbill':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }

            $listbill = loadall_bill($kyw, 0);
            include "bill/listbill.php";
            break;
        case 'xoabill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                delete_bill($_GET['id']);
            }
            $listbill = loadall_bill("", 0);
            include "bill/listbill.php";
            break;
        case 'suabill':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $bill = loadone_bill($_GET['id']);
            }
            $listbill = loadall_bill("", 0);
            include "bill/updatebill.php";
            break;
        case 'updatebill':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $bill_name = $_POST['tendh'];
                $bill_address = $_POST['dcdh'];
                $bill_tel = $_POST['sdtdh'];
                $bill_email = $_POST['emaildh'];
                $bill_pttt = $_POST['ptttdh'];
                $bill_status = $_POST['tinhtrang'];
                update_bill($id, $bill_name, $bill_address, $bill_tel, $bill_email, $bill_pttt, $bill_status);
            }
            $listbill = loadall_bill("", 0);
            include 'bill/listbill.php';
            break;
            case 'addbill':
                //kiểm tra user kích vào add
                if (isset($_POST['themmoibill']) && ($_POST['themmoibill'])) {
                    $bill_name = $_POST['tendh'];
                    $bill_address = $_POST['dcdh'];
                    $bill_tel = $_POST['sdtdh'];
                    $bill_email = $_POST['emaildh'];
                    $bill_pttt = $_POST['ptttdh'];
                    $namesp = $_POST['namesp'];
                    $total = $_POST['total'];
                    $oderdate = $_POST['oderdate'];
                    insert_bill2($bill_name, $bill_address, $bill_tel, $bill_email, $bill_pttt, $namesp, $total,$oderdate);
                    $thongbao = "Thêm thành công";
                }
    
                include "bill/addbill.php";
                break;
        case 'thongke':
            $listthongke = loadall_thongke();
            include "thongke/list.php";
            break;
        case 'bieudo':
            $listthongke = loadall_thongke();
            include "thongke/bieudo.php";
            break;
       
        case 'thoat':
            header('Location: index.php');
            break;

        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}




include "footer.php";
