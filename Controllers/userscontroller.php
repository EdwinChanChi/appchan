<?php
/**
<<<<<<< HEAD
 *@author Edwin Martin Chan Chi <edwinchan2@hotmail.com>
* Clase User que hereda de la clase principal AppController.
=======
 *@author Cointo Amador Barrera Cortés <rockstarcointo@gmail.com>
 *Clase User que hereda de la clase principal AppController.
 *Clase para agregar y editar un usuario.
>>>>>>> origin/master
**/
	class User  extends AppController{
		/**
		 * Función construct.
		 * Inicializa las variables heredadas a utilizar.
		**/
		public function __construct(){
			parent::__construct();
		}
		/**
	 	 * Función index.
<<<<<<< HEAD
=======
	 	 * Se visualizarán los usuarios que se han creado, así como la opción de agregar, editar y eliminar usuario.
>>>>>>> origin/master
	 	 * @param $users Para visualizar los usuarios.
		**/
		public function index(){
			$users = $this->User->find("users","all");
			$this->set("users",$users);
		}
		/**
		 * Función edit.
<<<<<<< HEAD
=======
		 * Para editar cualquier usuario creado anteriormente.
>>>>>>> origin/master
		 * @param $id El id del usuario que se va a modificar.
		**/
		public function edit($id = null){
			if($_POST){
				$filter = new Validations();
				$pass = new Password();
			
				$_POST["password"] = $filter->sanitizeText($_POST["password"]);
				$_POST["password"] = $pass->getPassword($_POST["password"]);
			
				if($this->User->update("users", $_POST)){
<<<<<<< HEAD
=======
					
>>>>>>> origin/master
					$this->redirect(array("controller"=>"users","action"=>"index"));
				}else{
					$this->redirect(array("controller"=>"users","action"=>"edit"));
				}
			}
			$user = $this->User->find("users","first",
			array(
				"conditions"=>"users.id=$id"
			));
			$this->set("user", $user);
		}
		/**
	 	 * Función add.
		 * Función que sirve para agregar un nuevo usuario.
		**/
		public function add(){
			if($_POST){
				if($this->User->save("users", $_POST)){
<<<<<<< HEAD
					
=======
					$this->sendMail($_POST['email'],$_POST['first_name']);
>>>>>>> origin/master
					$this->redirect(array("controller"=>"users","action"=>"index"));
				}else{
					$this->redirect(array("controller"=>"users","action"=>"add"));
				}
			}
		}
		/**
		* Función delete.
		*
<<<<<<< HEAD
		* Función para eliminar usuarios de la base de datos.
		* @param  $id Se localiza el usuario a eliminar.
=======
		* Función que sirve para eliminar usuarios de la base de datos.
		* @param  $id Identifica el usuario a eliminar.
>>>>>>> origin/master
		**/
		public function delete($id){
			if($this->User->delete("users", $id)){
				$this->redirect(array("controller"=>"users","action"=>"index"));
			}
			$user = $this->User->find("users","all",
			array(
				"conditions"=>"users.id=$id"
			));
			$this->set("user", $user);
		}
		/**
		* Función login.
		* Función que sirve para iniciar sesión.
		**/
		public function login(){
			if($_POST){
				$pass = new Password();
				$filter = new Validations();
				$auth = new Authorization();
				
				$username = $filter->sanitizeText($_POST["username"]);
				$password = $filter->sanitizeText($_POST["password"]);
				
				$options['conditions'] = "username = '$username'";
				$user = $this->User->find("users", "first", $options);
				
				if($pass->isValid($password, $user['password'])){
					$auth->login($user);
					$this->redirect(array("controller"=>"users","action"=>"index"));
				}else{
					echo "usuario invalido";
				}
			}
		}
		/**
		* Función login.
		* Función que sirve para iniciar sesión.
		**/
		public function logout(){
			$auth = new Authorization();
			$auth->logout();
		}
<<<<<<< HEAD
		
=======
		/**
		* Función delete.
		*
		* Función que sirve para eliminar usuarios de la base de datos.
		* @param  $email Identifica el correo del usuario.
		* @param  $name Identifica el nombre del usuario.
		* @return Mensaje enviado o no enviado
		**/
		public function sendMail($email,$name){
			$mail = new PHPMailer;
			$mail->From = 'team@app.com';
			$mail->FromName = 'App Team';
			$mail->addAddress($email, $name);     // Add a recipient
			
			$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
			$mail->isHTML(true);                                  // Set email format to HTML
			
			$mail->Subject = 'Welcome to App';
			$mail->Body    = 'You are now part of the great world of <b>APP!</b>';

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
		}
>>>>>>> origin/master
	}