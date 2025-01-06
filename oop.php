<?php

class Book {
    private $title;
    private $availableCopies;

    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true;
        }
        return false;
    }

    public function returnBook() {
        $this->availableCopies++;
    }
}

class Member {
    private $name;
    private $borrowedBooks = [];

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function borrowBook($book) {
        if ($book->borrowBook()) {
            $this->borrowedBooks[] = $book;
            return true;
        }
        return false;
    }

    public function returnBook($book) {
        foreach ($this->borrowedBooks as $key => $borrowedBook) {
            if ($borrowedBook->getTitle() === $book->getTitle()) {
                unset($this->borrowedBooks[$key]);
                $book->returnBook();
                return true;
            }
        }
        return false;
    }

    public function getBorrowedBooks() {
        return $this->borrowedBooks;
    }
}

// Create books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);
$book3 = new Book("The Crucible", 20);

// Create members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");
$member3 = new Member("Arthur Miller");

// Members borrow books
$member1->borrowBook($book1);
$member2->borrowBook($book2);
$member3->borrowBook($book3);

// Display available copies after borrowing
echo "Available Copies of '" . $book1->getTitle() . "': " . $book1->getAvailableCopies() . "<br>";
echo "Available Copies of '" . $book2->getTitle() . "': " . $book2->getAvailableCopies() . "<br>";
echo "Available Copies of '" . $book3->getTitle() . "': " . $book3->getAvailableCopies() . "<br>";

?>