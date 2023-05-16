<?php

class UserBook extends DB {

    protected $table = "userbook";

    public function getAllUserBooks(){
        return $this->getAll($this->table);
    }
}