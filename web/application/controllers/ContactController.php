<?php
require_once 'application/models/Entity/ContactModel.php';

class ContactController extends Zend_Rest_Controller{

	public function init(){

		header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    header('Content-type: application/json; charset=utf-8');

		$method = $_SERVER['REQUEST_METHOD'];
		switch ($method) {
		  case 'POST':
				if($_POST["_method"] == "new"){
					$mContact = new ContactModel();

					if(!empty($_POST["term"])){
						$term = $_POST["term"];
					}else{
						$term = null;
					}

					if(!empty($_POST["seller"])){
						$seller = $_POST["seller"];
					}else{
						$seller = null;
					}

					$mParam = array(
		      	'name' 	           => $_POST["name"],
		      	'identification'	 => $_POST["identification"],
		        'email'	           => $_POST["email"],
		      	'phonePrimary'     => $_POST["phonePrimary"],
		        'phoneSecondary'   => $_POST["phoneSecondary"],
		        'fax'              => $_POST["fax"],
		        "mobile"           => $_POST["mobile"],
		        "observations"     => $_POST["observations"],
		        'type'             => $_POST["type"],
		        "address"          => $_POST["address"],
		        'seller'           => $seller,
		        'term'             => $term,
		        'priceList'        => $_POST["priceList"],
		        "internalContacts" => $_POST["internalContacts"]
		      );
					$mParam = json_encode($mParam);
					$this->view->rs = $mContact->newContact($mParam);
				}else if($_POST["_method"] == "delete"){
					$mContact = new ContactModel();
					$this->view->rs = $mContact->deleteContact($_POST["id"]);
				}else if($_POST["_method"] == "put"){
					$mContact = new ContactModel();

					if(!empty($_POST["term"])){
						$term = $_POST["term"];
					}else{
						$term = null;
					}

					if(!empty($_POST["seller"])){
						$seller = $_POST["seller"];
					}else{
						$seller = null;
					}

					$mParam = array(
		      	'name' 	           => $_POST["name"],
		      	'identification'	 => $_POST["identification"],
		        'email'	           => $_POST["email"],
		      	'phonePrimary'     => $_POST["phonePrimary"],
		        'phoneSecondary'   => $_POST["phoneSecondary"],
		        'fax'              => $_POST["fax"],
		        "mobile"           => $_POST["mobile"],
		        "observations"     => $_POST["observations"],
		        'type'             => $_POST["type"],
		        "address"          => $_POST["address"],
		        'seller'           => $seller,
		        'term'             => $term,
		        'priceList'        => $_POST["priceList"],
		        "internalContacts" => $_POST["internalContacts"]
		      );
					$mParam = json_encode($mParam);
					$this->view->rs = $mContact->updateContact($mParam, $_POST["id"]);
				}
				break;
		  case 'GET':
				if(isset($_GET['id'])){
					$mContact = new ContactModel();
		      $this->view->rs = $mContact->getContact($_GET["id"]);
				}else{
					$mContact = new ContactModel();
					$this->view->rs = $mContact->getAllContact();
				}
		    break;
		  default:
		    $this->view->rs = $method;
		    break;
		}
	}

  public function indexAction(){
	}

  public function listAction(){
		$this->_forward('index');
	}

  public function getAction(){
		$this->_forward('index');
	}

	public function newAction(){
		$this->_forward('index');
	}

  public function postAction(){
		 $this->_forward('index');
  }

	public function editAction(){
		$this->_forward('index');
  }

  public function putAction(){
		$this->_forward('index');
  }

  public function deleteAction(){
		$this->_forward('index');
  }
}
