<?php


class UserBookView {

    public function renderAllUserBooksAsList(array $userBooks):void {
        echo "<ul>";
        foreach($userBooks as $userBook){
            echo "<li>{$userBook['title']} (id: {$userBook['id']})</li>";
        }
        echo "</ul>";
    }
    
}