<?php


class UserView {

    public function renderAllUserAsClickableList (array $users):void {
        echo "<div>";
        foreach($users as $user){
            echo "<a href='?user-id={$user->getId()}'>";
            echo "<div>{$user->getFirstName()} {$user->getLastName()}</div>";
            echo "</a>";
        }
        echo "</div>";
    }
    public function renderCreateButton () {
        echo "<a href='?create-user=new'>Skapa ny</a>";
    }
    public function renderDeleteButton (int $id) {
        echo "<a href='?user-id={$id}&action=delete'>Ta bort</a>";
    }
    public function renderDeleteConfirmation () {
        echo "<main>";
            echo "<section class='main_content'>";
                echo "<h3>Användaren har blivit raderat</h3>";
                echo "<a href='users.php'>Tillbaka</a>";
            echo "</section>";
        echo "</main>";
    }
    public function renderCreateUserForm () {
        echo "<form action='form-handlers/user-form-handler.php' method='POST'>";
        echo "<div>
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
                </div>";
        echo "<button class='btn'>Skapa</button>";
        echo "</form>";
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
                <input method='POST' type='text' name='search-users' placeholder='Skriv namn här...'>
                <button class='btn'>Sök</button>
            </form>";
    }
    public function renderUsersMain(array $users) {
        echo "<main>";
            echo "<section class='header_section'>";
                echo "<h1>Användare</h1>";
            echo "</section>";
            echo "<section class='search_section'>";
                echo $this->createSearchField();
            echo "</section>";
            echo "<section class='create_btn_section'>";
                echo $this->renderCreateButton();
            echo "</section>";
            echo "<section class='main_content'>";
                echo $this->renderAllUserAsClickableList($users);
            echo "</section>";
        echo "</main>";
    }
    public function renderUserInfoMain (array $user, array $userComments,  int $id, array $completedBooksNum, array $completedPagesNum) {
        echo "<main class='details_section'>";
            echo "<section>";
                echo "<p>Förnamn: {$user[0]->getFirstName()}</p>";
                echo "<p>Efternamn: {$user[0]->getLastName()}</p>";
                echo "<p>Epost: {$user[0]->getEmail()}</p>";
                echo "<p>Mobil: {$user[0]->getMobile()}</p>";
                echo $this->renderDeleteButton($id);
            echo "</section>";
            echo "<section>";
                echo "<h2>Antal böcker har läst</h2>";
                if($completedBooksNum!=null){
                    echo "<span>{$completedBooksNum[0]['completed_books']}</span>"; 
                }
            echo "</section>";
            echo "<section>";
                echo "<h2>Antal sidor har läst</h2>";
                if($completedPagesNum!=null){
                    echo "<span>{$completedPagesNum[0]['completed_pages']}</span>";
                }
            echo "</section>";
            echo "<section>";
                echo $this->renderAllUserComments($userComments);
            echo "</section>";
        echo "</main>";
    }
    public function renderUserFormMain () {
        echo "<main>";
            echo "<section class='header_section'>";
                echo "<h1>Lägg ny användare</h1>";
            echo "</section>";
            echo "<section class='create_form_section'>";
            echo $this->renderCreateUserForm();
            echo "</section>";
        echo "</main>";
    }
    
}