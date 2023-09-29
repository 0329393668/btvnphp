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
        private $id;
        private $title;
        private $author;
        private $publicationYear;
        private $imageReview;
        private $type;

        public function __construct($id, $title, $author, $publicationYear, $imageReview, $type)
        {
            $this->id = $id;
            $this->title = $title;
            $this->author = $author;
            $this->publicationYear = $publicationYear;
            $this->imageReview = $imageReview;
            $this->type = $type;
        }

        public function getId()
        {
            return $this->id;
        }

        public function setId($id)
        {
            $this->id = $id;
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

        public function getImageReview()
        {
            return $this->imageReview;
        }

        public function setImageReview($imageReview)
        {
            $this->imageReview = $imageReview;
        }

        public function getType()
        {
            return $this->type;
        }

        public function setType($type)
        {
            $this->type = $type;
        }
    }

    class Library
    {
        private $books = [];

        public function addBook($book)
        {
            $this->books[] = $book;
        }

        public function removeBook($book)
        {
            $index = array_search($book, $this->books);
            if ($index !== false) {
                array_splice($this->books, $index, 1);
            }
        }

        public function searchByTitle($title)
        {
            $foundBooks = [];
            foreach ($this->books as $book) {
                if (strcasecmp($book->getTitle(), $title) === 0) {
                    $foundBooks[] = $book;
                }
            }
            return $foundBooks;
        }

        public function searchByAuthor($author)
        {
            $foundBooks = [];
            foreach ($this->books as $book) {
                if (strcasecmp($book->getAuthor(), $author) === 0) {
                    $foundBooks[] = $book;
                }
            }
            return $foundBooks;
        }

        public function getAllBooks()
        {
            return $this->books;
        }
    }

    class User
    {
        private $id;
        private $fullName;

        public function __construct($id, $fullName)
        {
            $this->id = $id;
            $this->fullName = $fullName;
        }

        public function getFullName()
        {
            return $this->fullName;
        }
    }

    class Loan
    {
        private $user;
        private $book;
        private $dueDate;

        public function __construct($user, $book, $dueDate)
        {
            $this->user = $user;
            $this->book = $book;
            $this->dueDate = $dueDate;
        }

        public function getUser()
        {
            return $this->user;
        }

        public function getBook()
        {
            return $this->book;
        }

        public function getDueDate()
        {
            return $this->dueDate;
        }
    }

    // Sử dụng các lớp
    
    // Tạo đối tượng Book
    $book1 = new Book(1, "Book 1", "Author 1", 2021, "image1.jpg", "paperBook");
    $book2 = new Book(2, "Book 2", "Author 2", 2022, "image2.jpg", "eBook");

    // Tạo đối tượng Library và thêm sách vào thư viện
    $library = new Library();
    $library->addBook($book1);
    $library->addBook($book2);

    // Tìm kiếm sách theo tiêu đề
    $searchedBooks = $library->searchByTitle("Book 1");
    foreach ($searchedBooks as $book) {
        echo "ID: " . $book->getId() . "<br>";
        echo "Title: " . $book->getTitle() . "<br>";
        echo "Author: " . $book->getAuthor() . "<br>";
        echo "Publication Year: " . $book->getPublicationYear() . "<br>";
        echo "<br>";
    }

    // Tạo đối tượng User
    $user = new User(1, "Đức Anh");

    // Tạo đối tượng Loan
    $dueDate = date('Y-m-d', strtotime("+7 days"));
    $loan = new Loan($user, $book1, $dueDate);

    // Lấy thông tin người mượn và cuốn sách được mượn
    echo "User: " . $loan->getUser()->getFullName() . "<br>";
    echo "Book: " . $loan->getBook()->getTitle() . "<br>";
    echo "Due Date: " . $loan->getDueDate() . "<br>";

    ?>
</body>

</html>