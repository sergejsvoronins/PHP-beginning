<?php


class UserView {

    public function renderAllUserAsClickableList (array $users):void {
        echo "<h2>Användare</h2>";
        echo "<ol>";
        foreach($users as $user){
            echo "<li>";
            echo "<a href='?user-id={$user->getId()}'>{$user->getFirstName()} {$user->getLastName()}</a>";
            echo "</li>";
        }
        echo "</ol>";
    }
    public function renderCreateButton () {
        echo "<a href='?create-user=new''>
            Skapa användare
        </a>";
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
        echo "<h2>Kommentarer</h2>";
        if(count($userComments)>0){
            echo "<ul>";
            foreach ($userComments as $uc) {
                echo "<li>{$uc["comment"]}</li>";
            }
            echo "</ul>";
        }
    }
    public function createSearchField () {
        echo "<form  action='users.php' method='POST'>
            <div>
                <input type='text' name='search-users' placeholder='Skriv namn här...'>
            </div>
            <button>Sök</button>
        </form>";
    }
    public function renderUsersMain(array $users) {
        echo "<main>";
            echo "<section>";
                echo $this->createSearchField();
            echo "</section>";
            echo "<section>";
                echo $this->renderCreateButton();
            echo "</section>";
            echo "<section>";
                echo $this->renderAllUserAsClickableList($users);
            echo "</section>";
        echo "</main>";
    }
    public function renderUserInfoMain ($user, $userComments) {
        echo "<main>";
            echo "<section>";
                echo "<p>{$user[0]->getFirstName()}</p>";
                echo "<p>{$user[0]->getLastName()}</p>";
                echo "<p>{$user[0]->getEmail()}</p>";
                echo "<p>{$user[0]->getMobile()}</p>";
            echo "</section>";
            echo "<section>";
                echo $this->renderAllUserComments($userComments);
            echo "</section>";
        echo "</main>";
    }
    public function renderUserFormMain () {
        echo "<main>";
            echo "<section>";
            echo $this->renderCreateUserForm();
            echo "</section>";
        echo "</main>";
    }
    
}