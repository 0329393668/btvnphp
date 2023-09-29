<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lap Thực hành time</title>
</head>

<body>
    Bài 1 <br>
    <?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $now = time();
    $formattedDate = date('l, d/m/Y, h:i A', $now);
    echo "Thứ " . $formattedDate . "<br>";
    ?>

    Bài 2 <br>
    <?php
    $birthday = "1999-11-17";
    $now = time();

    $diff = strtotime($birthday);
    $age = date('Y', $now) - date('Y', $diff);

    echo "Tuổi của bạn là: " . $age . "<br>";
    ?>

    Bài 3 <br>
    <?php
    $currentMonth = date('n');
    $monthNames = [
        'Tháng 1',
        'Tháng 2',
        'Tháng 3',
        'Tháng 4',
        'Tháng 5',
        'Tháng 6',
        'Tháng 7',
        'Tháng 8',
        'Tháng 9',
        'Tháng 10',
        'Tháng 11',
        'Tháng 12'
    ];

    $monthFullName = $monthNames[$currentMonth - 1];
    echo $monthFullName . "<br>";
    ?>

    Bài 4 <br>
    <?php
    $postDate = "2023-07-20";
    $formattedDate = date('d/m/Y', strtotime($postDate));
    echo $formattedDate . "<br>";
    ?>

    Bài 5 <br>
    <?php
    $givenDate = "2023-07-20";
    $dayOfWeek = date('N', strtotime($givenDate));

    $dayNames = [
        'Thứ 2',
        'Thứ 3',
        'Thứ 4',
        'Thứ 5',
        'Thứ 6',
        'Thứ 7',
        'Chủ nhật'
    ];

    $dayFullName = $dayNames[$dayOfWeek - 1];
    echo $dayFullName . "<br>";
    ?>
</body>

</html>