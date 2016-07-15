<?php

class IndexController extends Controller
{
    public function indexAction(Request $request)
    {
        $args = array(
            'number' => 4324,
            'name' => 'Mike'
        );
        return $this->render('index', $args);
    }
    public function contactAction(Request $request)
    {
        $flashMessage = $request->get('flash'); // $_GET['flash']
        $form = new ContactForm($request);
                
        if ($request->isPost()) {
            if ($form->isValid()) {
                $feedbackModel = new FeedbackModel();
                $datetime = (new DateTime())->format('Y-m-d H:i:s');
                $ip_adress = $_SERVER['REMOTE_ADDR'];

                $feedbackModel->save(array(
                    'username' => $form->username,
                    'email' => $form->email,
                    'message' => $form->message,
                    'created' => $datetime,
                    'ip_adress' => $ip_adress,
                ));
                $flashMessage = 'Success';
                
                // todo: function redirect($to)
                Router::redirect('/index.php?route=index/contact&flash=' . $flashMessage);
            }
            $flashMessage = 'Error';
        }
        $args = array(
            'form' => $form,
            'flashMessage' => $flashMessage
        );
        return $this->render('contact', $args);
    }
}