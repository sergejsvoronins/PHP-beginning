<?php

class BookModel extends DB {

    protected $table = "books";

    public function getAllBooks(){
        return $this->getAll($this->table);
    }
}