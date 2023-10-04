<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính đa hình</title>
</head>
<body>
<?php
interface Shape {
    public function calculatePerimeter();
    public function calculateArea();
}

class Rectangular implements Shape {
    private $length;
    private $width;

    public function __construct($length, $width) {
        $this->length = $length;
        $this->width = $width;
    }

    public function calculatePerimeter() {
        return ($this->length + $this->width) * 2;
    }

    public function calculateArea() {
        return  $this->length * $this->width;
    }
}

class Square implements Shape {
    private $edge;

    public function __construct($edge) {
        $this->edge = $edge;
    }

    public function calculatePerimeter() {
        return $this->edge * 4;
    }

    public function calculateArea() {
        return  $this->edge * $this->edge;
    }
}

// test

$rectangular = new Rectangular(5, 6);
echo "Diện tích hình chữ nhật: " . $rectangular->calculateArea() . "<br>";
echo "Chu vi hình chữ nhật: " . $rectangular->calculatePerimeter() . "<br>";

$square = new Square(5);
echo "Diện tích hình vuông: " . $square->calculateArea() . "<br>";
echo "Chu vi hình vuông: " . $square->calculatePerimeter() . "<br>";
?>
</body>
</html>