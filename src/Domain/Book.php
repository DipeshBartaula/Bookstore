<?php

namespace BookStore\Domain;

class Book
{
    private $isbn;
    private $title;
    private $author;
    private $available;

    public function __construct(string $title, string $author, int $isbn, int $available = 0)
    {
        $this->isbn = $isbn;
        $this->title = $title;
        $this->author = $author;
        $this->available = $available;
    }
    public function getIsbn(): int
    {
        return $this->isbn;
    }
    public function getTitle(): string
    {
        return $this->title;
    }
    public function getAuthor(): string
    {
        return $this->author;
    }
    public function isAvailable(): bool
    {
        return $this->available;
    }

    public function __toString(): string
    {
        $result = '<i>' . $this->title . '</i> - ' . $this->author;
        if (!$this->available) {
            $result .= ' <b>Not available </b>';
        }
        return $result;
    }

    public function getCopy(): bool
    {
        if ($this->available < 1) {
            return false;
        } else {
            $this->available--;
            return true;
        }
    }
    public function addCopy()
    {
        $this->available++;
    }
}

// $book = new Book();
// $book->title = "1984";
// $book->author = "George Orwell";
// $book->isbn = 349857398457;
// $book->available = 12;

$book3 = new Book("1984", "George Orwell", 9785267006323, 12);

// if ($book3->getCopy()) {
//     echo 'Here, your copy.';
// } else {
//     echo 'I am afraid that book is not available.';
// }
