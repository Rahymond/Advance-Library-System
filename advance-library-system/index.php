<?php

echo "<strong>ADVANCE LIBRARY SYSTEM</strong><br><br>";


// Creating library-item class

class LibraryItem {
    public $title;
    public $author;
    private $isAvailable = true; 
    public static $bookCount = 0; 

    // using construct method to initialize title and author

    public function __construct($title, $author) {
        $this->title = $title;
        $this->author = $author;
    }


    //  creating borrowItem method
    public function borrowItem() {
        if ($this->isAvailable) {
            $this->isAvailable = false;
            self::$bookCount++;
        } else {
            echo "Item already borrowed.<br>";
        }
    }

    //  creating returnItem method
    public function returnItem() {
        if (!$this->isAvailable) {
            $this->isAvailable = true;
            self::$bookCount--;
        }
    }

    //  creating getStatus method
    public function getStatus() {
        return $this->isAvailable ? "Available" : "Not Available";
    }
}

// Book class extending LibraryItem and also adding extra property genre also modifying constructor to include genre
class Book extends LibraryItem {
    public $genre;

    public function __construct($title, $author, $genre) {
        parent::__construct($title, $author);
        $this->genre = $genre;
    }
}


// Magazine class extending LibraryItem and also adding extra property issueNumber also modifying constructor to include issueNumber
class Magazine extends LibraryItem {
    public $issueNumber;

    public function __construct($title, $author, $issueNumber) {
        parent::__construct($title, $author);
        $this->issueNumber = $issueNumber;
    }
}

// simulation
// Create 5 books and 3 magazines
echo "<strong>Books and Magazines Status After Some Books have Been Borrowed</strong><br>";
$book1 = new Book("PHP For Dummies", "ARis", "Programming");
$book2 = new Book("PHP Made Simple", "Abdulrahman Oyedeji", "Programming");
$book3 = new Book("Money Making Strategy", "Olawale Ishaq", "Business");
$book4 = new Book("The Loving Mother", "Ismat Olakunle", "Fiction");
$book5 = new Book("Code PHP Like A Pro", "ARis", "Programming");

$magazine1 = new Magazine("Davido Weds Chioma(CHIVIDO 2025)", "Vanguard", 1);
$magazine2 = new Magazine("KWAM  The Plane Stopper", "The Punch", 2);
$magazine3 = new Magazine("VODI Opens New Tailoring Company", "Vanguard", 3);

// Borrowing two book and two magazine
$book1->borrowItem();
$book5->borrowItem();
$magazine1->borrowItem();
$magazine2->borrowItem();

// Display the status of all items
echo "{$book1->title} by {$book1->author}: " . $book1->getStatus() . "<br>";
echo "{$book5->title} by {$book5->author}: " . $book5->getStatus() . "<br>";
echo "{$magazine1->title} by {$magazine1->author}: " . $magazine1->getStatus() . "<br>";
echo "{$magazine2->title} by {$magazine2->author}: " . $magazine2->getStatus() . "<br>";
// Display total borrowed items
echo "<br><strong>Total Borrowed Items From Library:</strong><br>";
echo "Total borrowed items: " . LibraryItem::$bookCount . "<br>";

// Returning  the borrowed book
$book1->returnItem();

// Displaying count again
echo "<br><strong>Library Status After Returning a Book:</strong><br>";
echo "Total borrowed items after return: " . LibraryItem::$bookCount . "<br>";
