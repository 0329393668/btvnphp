<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính đa hình</title>
</head>
<body>
<?php

abstract class Shape
{
    abstract public function calculateArea();
    abstract public function getName();
}

class Circle extends Shape
{
    private $radius;
    private $name;

    public function __construct($radius)
    {
        $this->radius = $radius;
        $this->name = "Circle";
    }

    public function calculateArea()
    {
        return 3.14 * $this->radius * $this->radius;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Rectangular extends Shape
{
    private $length;
    private $width;
    private $name;

    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
        $this->name = "Rectangular";
    }

    public function calculateArea()
    {
        return $this->length * $this->width;
    }

    public function getName()
    {
        return $this->name;
    }
}

class Square extends Shape
{
    private $edge;
    private $name;

    public function __construct($edge)
    {
        $this->edge = $edge;
        $this->name = "Square";
    }

    public function calculateArea()
    {
        return $this->edge * $this->edge;
    }

    public function getName()
    {
        return $this->name;
    }
}

function greeting($shapes)
{
    foreach ($shapes as $shape) {
        echo "Diện tích " . $shape->getName() . ": " . $shape->calculateArea() . '<br>';
    }
}

$shapes = [new Circle(5), new Rectangular(5, 6), new Square(5)];
greeting($shapes);

?>
</body>
</html>