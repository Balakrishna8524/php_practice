<?php
/*
Problem Statement:
Design a Library Management System using PHP classes. The system should have the following features:

Book Class:
Each book should have a title, author, genre, ISBN, availability status, and borrowing history.
Implement methods to display book details, check availability, and update availability status.
Ensure proper validation for ISBN format and availability status changes.

Library Member Class:
Each library member should have a name, unique member ID, and a list of borrowed books.
Implement methods to add a new member, display all members, and display the list of borrowed books for a specific member.
Ensure that members cannot borrow more than a specified number of books at a time.

Testing:
Create instances of library members and books.
Add a few library members with borrowed books.
Perform book checkouts, returns, and display member information.

Constraints:
Implement error handling for cases such as trying to borrow a book that is not available or returning a book that was not borrowed.

Submission:
Provide PHP class implementations for the Book and Library Member.
Include a testing section demonstrating the functionality of the Library Management System.
Feel free to adapt or modify the problem statement to suit your practice needs. Happy coding!

*/



class Book {
    private $title;
    private $author;
    private $genre;
    private $isbn;
    private $availability;
    private $borrowingHistory = [];

    public function __construct($title, $author, $genre, $isbn, $availability = true) {
        $this->title = $title;
        $this->author = $author;
        $this->genre = $genre;
        $this->setISBN($isbn);
        $this->availability = $availability;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function displayDetails() {
        echo "Title: {$this->title}\n";
        echo "Author: {$this->author}\n";
        echo "Genre: {$this->genre}\n";
        echo "ISBN: {$this->isbn}\n";
        echo "Availability: " . ($this->availability ? "Available" : "Not Available") . "\n";
    }

    public function checkAvailability() {
        return $this->availability;
    }

    public function updateAvailability($status) {
        $this->availability = $status;
    }

    public function addToBorrowingHistory($memberId) {
        $this->borrowingHistory[] = $memberId;
    }

    public function getBorrowingHistory() {
        return $this->borrowingHistory;
    }

    private function setISBN($isbn) {
        if (preg_match("/^\d{3}-\d{10}$/", $isbn)) {
            $this->isbn = $isbn;
        } else {
            throw new Exception("Invalid ISBN format");
        }
    }
}

class LibraryMember {
    private static $maxBooksAllowed = 3;
    private $name;
    private $id;
    private $borrowedBooks = [];

    public function __construct($name, $id) {
        $this->name = $name;
        $this->id = $id;
    }

    public static function setMaxBooksAllowed($max) {
        self::$maxBooksAllowed = $max;
    }

    public function borrowBook(Book $book) {
        if (count($this->borrowedBooks) >= self::$maxBooksAllowed) {
            throw new Exception("Maximum books limit reached");
        }

        if (!$book->checkAvailability()) {
            throw new Exception("Book is not available for borrowing");
        }

        $book->updateAvailability(false);
        $this->borrowedBooks[] = $book;
        $book->addToBorrowingHistory($this->id);
    }

    public function returnBook(Book $book) {
        $key = array_search($book, $this->borrowedBooks);
        if ($key !== false) {
            unset($this->borrowedBooks[$key]);
            $book->updateAvailability(true);
        } else {
            throw new Exception("Book was not borrowed by this member");
        }
    }

    public function displayBorrowedBooks() {
        echo "Borrowed Books for {$this->name} (ID: {$this->id}): \n";
        foreach ($this->borrowedBooks as $book) {
            echo "- {$book->getTitle()} by {$book->getAuthor()}\n";
        }
    }
}

// Testing

try {
    // Create Books
    $book1 = new Book("Book 1", "Author 1", "Genre 1", "123-1234567890");
    $book2 = new Book("Book 2", "Author 2", "Genre 2", "456-0987654321");
    $book3 = new Book("Book 3", "Author 3", "Genre 3", "789-1234509876");

    // Create Library Members
    $member1 = new LibraryMember("Member 1", 1);
    $member2 = new LibraryMember("Member 2", 2);

    // Borrow Books
    $member1->borrowBook($book1);
    $member1->borrowBook($book2);
    $member2->borrowBook($book3);

    // Display Borrowed Books
    $member1->displayBorrowedBooks();
    $member2->displayBorrowedBooks();

    // Return Books
    $member1->returnBook($book1);
    $member2->returnBook($book3);

    // Display Updated Borrowed Books
    $member1->displayBorrowedBooks();
    $member2->displayBorrowedBooks();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}






?>