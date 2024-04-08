<?php

class Book {
    public $title;
    public $author;
    public $isbn;

    public function __construct($title, $author, $isbn) {
        $this->title = $title;
        $this->author = $author;
        $this->isbn = $isbn;
    }
}

class Library {
    private $books = array();

    public function addBook($book) {
        $this->books[] = $book;
    }

    public function removeBook($isbn) {
        foreach ($this->books as $key => $book) {
            if ($book->isbn === $isbn) {
                unset($this->books[$key]);
                return true;
            }
        }
        return false;
    }

    public function displayBooks() {
        echo "<h2>Library Inventory</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Title</th><th>Author</th><th>ISBN</th></tr>";
        foreach ($this->books as $book) {
            echo "<tr><td>{$book->title}</td><td>{$book->author}</td><td>{$book->isbn}</td></tr>";
        }
        echo "</table>";
    }
}

// Sample usage
$library = new Library();

$book1 = new Book("The Great Gatsby", "F. Scott Fitzgerald", "9780743273565");
$book2 = new Book("To Kill a Mockingbird", "Harper Lee", "9780061120084");

$library->addBook($book1);
$library->addBook($book2);

$library->displayBooks();

// Remove a book
$library->removeBook("9780743273565");

$library->displayBooks();

?>
