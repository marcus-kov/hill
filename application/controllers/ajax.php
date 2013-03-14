<?php
/********************************************************
*  		Class handels AJAX cals 
*  		form newsletter and kontakt form
*********************************************************/
class Ajax extends CI_Controller
{
	private $_userName = "admin";
	private $_password = "qwerty";
    private  $is_admin;



	/**
	*Adding news to DB
	*@param title   (string )
	*@param category ( int )
	*@param text   ( string )
	*@author Marko Kovacevic
	*@return boolean
	*/

	public function add_news()
	{
		$title 	  = (string)$this->input->post("title");
		$text     = (string)$this->input->post("text");
		$category = implode(', ', $this->input->post("category"));

		echo $category;die();

		$data['success'] = $this->admin_model->add_news( $title, $text, $category );

		echo json_encode($data);
	}
	
	/**
	*Retrives news for admin panel
	*@return array
	*@author Marko Kovacevic
	*/
	public function update()
	{
		$id   = (int)$this->input->post("news_id");

		$data = $this->admin_model->get_news($id);

		echo json_encode($data);
	}
	/**
	*Update news to DB
	*@param newsID   (int)
	*@author Marko Kovacevic
	*@return boolean
	*/
	public function update_news()
	{

		$title 	  = (string)$this->input->post("title");
		$text     = (string)$this->input->post("text");
		$category = (int)$this->input->post("category");
		$news_id  = (int)$this->input->post("newsID");


		$data['success'] = $this->admin_model->update_news( $title, $text, $category, $news_id );

		echo json_encode($data);
	}

	/**
	*Delete news from DB
	*@param newsID   (int)
	*@author Marko Kovacevic
	*@return boolean
	*/

	public function delete()
	{
		$id = (int)$this->input->post("newsID");

		$data['success'] = $this->admin_model->delete_news( $id );

		echo json_encode($data);
	}

	/**
	*Adds new user to DB
	*@param mail (string)
	*@param name (string)
	*@return boolean
	*@author Marko Kovacevic
	*/
	public function add_mail()
	{
		$mail  = (string)$this->input->post("mail");
		$name  = (string)$this->input->post("name");
		$title = (string)$this->input->post("title"); 

		$data ['success'] = $this->admin_model->add_mail($mail, $title." ".$name);

		echo json_encode($data);
	}


	/**
	*Sends data from conntact form to app client
	*@param Titel (string)
	*@param Name
	*@param Email
	*@param Personenanzahl( string ) *translation ( number of people )
	*@param Specielle Wunsche ( string ) *translation (special wishes)
	*@param Telefon ( string )
	*@param Uhrzeit ( string ) *translation ( time of day )
	*@param Datum   ( char   ) 
	*@param Raucher ( string ) *translation ( smoking? )
	*@param 
	*/


	public function send_mail()
	{
		$query = $_POST['data'];
			
			foreach (explode('&', $query) as $chunk) {
			    $param = explode("=", $chunk);

			    if($param)
			    {
			    	$form_data[]=urldecode($param[1]);
			    }
			}
//data for mail
			$titel    = $form_data[0];
			$name     = $form_data[1];
			$email    = $form_data[2];
			$num_p    = $form_data[3];
			$spec_w   = $form_data[4];
			$phone    = $form_data[5];
			$tod      = $form_data[6];
			$date     = $form_data[7];
			$smoking  = $form_data[8];
			$comments = $form_data[9];
//mail functions

			$config = Array(
			'protocol' => 'smtp',
	        'smtp_host' => 'ssl://smtp.googlemail.com',
	        'smtp_port' => 465,
	        'smtp_user' => 'pyrophp@gmail.com',
	        'smtp_pass' => '061829mare',
	        'mailtype'  => 'html', 
	        'charset' => 'utf-8',
	        'wordwrap' => TRUE

	    );

			$message = "Email sent from :".$email."\n with name :".$titel." ".$name;
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

			$this->email->from('pyrophp@gmail.com', $titel." ".$name);
			$this->email->to('marebg88@yahoo.com'); 
			//$this->email->cc('another@another-example.com'); 
			//$this->email->bcc('them@their-example.com'); 

			$this->email->subject('Email Test');
			$this->email->message($message);	

			// $this->email->send();

			if($this->email->send())
 {
 echo 'Your email was sent, fool.';
 }

 else
 {
 show_error($this->email->print_debugger());
 }
	}

