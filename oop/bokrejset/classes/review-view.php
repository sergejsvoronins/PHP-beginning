<?php


class ReviewView {

    public function renderCreateReview ($users, $books) {
        echo "<form action='form-handlers/userbook-form-handler.php' method='POST'>
            <h3>Registrera din lästa bok</h3>
            <div>
                <label for='user_id'>Välj student:</label>
                <select name='user_id' id='user_id'>
                    <option value=''>--Välj från listan--</option>";
                    foreach($users as $user){
                        echo "<option value='{$user->getId()}'>{$user->getFirstName()} {$user->getLastName()}</option>";
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
                <textarea  id='comment' name='comment'>
                </textarea>
            </div>
            <button>Skapa</button>
        </form>";
    }
    public function renderReviewTableByPages (array $reviews) {
        echo "<h1>Resultattabell</h1>";
        echo "<table>";
            echo "<tr>";
                echo "<th>Plats</th>";
                echo "<th>Förnamn</th>";
                echo "<th>Efternamn</th>";
                echo "<th>Antal lästa böcker</th>";
                echo "<th>Antal lästa sidor</th>";
            echo "</tr>";
            for ($i=0; $i < count($reviews); $i++) { 
                echo "<tr>";
                    echo "<td>". $i+1 ."</td>";
                    echo "<td>{$reviews[$i]['first_name']}</td>";
                    echo "<td>{$reviews[$i]['last_name']}</td>";
                    echo "<td>{$reviews[$i]['books_amount']}</td>";
                    echo "<td>{$reviews[$i]['number_of_pages']}</td>";
            echo "</tr>";
            }
        echo "</table>";
    }
    public function renderReviewMain (array $users, array $books) {
        echo "<main>";
        echo "<section>";
            echo $this->renderCreateReview($users, $books);
        echo "</section>";
    echo "</main>";
    }

}