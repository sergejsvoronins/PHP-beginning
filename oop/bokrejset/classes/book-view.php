<?php

// require 'book.php';
class BookView {

    public function renderAllBooks(array $books):void {
        foreach($books as $book){
            echo "<a href='?book-id={$book->getId()}'>";
            echo "<div>{$book->getTitle()} ({$book->getYear()})</div>";
            echo "</a>";
        }
    }
    public function renderSingleBook (array $book):void {

                echo "<h2>{$book[0]->getTitle()}</h2>";
                echo "<h3>År: {$book[0]->getYear()}</h3>";
    }
    public function createSearchField () {
        echo "<form  action='books.php' method='POST'>
            <div>
                <input type='text' id='title' name='search-book' placeholder='Skriv boktitel här...'>
            </div>
            <button>Sök</button>
        </form>";
    }
    public function renderCreateBookForm (array $authors) {
        echo "<form action='form-handlers/book-form-handler.php' method='POST'>
            <div>
                <label for='title'>Titel</label>
                <input type='text' id='title' name='title'>
            </div>
            <div>
                <label for='year'>Publicerad:</label>
                <input type='text' id='year' name='year'>
            </div>
            <div>
                <label for='authors'>Författare:</label>
                <select name='author_id' id='authors'>
                    <option value=''>--Välj från listan--</option>";
                    foreach($authors as $author){
                        echo "<option value='{$author['id']}'>{$author['first_name']} {$author['last_name']}</option>";
                    } 
                echo "</select>
                <a href='authors.php?create=new'>Lägg till</a>
            </div>
            <button>Skapa</button>
        </form>";
    }

    public function renderCreateButton () {
        echo "<div class='create_div'>
            <a href='?create-book=new'>Skapa en book</a>
        </div>";
    }

    public function renderBooksMain(array $books) {
        echo "<main>";
            echo "<section>";
                echo $this->createSearchField();
            echo "</section>";
            echo "<section>";
                echo $this->renderCreateButton();
            echo "</section>";
            echo "<section>";
                echo $this->renderAllBooks($books);
            echo "</section>";
        echo "</main>";
    }
    public function renderBooksFormMain (array $authors) {
        echo "<main>";
            echo "<section>";
            echo $this->renderCreateBookForm($authors);
            echo "</section>";
        echo "</main>";
    }
    public function renderOneBookMain (array $book) {
        echo "<main>";
            echo "<section>";
            echo $this->renderSingleBook($book);
            echo "</section>";
        echo "</main>";
    }
}
?>
