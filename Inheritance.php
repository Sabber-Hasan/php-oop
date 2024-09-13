<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inheritance</title>
</head>

<body>
    <form action="" method="post">
        <!-- Circle Input -->
        <div id="circleInput">
            <label for="radius">Radius:</label>
            <input type="number" name="radius" id="radius">
        </div>

        <!-- Rectangle Inputs -->
        <div id="rectangleInput" style="margin-top: 20px; margin-bottom: 20px">
            <label for="length">Length:</label>
            <input type="number" name="length" id="length">
            <label for="width">Width:</label>
            <input type="number" name="width" id="width">
        </div>

        <!-- submit -->
        <input type="submit" value="Submit">
    </form>
</body>

</html>
<?php
abstract class Shape
{
    abstract public function area();
};

class Circle extends Shape
{
    public $radius;
    public function __construct($radius)
    {
        $this->radius = $radius;
    }
    public function area()
    {
        return (int)$this->radius * (int)$this->radius * 3.14;
        // return pi() * pow((int)$this->radius, 2);
    }
};

class Rectangle extends Shape
{
    public $length;
    public $width;
    public function __construct($length, $width)
    {
        $this->length = $length;
        $this->width = $width;
    }
    public function area()
    {
        return (int)$this->length * (int)$this->width;
    }
};

if (isset($_POST['radius']) && isset($_POST['length']) && isset($_POST['width'])) {
    $circle = new Circle($_POST['radius']);
    $rectangle = new Rectangle($_POST['length'], $_POST['width']);

    echo "Area of Circle: " . $circle->area() . "<br>";
    echo "Area of Rectangle: " . $rectangle->area();
};
?>