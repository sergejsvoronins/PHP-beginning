<?php

class ReviewController
{
    private $model = null;
    private $view = null;

    public function __construct($reviewModel, $reviewView)
    {
        $this->model = $reviewModel;
        $this->view = $reviewView;
    }

    public function start(array $users, array $books):void {
    // {
    //     if (isset($_GET['review-id'])) {
    //         $reviewId = filter_var($_GET['review-id'], FILTER_SANITIZE_NUMBER_INT);
    //         $this->view->renderreviewInfoMain($this->model->getreview($reviewId), $this->model->getreviewComments($reviewId));
    //     } 
    //     else if (isset($_GET['create-review'])){
    //         if($_GET['create-review'] =="new") {
                $this->view->renderReviewMain($users, $books);
        //     }
        // }
        // else {
        //     if(isset($_POST["search-reviews"])){
        //         $searchText = filter_var($_POST["search-reviews"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        //         $this->view->renderreviewsMain($this->model->findreviews($searchText));
        //     }
        //     else {
        //         $this->view->renderreviewsMain($this->model->getAllreviews());

        //     }
            
        // }
    }
}