        /**
         * PDF's
         * 
         */
	public function pdf_upload_1()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files1']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files1']['name'];
                                $filename = $_FILES["files1"]["name"];

				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files1']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
					rename ( $targetPath."/".$filename, $targetPath."/Blounge-speisekarte.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}
	public function pdf_upload_2()
	{
		

		$targetFolder = '/pdf'; // Relative to the root


			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files2']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files2']['name'];
				$filename = $_FILES["files2"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files2']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
				
					rename ( $targetPath."/".$filename, $targetPath."/Blounge-weinkarte.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}
	public function pdf_upload_3()
	{
		

		$targetFolder = '/pdf'; // Relative to the root

	
			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files3']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files3']['name'];
                $filename = $_FILES["files3"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files3']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
					unlink($targetPath."/file3.jpg");
					rename ( $targetPath."/".$filename, $targetPath."/Hill-silvestermenu.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}
     
        public function pdf_upload_4()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files4']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files4']['name'];
                $filename = $_FILES["files1"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files4']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
			
					rename ( $targetPath."/".$filename, $targetPath."/Hill-speisekarte.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}
        public function pdf_upload_5()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files5']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files5']['name'];
                $filename = $_FILES["files5"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files5']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
	
					rename ( $targetPath."/".$filename, $targetPath."/Hill-spirituosenkarte.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}
        public function pdf_upload_6()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files6']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files6']['name'];
                $filename = $_FILES["files1"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files6']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
				
					rename ( $targetPath."/".$filename, $targetPath."/Hill-spirituosenkarte.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}
        public function pdf_upload_7()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files7']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files7']['name'];
                                $filename   = $_FILES["files7"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files7']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
				
					rename ( $targetPath."/".$filename, $targetPath."/Hill-valentinstag.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}public function pdf_upload_8()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files8']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files8']['name'];
                $filename = $_FILES["files8"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files8']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
				
					rename ( $targetPath."/".$filename, $targetPath."/Hill-weinkarte.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}
        
        public function pdf_upload_9()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files9']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files9']['name'];
                $filename = $_FILES["files9"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files1']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
					unlink($targetPath."/file9.jpg");
					rename ( $targetPath."/".$filename, $targetPath."/Menagerie-weinkarte.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}public function pdf_upload_10()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files10']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files10']['name'];
                $filename = $_FILES["files1"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files10']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
					
					rename ( $targetPath."/".$filename, $targetPath."/Menagerie-speisekarte.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}public function pdf_upload_11()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files11']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files11']['name'];
                $filename = $_FILES["files11"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files11']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
				
					rename ( $targetPath."/".$filename, $targetPath."/Menagerie-weinkarte.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}public function pdf_upload_12()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files12']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files12']['name'];
                $filename = $_FILES["files12"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files12']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
					
					rename ( $targetPath."/".$filename, $targetPath."/Mumok-abendmenu.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}public function pdf_upload_13()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files13']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files13']['name'];
                $filename = $_FILES["files13"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files13']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
					
					rename ( $targetPath."/".$filename, $targetPath."/Mumok-mittagslunch.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}public function pdf_upload_14()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files14']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files14']['name'];
                $filename = $_FILES["files14"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files14']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
					
					rename ( $targetPath."/".$filename, $targetPath."/Mumok-silvestermenu.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}public function pdf_upload_15()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files15']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files15']['name'];
                $filename = $_FILES["files15"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files15']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
				
					rename ( $targetPath."/".$filename, $targetPath."/Mumok-speisekarte.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}
        public function pdf_upload_16()
	{
		
            $targetFolder = '/pdf'; // Relative to the root

			if (!empty($_FILES))
			{
				$tempFile   = $_FILES['files16']['tmp_name'];
				$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
				$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['files16']['name'];
                $filename = $_FILES["files16"]["name"];
				
				// Validate the file type
				$fileTypes = array('jpg','jpeg','gif','png','pdf'); // File extensions
				$fileParts = pathinfo($_FILES['files16']['name']);
				
				if (in_array($fileParts['extension'],$fileTypes)) 
				{
					move_uploaded_file($tempFile,$targetFile);
					//delete file
					
					rename ( $targetPath."/".$filename, $targetPath."/Menagerie-weinkarte.pdf" );
					echo json_encode('1');
				} else {
					echo 'Invalid file type.';
				}
			}
	}
      
	

	public function logIn()
	{
		$userName  = $this->input->post("userName");
		$password  = $this->input->post("password");
		$json['success'] = false;

		if(($userName == $this->_userName) && ($password == $this->_password))
		{

			//set session data to admin
			$is_admin = array("admin"=>"true");

			$this->session->set_userdata($is_admin);
			$json['success'] = true;

			
		}
		
		echo json_encode($json);
	}
	public function logOut()
	{
		$this->session->unset_userdata('admin');
	}

	public function add_comment()
	{
		$titel    = $this->input->post( "titel");
        $name     = $this->input->post( "name");
        $email    = $this->input->post( "email");
        $comment  = $this->input->post( "comment" );

        $data['success'] = $this->admin_model->add_comment( $email, $titel." ".$name, $comment );

        echo json_encode($data);
	}
    public function approve()
    {
        $id = $this->input->post("id");

        $data['success'] = $this->admin_model->approve_comment($id);
        echo json_encode($data);
    }
    public function  decline()
    {
        $id = $this->input->post("id");

        $data['success'] = $this->admin_model->delete_comment($id);

        echo json_encode($data);
    }
}