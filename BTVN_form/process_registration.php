<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ các trường nhập liệu
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $phone = $_POST["phone"];
    $birthdate = $_POST["birthdate"];
    $address = $_POST["address"];
    $errors = [];
    $is_validate = true;

    function validateFullName($fullname, &$errors)
    {
        global $is_validate;
        if (empty($fullname)) {
            $errors['fullname'] = "Họ và Tên là bắt buộc.";
            $is_validate = false;
        } elseif (strlen($fullname) < 3 || strlen($fullname) > 50) {
            $errors['fullname'] = "Họ và Tên phải có từ 3 đến 50 ký tự.";
            $is_validate = false;
        } elseif (preg_match('/[!@#$%^&*(),.?":{}|<>0-9]/', $fullname)) {
            $errors['fullname'] = "Họ và Tên không được chứa ký tự đặc biệt hoặc số.";
            $is_validate = false;
        }
    }
    function validateEmail($email, &$errors)
    {
        global $is_validate;
        if (empty($email)) {
            $errors['email'] = "Email là bắt buộc.";
            $is_validate = false;
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email không hợp lệ.";
            $is_validate = false;
        } elseif (strlen($email) > 255) {
            $errors['email'] = "Email không được vượt quá 255 ký tự.";
            $is_validate = false;
        }
    }
    function validatePassword($password, &$errors)
    {
        global $is_validate;
        if (empty($password)) {
            $errors['password'] = "Mật khẩu là bắt buộc.";
            $is_validate = false;
        } elseif (strlen($password) < 6) {
            $errors['password'] = "Mật khẩu phải có ít nhất 6 ký tự.";
            $is_validate = false;
        } elseif (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[!@#$%^&*(),.?":{}|<>]/', $password)) {
            $errors['password'] = "Mật khẩu phải chứa ít nhất một chữ cái viết hoa, một chữ cái viết thường, một số và một ký tự đặc biệt.";
            $is_validate = false;
        }
    }
    function validatePasswords($confirm_password, $password, &$errors)
    {
        global $is_validate;
        if (empty($confirm_password)) {
            $errors['confirm_password'] = "Xác nhận Mật khẩu là bắt buộc.";
            $is_validate = false;
        } elseif ($password !== $confirm_password) {
            $errors['confirm_password'] = "Xác nhận Mật khẩu không khớp.";
            $is_validate = false;
        }
    }
    function validatePhone($phone, &$errors)
    {
        global $is_validate;
        if (!empty($phone) && !preg_match('/^\d{10}$/', $phone)) {
            $errors['phone'] = "Số Điện thoại không đúng định dạng.";
            $is_validate = false;
        }
    }
    function validateBirthdate($birthdate, &$errors)
    {
        global $is_validate;
        if (!empty($birthdate) && !preg_match('/^\d{4}-\d{2}-\d{2}$/', $birthdate)) {
            $errors['birthdate'] = "Ngày tháng năm không đúng định dạng.";
            $is_validate = false;
        }
    }
    function validateAddress($address, &$errors)
    {
        global $is_validate;
        if (!empty($address) && strlen($address) > 255) {
            $errors['address'] = "Địa chỉ không được vượt quá 255 ký tự.";
            $is_validate = false;
        }
    }

    validateFullName($fullname, $errors);
    validateEmail($email, $errors);
    validatePassword($password, $errors);
    validatePasswords($confirm_password, $password, $errors);
    validatePhone($phone, $errors);
    validateBirthdate($birthdate, $errors);
    validateAddress($address, $errors);

    if ($is_validate) {
        echo "Đã Thêm Thành Công!";
    } else {
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
    }
}