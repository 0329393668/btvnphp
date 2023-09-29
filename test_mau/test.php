<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book</title>
</head>

<body>
    <?php
    class Book
    {
        protected $title;
        protected $author;
        protected $publicationYear;

        public function __construct($title, $author, $publicationYear)
        {
            $this->title = $title;
            $this->author = $author;
            $this->publicationYear = $publicationYear;
        }
        public function getTitle()
        {
            return $this->title;
        }
        public function setTitle($title)
        {
            $this->title = $title;
        }
        public function getAuthor()
        {
            return $this->author;
        }
        public function setAuthor($author)
        {
            $this->author = $author;
        }
        public function getPublicationYear()
        {
            return $this->publicationYear;
        }
        public function setPublicationYear($publicationYear)
        {
            $this->publicationYear = $publicationYear;
        }
        public function showInfo()
        {
            echo "Tiêu đề: {$this->title}\n" . "<br>";
            echo "Tác giả: {$this->author}\n" . "<br>";
            echo "Năm xuất bản: {$this->publicationYear}\n" . "<br>";
        }
    }

    class PaperBook extends Book
    {
        private $weight;

        public function __construct($title, $author, $publicationYear, $weight)
        {
            parent::__construct($title, $author, $publicationYear);
            $this->weight = $weight;
        }

        public function getWeight()
        {
            return $this->weight;
        }

        public function setWeight($weight)
        {
            $this->weight = $weight;
        }

        public function showInfo()
        {
            parent::showInfo();
            echo "Trọng lượng: {$this->weight} kg\n" . "<br>";
            echo "<br>";
        }
    }

    class EBook extends Book
    {
        private $fileSize;

        public function __construct($title, $author, $publicationYear, $fileSize)
        {
            parent::__construct($title, $author, $publicationYear);
            $this->fileSize = $fileSize;
        }

        public function getFileSize()
        {
            return $this->fileSize;
        }

        public function setFileSize($fileSize)
        {
            $this->fileSize = $fileSize;
        }

        public function showInfo()
        {
            parent::showInfo();
            echo "Dung lượng tệp: {$this->fileSize} MB\n" . "<br>";
        }
    }

    $paperBook = new PaperBook("Sách giấy 1", "Tác giả A", 2021, 1.5);
    $paperBook->showInfo();

    $eBook = new EBook("EBook 1", "Tác giả B", 2022, 10);
    $eBook->showInfo();
    ?>
</body>

</html>