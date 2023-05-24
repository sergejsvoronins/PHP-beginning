<?php


class UserBookView {

    public function renderAllUserBooksAsList(array $userBooks):void {
        echo "<ul>";
        foreach($userBooks as $userBook){
            echo "<li>Id: {$userBook['id']} Titel: {$userBook['title']} Sidor: {$userBook['pages']}</li>";
        }
        echo "</ul>";
    }
    public function renderAllBookCommentsAsList (array $userBooks, int $id) {
        echo "<h2>Kommentarer:</h2>";
        echo "<ul>";
        foreach($userBooks as $userBook){
            if($userBook["book_id"] == $id) {
                echo "<li>{$userBook["comment"]}</li>";
            }
        }
        echo "</ul>";
    }
    public function renderCreateUserBookForm ($users, $books) {
        echo "<form action='form-handlers/userbook-form-handler.php' method='POST'>
            <h3>Registrera din lästa bok</h3>
            <div>
                <label for='user_id'>Välj student:</label>
                <select name='user_id' id='user_id'>
                    <option value=''>--Välj från listan--</option>";
                    foreach($users as $user){
                        echo "<option value='{$user['id']}'>{$user['first_name']} {$user['last_name']}</option>";
                    } 
                echo "</select>
                <a href='users.php'>Lägg till</a>
            </div>
            <div>
                <label for='book_id'>Välj bok:</label>
                <select name='book_id' id='book_id'>
                    <option value=''>--Välj från listan--</option>";
                    foreach($books as $book){
                        echo "<option value='{$book->getId()}'>{$book->getTitle()} {$book->getYear()}</option>";
                    } 
                echo "</select>
                <a href='books.php'>Lägg till</a>
            </div>
            <div>
                <label for='pages'>Antal sidor:</label>
                <input type='text' id='pages' name='pages'>
            </div>
            <div>
                <label for='comment'>Recension:</label>
                <textarea id='comment' name='comment'
                    rows='5' cols='33'>Skriv din recension här...
                </textarea>
            </div>
            <button>Skapa</button>
        </form>";
    }
    public function renderReviewTableByPages (array $reviewList) {
        echo "<h1>Resultattabell</h1>";
        echo "<table>";
            echo "<tr>";
                echo "<th>Plats</th>";
                echo "<th>Förnamn</th>";
                echo "<th>Efternamn</th>";
                echo "<th>Antal lästa böcker</th>";
                echo "<th>Antal lästa sidor</th>";
            echo "</tr>";
            for ($i=0; $i < count($reviewList); $i++) { 
                echo "<tr>";
                    echo "<td>". $i+1 ."</td>";
                    echo "<td>{$reviewList[$i]['first_name']}</td>";
                    echo "<td>{$reviewList[$i]['last_name']}</td>";
                    echo "<td>{$reviewList[$i]['books_amount']}</td>";
                    echo "<td>{$reviewList[$i]['number_of_pages']}</td>";
            echo "</tr>";
            }
        echo "</table>";
    }

}