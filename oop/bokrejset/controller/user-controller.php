<?php

class UserController
{
    private $model = null;
    private $view = null;

    public function __construct($userModel, $userView)
    {
        $this->model = $userModel;
        $this->view = $userView;
    }

    public function start()
    {
        if (isset($_GET['user-id'])) {
            $userId = filter_var($_GET['user-id'], FILTER_SANITIZE_NUMBER_INT);
            $this->view->renderUserInfoMain($this->model->getUser($userId), $this->model->getUserComments($userId));
        } 
        else if (isset($_GET['create-user'])){
            if($_GET['create-user'] =="new") {
                $this->view->renderUserFormMain();
            }
        }
        else {
            if(isset($_POST["search-users"])){
                $searchText = filter_var($_POST["search-users"], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $this->view->renderUsersMain($this->model->findUsers($searchText));
            }
            else {
                $this->view->renderUsersMain($this->model->getAllUsers());

            }
            
        }
    }
}