<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
    }

    body {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        background: linear-gradient(135deg, while);
    }

    .container {
        max-width: 700px;
        width: 100%;
        background-color: #fff;
        padding: 25px 30px;
        border-radius: 5px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
    }

    .container .title {
        font-size: 25px;
        font-weight: 500;
        position: relative;
    }

    .container .title::before {
        content: "";
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 30px;
        border-radius: 5px;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    .content form .user-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        margin: 20px 0 12px 0;
    }

    form .user-details .input-box {
        margin-bottom: 15px;
        width: calc(100% / 2 - 20px);
    }

    form .input-box span.details {
        display: block;
        font-weight: 500;
        margin-bottom: 5px;
    }

    .user-details .input-box input {
        height: 45px;
        width: 100%;
        outline: none;
        font-size: 16px;
        border-radius: 5px;
        padding-left: 15px;
        border: 1px solid #ccc;
        border-bottom-width: 2px;
        transition: all 0.3s ease;
    }

    .user-details .input-box input:focus,
    .user-details .input-box input:valid {
        border-color: #9b59b6;
    }

    form .gender-details .gender-title {
        font-size: 20px;
        font-weight: 500;
    }

    form .category {
        display: flex;
        width: 80%;
        margin: 14px 0;
        justify-content: space-between;
    }

    form .category label {
        display: flex;
        align-items: center;
        cursor: pointer;
    }

    form .category label .dot {
        height: 18px;
        width: 18px;
        border-radius: 50%;
        margin-right: 10px;
        background: #d9d9d9;
        border: 5px solid transparent;
        transition: all 0.3s ease;
    }

    #dot-1:checked~.category label .one,
    #dot-2:checked~.category label .two,
    #dot-3:checked~.category label .three {
        background: #9b59b6;
        border-color: #d9d9d9;
    }

    form input[type="radio"] {
        display: none;
    }

    form .button {
        height: 45px;
        margin: 35px 0
    }

    form .button input {
        height: 100%;
        width: 100%;
        border-radius: 5px;
        border: none;
        color: #fff;
        font-size: 18px;
        font-weight: 500;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s ease;
        background: linear-gradient(135deg, #71b7e6, #9b59b6);
    }

    form .button input:hover {
        /* transform: scale(0.99); */
        background: linear-gradient(-135deg, #71b7e6, #9b59b6);
    }

    @media(max-width: 584px) {
        .container {
            max-width: 100%;
        }

        form .user-details .input-box {
            margin-bottom: 15px;
            width: 100%;
        }

        form .category {
            width: 100%;
        }

        .content form .user-details {
            max-height: 300px;
            overflow-y: scroll;
        }

        .user-details::-webkit-scrollbar {
            width: 5px;
        }
    }

    @media(max-width: 459px) {
        .container .content .category {
            flex-direction: column;
        }
    }
    .form-control {
    display: block;
    width: 100%;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #757575;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    appearance: none;
    border-radius: 5px;
    transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
}
</style>

<body>
    <div class="container" style="width:85%;float:right">
        <div class="title">Thêm mới đơn hàng</div>
        <div class="content">
            <form action="index.php?act=addbill" method="POST" enctype="multipart/form-data">
                <div class="user-details">
                    
                    <div class="input-box">
                        <span class="details">Tên người mua </span>
                        <input type="text" name="tendh" placeholder="Tên người mua " required>
                    </div>
                    <div class="input-box">
                        <span class="details">Địa chỉ người mua </span>
                        <input type="text" name="dcdh" placeholder="Địa chỉ người mua" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Số điện thoại người mua</span>
                        <input type="text" name="sdtdh" placeholder="" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email người mua</span>
                        <input type="text" name="emaildh" placeholder="" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Phương thức thanh toán đơn hàng</span>
                       
                        <select class="form-select mb-3" aria-label="Default select example" name="ptttdh">
                            <option value="0" selected>Tất cả</option>
                            <option required value="1">Mono</option>
                            <option required value="2">Agribank</option>
                            <option required value="3">Teckcombank</option>
                        </select>
                    </div>
                    

                </div>

                <div class="">
                    <input type="submit" name="themmoibill" class="btn btn-primary" value="Thêm mới">
                    <input type="reset" class="btn btn-primary" value="Nhập Lại">
                    <a href="index.php?act=listbill"><input type="button" class="btn btn-primary" value="Danh sách"></a>
                </div>
                
            </form>
        </div>
        <?php
                        if(isset($thongbao)&&($thongbao!=""))
                        echo $thongbao;
                    ?>
    </div>

</body>

</html>