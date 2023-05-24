<?php

// require 'book.php';
class BookView {

    public function renderAllBooksAsList(array $books):void {
        echo "<div class='books_container'>";
        foreach($books as $book){
            echo "<a href='book-info.php?id={$book->getId()}'>";
            echo "<div>{$book->getTitle()} ({$book->getYear()})</div>";
            echo "</a>";
        }
        echo "</div>";
    }
    public function renderAllBooksAsListWithCount(array $books):void {
        echo "<div class='books_container'>";
        foreach($books as $book){
            echo "<a href='book-info.php?id={$book['id']}'>";
            echo "<div>";
            echo "{$book['title']} ({$book['year']})";
            echo "<p>läst: {$book['students_count']} personer</p>";
            echo "</div>";
            echo "</a>";
        }
        echo "</div>";
    }
    public function renderSingleBook (array $books, int $id):void {
        foreach($books as $book){
            if($book->getId() == $id){
                echo "<h2>{$book->getTitle()}</h2>";
                echo "<h3>År: {$book->getYear()}</h3>";
            }
        }
    }
    public function createSearchField () {
        echo "<form class='search_form' action='books.php' method='POST'>
            <div>
                <input type='text' id='title' name='search-title' placeholder='Skriv boktitel här...'>
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
            <a href='?create=new'>Skapa en book</a>
        </div>";
    }
}
?>
