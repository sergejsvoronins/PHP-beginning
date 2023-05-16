<?php


class UserView {

    public function renderAllUsersAsList(array $users):void {
        echo "<ul>";
        foreach($users as $user){
            echo "<li>{$user['lastName']} (id: {$user['id']})</li>";
        }
        echo "</ul>";
    }

    public function renderAllUserAsClickableList (array $users):void {
        echo "<ul>";
        foreach($users as $user){
            echo "<li>";
            echo "<a href='?id={$user["id"]}'>{$user["lastName"]}</a>";
            echo "</li>";
        }
        echo "</ul>";
    }
}