<?php


class BookView {

    public function renderAllBooksAsList(array $books):void {
        echo "<ul>";
        foreach($books as $book){
            echo "<li>";
            echo "<a href='book.php?id={$book["id"]}'>{$book["title"]} ({$book["year"]})</a>";
            echo "</li>";
        }
        echo "</ul>";
    }
    public function renderSingleBook (array $books, int $id):void {
        foreach($books as $book){
            if($book["id"] == $id){
                echo "<h2>{$book["title"]}</h2>";
                echo "<h3>År: {$book["year"]}</h3>";
            }
        }
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
            </div>
            <button>Skapa</button>
        </form>";
    }
}
?>
