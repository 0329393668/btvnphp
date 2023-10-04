<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký tài khoản</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .nav {
            height: 64px;
            width: 100%;
            background-color: #019cde;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 10;

        }

        .container {
            padding: 20px;
            margin-top: 64px;
            margin-bottom: 20px;
        }

        .content {
            max-width: 500px;
            margin: 2% auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        @media (max-width:768px) {
            .content {
                max-width: 400px;
                margin: 6% auto;
                background-color: #ffffff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
        }

        form {
            display: flex;
            flex-direction: column;
        }

        h2 {
            text-align: center;
            margin-bottom: 24px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            background-color: #019cde;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 16px;
            align-self: center;
            margin-top: 16px;
        }

        input[type="submit"]:hover {
            background-color: #3498db;
        }

        input[type="date"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 14px;
            width: 95%;
            cursor: text;
        }

        .footer {
            background-color: #000;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 10;
            font-size: 12px;
        }

        input::placeholder {
            font-style: italic;
        }

        #togglePassword:hover {
            opacity: 0.8;
            cursor: pointer;
        }
        #togglePassword1:hover {
             opacity: 0.8;
             cursor: pointer;
         }
        i {
            padding-right: 5px;
        }
    </style>
</head>

<body>
    <?php

    ?>
    <div class="nav">
        <div style="max-width: 550px;margin: 0 auto;">
            <img style="width: 130px; height: 64px"
                src="https://i.rada.vn/data/image/2022/09/16/dang-ky-tai-khoan-zing-id-700.jpg" alt="...">
        </div>
    </div>
    <div class="container">
        <div class="content">
            <h2>Đăng ký tài khoản</h2>
            <form action="process_registration.php" method="POST">
                <label for="fullname"><i class="fa-solid fa-user"></i> Họ và tên:</label>
                <input type="text" id="fullname" name="fullname" required placeholder="Họ và tên"
                    autocomplete="fullname">

                <label for="email"><i class="fa-solid fa-envelope"></i> Email:</label>
                <input type="email" id="email" name="email" required placeholder="Email" autocomplete="email">

                <label for="password"><i class="fa-solid fa-lock"></i> Mật khẩu:</label>
                <div style="position: relative">
                    <input type="password" id="password" name="password" required placeholder="Mật khẩu"
                        autocomplete="current-password">
                    <i id="togglePassword" style="position: absolute; right: 5px; top:10px"
                        class="fa-regular fa-eye"></i>
                </div>


                <label for="confirm_password"> <i class="fa-solid fa-lock"></i> Xác nhận mật khẩu:</label>
                <div style="position: relative">
                    <input type="password" id="confirm_password" name="confirm_password" required
                        placeholder="Xác nhận mật khẩu">
                    <i id="togglePassword1" style="position: absolute; right: 5px; top:10px"
                        class="fa-regular fa-eye"></i>
                </div>

                <label for="phone"><i class="fa-solid fa-phone"></i> Số điện thoại:</label>
                <input type="text" id="phone" name="phone" required placeholder="Số điện thoại ">

                <label for="birthdate"><i class="fa-solid fa-calendar-days"></i> Ngày tháng năm:</label>
                <input type="date" id="birthdate" name="birthdate" required placeholder="Ngày tháng năm">

                <label for="address"><i class="fa-solid fa-location-dot"></i> Địa chỉ:</label>
                <input type="text" id="address" name="address" required placeholder="Địa chỉ ">

                <input type="submit" value="Đăng ký">
            </form>
        </div>
    </div>
    <div class="footer">
        © 2013 Đơn vị chủ quản: VNG Corporation.
    </div>
    <script>
        const togglePasswordButton = document.getElementById('togglePassword');
        const togglePasswordButton1 = document.getElementById('togglePassword1');
        const passwordInput = document.getElementById('password');
        const passwordInput1 = document.getElementById('confirm_password');

        togglePasswordButton.addEventListener('click', function () {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordButton.classList.remove("fa-regular");
                togglePasswordButton.classList.add("fa-solid");
            } else {
                passwordInput.type = 'password';
                togglePasswordButton.classList.remove("fa-solid");
                togglePasswordButton.classList.add("fa-regular");
            }
        });
        togglePasswordButton1.addEventListener('click', function () {
            if (passwordInput1.type === 'password') {
                passwordInput1.type = 'text';
                togglePasswordButton1.classList.remove("fa-regular");
                togglePasswordButton1.classList.add("fa-solid");
            } else {
                passwordInput1.type = 'password';
                togglePasswordButton1.classList.remove("fa-solid");
                togglePasswordButton1.classList.add("fa-regular");
            }
        });
    </script>
</body>

</html>