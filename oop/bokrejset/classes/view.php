<?php

class View {
    public function createSearchField ($table) {
        echo "<form  action='' method='POST'>
                <input method='POST' type='text' name='search-$table' placeholder='Skriv här...'>
                <button class='btn'>Sök</button>
                </form>";
    }
    public function renderCreateButton ($item) {
        echo "<a href='?create-{$item}=new'>Skapa ny</a>";
    }
}