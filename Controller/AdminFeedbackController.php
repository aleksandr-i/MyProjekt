<?php

class AdminFeedbackController extends Controller
{
    public function indexAction()
    {
        if (!Session::has('user')){
            Router::redirect('/login');
        }

        $feedbackModel = New FeedbackModel();
        $feedback = $feedbackModel->show();

        $args = array(
            'feedback' => $feedback,
        );

        return $this->render('index', $args);
    }
}