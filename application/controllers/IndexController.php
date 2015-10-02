<?php

class IndexController extends Zend_Controller_Action{

    public function init(){

    }

    public function indexAction(){
        $client = new Zend_Http_Client('http://api.dm/public/job');
        $jobs = $client->request()->getBody();
        $this->view->jobs = json_decode($jobs);
    }
    public function addAction(){
        $form = new Application_Form_Job();
        $form->submit->setLabel('Add');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $jobData = $this->getRequest()->getPost();
            if ($form->isValid($jobData)) {
                $jobData['createTime'] = new MongoDate();
                $jobData['modifyTime'] = new MongoDate();
                $client = new Zend_Http_Client('http://api.dm/public/job');
                $client->setMethod(Zend_Http_Client::POST);
                $client->setParameterPost($jobData);
                $client->request();
                $this->_helper->redirector('index');
            } else {
                $form->populate($jobData);
            }
        }
    }
    public function updateAction(){
        $form = new Application_Form_Job();
        $form->submit->setLabel('Update');
        $this->view->form = $form;
        if ($this->getRequest()->isPost()) {
            $jobData = $this->getRequest()->getPost();
            if ($form->isValid($jobData)) {
                $jobData['createTime'] = new MongoDate();
                $jobData['modifyTime'] = new MongoDate();
                $id = (int) $jobData['id'];
                $client = new Zend_Http_Client('http://api.dm/public/job/'.$id);
                var_dump($id);
                $client->setMethod(Zend_Http_Client::DELETE);
                $client->request();
                $client = new Zend_Http_Client('http://api.dm/public/job');
                $client->setMethod(Zend_Http_Client::POST);
                $client->setParameterPost($jobData);
                $client->request();
                $this->_helper->redirector('index');
            } else {
                $form->populate($jobData);
            }
        } else {
            $id = $this->_getParam('id');
            $client = new Zend_Http_Client('http://api.dm/public/job/'.$id);
            $job = json_decode($client->request()->getBody());
            $form->populate((array) $job);
        }
    }
    public function deleteAction(){
        if ($this->getRequest()->isPost()) {
            $del = $this->getRequest()->getPost('del');
            if ($del === 'Yes') {
                $id = $this->getRequest()->getPost('id');
                $client = new Zend_Http_Client('http://api.dm/public/job/'.$id);
                $client->setMethod(Zend_Http_Client::DELETE);
                $client->request();
            }
            $this->_helper->redirector('index');
        } else {
            $id = $this->_getParam('id');
            $client = new Zend_Http_Client('http://api.dm/public/job/'.$id);
            $job = $client->request()->getBody();
            $this->view->job = json_decode($job);
        }
    }
}