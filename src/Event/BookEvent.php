<?php

namespace App\Event;

use App\Entity\Book;
use Symfony\Contracts\EventDispatcher\Event;

class BookEvent extends Event
{
    public const NAME = 'book.order';

    public function __construct(private Book $book) {}

    public function getBook(): Book
    {
        return $this->book;
    }
}