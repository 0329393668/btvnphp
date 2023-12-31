<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy thông tin từ các trường nhập liệu
    $name = $_POST["name"];
    $email = $_POST["email"];
    $comments = $_POST["comments"];
    $errors = [];
    $is_validate = true;

    function validateFullName($name, &$errors)
    {
        global $is_validate;
        if (empty($name)) {
            $errors['name'] = "Họ và Tên là bắt buộc.";
            $is_validate = false;
        } elseif (strlen($name) < 3 || strlen($name) > 50) {
            $errors['name'] = "Họ và Tên phải có từ 3 đến 50 ký tự.";
            $is_validate = false;
        } elseif (preg_match('/[!@#$%^&*(),.?":{}|<>0-9]/', $name)) {
            $errors['name'] = "Họ và Tên không được chứa ký tự đặc biệt hoặc số.";
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
    function validateComments($comments, &$errors)
    {
        global $is_validate;
        if (empty($comments)) {
            $errors['comments'] = "Vui lòng điền nội dung phản hồi.";
            $is_validate = false;
        } else if (strlen($comments) < 10) {
            $errors['comments'] = "Nội dung phản hồi phải có ít nhất 10 ký tự.";
            $is_validate = false;
        } else if (strlen($comments) > 500) {
            $errors['comments'] = "Nội dung phản hồi không được vượt quá 500 ký tự.";
            $is_validate = false;
        } else if (preg_match("/(từ_cấm_1|từ_cấm_2|từ_cấm_3)/i", $comments)) {
            $errors['comments'] = "Nội dung phản hồi chứa từ cấm.";
            $is_validate = false;
        }
    }

    validateFullName($name, $errors);
    validateEmail($email, $errors);
    validateComments($comments, $errors);

    if ($is_validate) {
        echo "Đã Nhận Xét Thành Công!";
    } else {
        echo "<pre>";
        print_r($errors);
        echo "</pre>";
    }
}