<?php


class UserBookView {

    public function renderAllUserBooksAsList(array $userBooks):void {
        echo "<ul>";
        foreach($userBooks as $userBook){
            echo "<li>Id: {$userBook['id']} Titel: {$userBook['title']} Sidor: {$userBook['pages']}</li>";
        }
        echo "</ul>";
    }
    public function renderAllBookCommentsAsList (array $userBooks, int $id) {
        echo "<h2>Kommentarer:</h2>";
        echo "<ul>";
        foreach($userBooks as $userBook){
            if($userBook["bookId"] == $id) {
                echo "<li>{$userBook["comment"]}</li>";
            }
        }
        echo "</ul>";
    }

}