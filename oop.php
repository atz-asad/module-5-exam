<?php

class Book
{
    private $title;
    private $member;
    private $availableCopies;

    public function __construct($title, $member, $availableCopies)
    {
        $this->title = $title;
        $this->member = $member;
        $this->availableCopies = $availableCopies;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getAvailableCopies()
    {
        return $this->availableCopies;
    }

    public function borrowBook($member, $copies)
    {
        if ($this->availableCopies >= $copies) {
            $this->availableCopies -= $copies;
            $this->member = $member;
            return true;
        } else {
            return false;
        }
    }

    public function returnBook()
    {
        $this->availableCopies++;
    }
}

class Member
{
    private $name;

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }
}

// Create books with available copies
$allBooks = [
    new Book("The Great Gatsby", null, 5),
    new Book("To Kill a Mockingbird", null, 3),
    new Book("History of Bangladesh 2024", null, 10),
];

// Create members
$member1 = new Member("John Doe");
$member2 = new Member("Jane Smith");
$member3 = new Member("Rahim Uddin");

// Borrow books
$allBooks[0]->borrowBook($member1, 1);
$allBooks[1]->borrowBook($member2, 1);
$allBooks[2]->borrowBook($member3, 3);

// Display available copies of all books
foreach ($allBooks as $book) {
    echo "Available copies of " . $book->getTitle() . ": " . $book->getAvailableCopies() . "<br>";
}



?>



