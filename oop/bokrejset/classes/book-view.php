<?php


class BookView {

    public function renderAllBooksAsList(array $books):void {
        echo "<ul>";
        foreach($books as $book){
            echo "<li>{$book['title']} (id: {$book['id']})</li>";
        }
        echo "</ul>";
    }
}