<?php

class AuthorView {
    public function renderAllAuthors (array $authors) {
        echo "<div>";
        foreach($authors as $author){
            echo "<a href='?author-id={$author->getId()}'>";
            echo "<div>{$author->getFirstName()} {$author->getLastName()}</div>";
            echo "</a>";
        }
        echo "</div>";
    }
    public function renderSingleAuthor(array $author):void {

        echo "<h2>{$author[0]->getFirstName()}</h2>";
        echo "<h3>{$author[0]->getLastName()}</h3>";
    }

    public function renderCreateAuthorForm () {
        echo "<form class='create_form' action='form-handlers/author-form-handler.php' method='POST'>";
        echo "<div>
                <label for='first_name'>Förnamn:</label>
                <input type='text' id='first_name' name='first_name'>
            </div>
            <div>
                <label for='last_name'>Efternamn:</label>
                <input type='text' id='last_name' name='last_name'>
            </div>";
        echo "<button class='btn'>Skapa</button>";
        echo "</form>";
    }
    public function renderCreateButton () {
        echo "<a href='?create-author=new'>Skapa ny</a>";
    }
    public function renderAuthorsMain(array $authors) {
        echo "<main>";
            echo "<section class='header_section'>";
                echo "<h1>Författare</h1>";
            echo "</section>";
            echo "<section class='search_section'>";
                echo $this->createSearchField();
            echo "</section>";
            echo "<section class='create_btn_section'>";
                echo $this->renderCreateButton();
            echo "</section>";
            echo "<section class='main_content'>";
                echo $this->renderAllAuthors($authors);
            echo "</section>";
        echo "</main>";
    }
    public function renderAuthorsFormMain () {
        echo "<main>";
            echo "<section class='header_section'>";
                echo "<h1>Lägg ny författare</h1>";
            echo "</section>";
            echo "<section class='create_form_section'>";
            echo $this->renderCreateAuthorForm();
            echo "</section>";
        echo "</main>";
    }
    public function renderOneAuthorMain (array $author) {
        echo "<main>";
            echo "<section>";
            echo $this->renderSingleAuthor($author);
            echo "</section>";
        echo "</main>";
    }
    public function createSearchField () {
        echo "<form  action='authors.php' method='POST'>
                <input type='text' name='search-authors' placeholder='Skriv namn här...'>
                <button class='btn'>Sök</button>
            </form>";
    }
}