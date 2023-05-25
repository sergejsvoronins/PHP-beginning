<?php

class AuthorView {
    public function renderAllAuthors (array $authors) {
        foreach($authors as $author){
            echo "<a href='?author-id={$author->getId()}'>";
            echo "<div>{$author->getFirstName()} {$author->getLastName()}</div>";
            echo "</a>";
        }
    }
    public function renderSingleAuthor(array $author):void {

        echo "<h2>{$author[0]->getFirstName()}</h2>";
        echo "<h3>{$author[0]->getLastName()}</h3>";
    }

    public function renderCreateAuthorForm () {
        echo "<form action='form-handlers/author-form-handler.php' method='POST'>
            <div>
                <label for='first_name'>Förnamn:</label>
                <input type='text' id='first_name' name='first_name'>
            </div>
            <div>
                <label for='last_name'>Efternamn:</label>
                <input type='text' id='last_name' name='last_name'>
            </div>
            <button>Skapa</button>
        </form>";
    }
    public function renderCreateButton () {
        echo "<div class='create_div'>
            <a href='?create-author=new'>Skapa författare</a>
        </div>";
    }
    public function renderAuthorsMain(array $authors) {
        echo "<main>";
            echo "<section>";
                echo $this->createSearchField();
            echo "</section>";
            echo "<section>";
                echo $this->renderCreateButton();
            echo "</section>";
            echo "<section>";
                echo $this->renderAllAuthors($authors);
            echo "</section>";
        echo "</main>";
    }
    public function renderAuthorsFormMain () {
        echo "<main>";
            echo "<section>";
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
            <div>
                <input type='text' name='search-authors' placeholder='Skriv namn här...'>
            </div>
            <button>Sök</button>
        </form>";
    }
}