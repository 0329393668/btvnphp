<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTVN tính đa hình</title>
</head>
<body>
<?php
interface Borrowable{
    public function borrow();
    public function returnItem();
};

   Class Book implements Borrowable{
       private $title;
       private $author;
       private $isBrrowed;

       // viết hàm khởi tạo class
       public function __construct($title, $author) {
           $this->title = $title;
           $this->author = $author;
           $this->isBorrowed = false;
       }
       // function borrow()
       public function borrow() {
           if (!$this->isBorrowed) {
               $this->isBorrowed = true;
               echo "Sách '{$this->title}' của '{$this->author}' đã được mượn."  . "<br>";
           } else {
               echo "Sách đã được mượn từ trước, không thể mượn."  . "<br>";
           }
       }
       // Nếu sách chưa được mượn thì thực hiện cho mượn và trả ra thông báo sách $title của $author đã được mượn
       // Nếu không thì trả về thông báo "sách đã được mượn từ trước, ko thể mượn"

       // function returnItem()
       public function returnItem() {
           $this->isBorrowed = false;
           echo "Sách '{$this->title}' của '{$this->author}' đã được trả lại."  . "<br>";
       }
       // viết code trả sách và trả về thông báo trả sách thành công
   }

   Class Paper implements Borrowable{
       private $title;
       private $date;
       private $isBorrowed;
       public function __construct($title, $date) {
           $this->title = $title;
           $this->date = $date;
           $this->isBorrowed = false;
       }
       // Viết code còn lại giống Book
       public function borrow() {
           if (!$this->isBorrowed) {
               $this->isBorrowed = true;
               echo "Báo '{$this->title}' ngày '{$this->date}' đã được mượn."  . "<br>";
           } else {
               echo "Báo đã được mượn từ trước, không thể mượn."  . "<br>";
           }
       }

       public function returnItem() {
           $this->isBorrowed = false;
           echo "Báo '{$this->title}' ngày '{$this->date}' đã được trả lại." . "<br>";
       }
   }

$book = new Book("Harry Potter", "J.K. Rowling");
$book->borrow();
$book->borrow();
$book->returnItem();
$book->borrow();


echo "<br>";
$paper = new Paper("Newspaper", "2023-10-01");
$paper->borrow();
$paper->borrow();
$paper->returnItem();

?>
</body>
</html>