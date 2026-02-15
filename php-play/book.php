<?php

class Book
{
    private string $title;
    private string $author;
    private int $price;
    private bool $isPublished;

    public function __construct(string $title, string $author, int $price, bool $isPublished)
    {
        $this->title = $title;
        $this->author = $author;
        $this->price = $price;
        $this->isPublished = $isPublished;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function getAuthor(): string
    {
        return $this->author;
    }
    public function getPrice(): int
    {
        return $this->price;
    }
    public function getIsPublished(): bool
    {
        return $this->isPublished;
    }
    public function setPrice(int $newPrice): void
    {
        $this->price = $newPrice;
    }
    public function isExpensive(): bool
    {
        return $this->price >= 3000;
    }
}

$studyBook = new Book("PHP入門", "山田太郎", 2800, true);
// var_dump($studyBook);

echo $studyBook->getPrice();
$studyBook->setPrice(3500);
echo $studyBook->getPrice();
var_dump($studyBook->isExpensive());