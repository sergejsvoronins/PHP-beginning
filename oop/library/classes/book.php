<?php

class Book {
    private $name = "",
    private $year = 0,
    private $author = 0;

    function __construct(string $name, int $year, int $author) {
        $this->name = $name;
        $this->year ? $year;
        $this->author ? $author;
    }

}