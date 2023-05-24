<?php

class AuthorView {
    public function renderAllAuthors (array $authors) {
        echo "<ul>";
        foreach($authors as $author){
            echo "<li>{$author['first_name']} {$author['last_name']}</li>";
        }
        echo "<ul>";
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
            <a href='?create=new'>Skapa författare</a>
        </div>";
    }
}