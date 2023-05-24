<?php


class UserView {

    public function renderAllUsersAsList(array $users):void {
        echo "<ul>";
        foreach($users as $user){
            echo "<li>{$user['last_name']} (id: {$user['id']})</li>";
        }
        echo "</ul>";
    }

    public function renderAllUserAsClickableList (array $users):void {
        echo "<div class='user_list'>";
        echo "<ol>";
        foreach($users as $user){
            echo "<li>";
            echo "<a href='?id={$user["id"]}'>{$user["first_name"]} {$user["last_name"]}</a>";
            echo "</li>";
        }
        echo "</ol>";
        echo "</div>";
    }
    public function renderCreateButton () {
        echo "<div class='create_div'>
            <a href='?create=new'>Skapa användare</a>
        </div>";
    }
    public function renderCreateUserForm () {
        echo "<form action='form-handlers/user-form-handler.php' method='POST'>
            <div>
                <label for='first_name'>Förnamn:</label>
                <input type='text' id='first_name' name='first_name'>
            </div>
            <div>
                <label for='last_name'>Efternamn:</label>
                <input type='text' id='last_name' name='last_name'>
            </div>
            <div>
                <label for='email'>Epost:</label>
                <input type='email' id='email' name='email'>
            </div>
            <div>
                <label for='mobile'>Mobil:</label>
                <input type='number' id='mobile' name='mobile'>
            </div>
            <button>Skapa</button>
        </form>";
    }
    public function renderAllUserComments (array $userComments) {
        echo "<div>";
        echo "<h2>Kommentarer</h2>";
        if(count($userComments)>0){
            echo "<ul>";
            foreach ($userComments as $uc) {
                echo "<li>{$uc["comment"]}</li>";
                
            }
            echo "</ul>";
        }
        else {
            echo "<p>Finns inga kommentarer</p>";
        }
        echo "</div>";
    }

}