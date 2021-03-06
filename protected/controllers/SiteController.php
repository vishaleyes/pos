<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public $msg;
	public $errorCode;
	private $arr = array("rcv_rest" => 200370,"rcv_rest_expire" => 200371,"send_sms" => 200372,"rcv_sms" => 200373,"send_email" => 200374,"todo_updated" => 200375, "reminder" => 200376, "notify_users" => 200377,"rcv_rest_expire"=>200378,"rcv_android_note"=>200379,"rcv_iphone_note"=>200380);
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
		
	}
	

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	 
	public function actionIndex()
	{
		if(isset(Yii::app()->session['userId']))
		{
			$this->redirect(Yii::app()->params->base_path."user/index");
				exit;
		}
		else
		{			
			$options	=	array();
			$genralObj	=	new General();
			$options	=	$genralObj->getTimeZones();
			
			$site=_SITENAME_NO_CAPS_;
			Yii::app()->session['loginflag']	=	0;
			$this->render('index',array('site'=>$site, 'timezone'=>$options));
		}
	}
	
	/*********** 	Checking Email address  ***********/ 
	function actionchkEmail($type=NULL)
	{
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') 
		{
			
			if($type != NULL)
			{
				$loginObj = new Login();
				$userId='-1';
				if(isset(Yii::app()->session['loginId']))
				{
					$userId=Yii::app()->session['loginId'];	
				}

				$result=$loginObj->chkemail($_REQUEST['email'],$userId);
				
				if($result!='')
				{				
					echo true;
				}
				else
				{
					echo false;
				}
			}
		}
		
	}
	public function actionChangeStatus()
	{
		if(isset($_GET['url']))
		{
			$algObj = new Algoencryption();
			$id = $algObj->decrypt($_GET['url']);
			$status	=	1;
			$invitesObj	=	new Invites();
			$invitesObj->changeStatus($id, $status);
			Yii::app()->user->setFlash("success",$this->msg['_INVITE_ACCEPT_']);
			$this->redirect('index.php?r=muser/index');
            exit;
		}
	}
	

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}
	
	public function actionMerror()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('merror', $error);
	    }
	}

	function loginRedirect()
	{
		if(isset(Yii::app()->session['userId']))
		{
			$this->redirect(Yii::app()->params->base_path."user");
			exit;
		}
	}

	

	public function actionAbout()
	{
		if(!$this->isAjaxRequest())
		{
			$this->render('about');
		}
		else
		{
			$this->renderPartial('about');
		}

	}	
	
	public function actionSms()
	{

			$this->render('sms');

	}	
	
	public function actionMobile()
	{
		if(!$this->isAjaxRequest())
		{
			$this->render('mobile');
		}
		else
		{
			$this->renderPartial('mobile');
		}
			
		
	}	
	
	public function actionTos()
	{
		if(!$this->isAjaxRequest())
		{
			$this->render('termscondition');
		}
		else
		{
			$this->renderPartial('termscondition');
			
		}
		
	}	
	
	public function actionSetting()
	{
		if(!$this->isAjaxRequest())
		{
			$this->render('setting');
		}
		else
		{
			$this->renderPartial('setting');
		}
		
	}	
	
	public function actionPrivacy()
	{
		if(!$this->isAjaxRequest())
		{
			$this->render('privacy');
		}
		else
		{
			$this->renderPartial('privacy');
		}
	
	}
	
	public function actionSignin()
	{
		$this->loginRedirect();
		$model=new Login();
		if(isset(Yii::app()->session['loginId']))
		{
				$this->redirect(Yii::app()->params->base_path."user/index");
				exit;
		}
		if(isset($_POST['LoginForm']))
		{
			$this->actionlogin();		
		}
		if(isset($_REQUEST['todoId']) && $_REQUEST['todoId']!='')
		{					
			Yii::app()->session['todoId']=$_REQUEST['todoId'];
		}
		Yii::app()->session['loginflag']	=	1;
		$this->render('signin',array('model'=>$model));
	}
	
	public function actionSupport()
	{
		$this->loginRedirect();
		$this->render('help');
			
	}
	
	public function actionHelpType()
	{
		$this->loginRedirect();
		if(isset($_POST['help']) && $_POST['help']=="forgot_password")
		{		
			$data = array('loginId'=>'');
			$this->render('forgot_password',$data);	
		}
		else if(isset($_POST['help']) && $_POST['help']=="activate")
		{
			$data = array('loginId'=>'');
			$this->render('activate',$data);
		}
		else
		{
			$data = array('name'=>'','email'=>'','comment'=>'','ajax'=>'');
			$this->render('contactus',$data);
		}
	}
	
	/**
	 * Displays the contact page
	 */
	
	/*********** 	Employer Seeker email verification  function  ***********/ 
	public function actionVerifyAccount($key,$id,$lng='eng')
	{
		error_reporting(E_ALL);
		global $msg;
		Yii::app()->session['prefferd_language']=$lng;
		if($key=='' || $id=='')
		{	
			Yii::app()->user->setFlash('error', $msg['MISSING_PARAMETER']);
			$this->redirect(Yii::app()->params->base_path."user/index");
		}
		
	 	$userObj	=	new Users();
		$loginObj	=	new Login();
		$status	=	$loginObj->verifyaccount($key,$id);
		if($status == 1)
		{
			if( !is_numeric($id) ){
				$algoObj= new Algoencryption();
				$pid=$algoObj->decrypt($id);
			} else {
				$pid= $id;
			}
			
			$result_user = $loginObj->getLoginIdById($pid);
			
			Yii::app()->user->setFlash('success', $msg['VERIFY_LOG_MSG']);
			$this->render('signin', array('data'=>$result_user));
		}
		else if($status == 2)
		{
			Yii::app()->user->setFlash('error', $msg['LOGIN_MSG']);
			$this->redirect(Yii::app()->params->base_path."site/signin");
		} 
		else if($status == 3)
		{
			Yii::app()->user->setFlash('error', $msg['FAIL_MSG']);
			$this->redirect(Yii::app()->params->base_path."site/signin");
		}
		else
		{
			Yii::app()->user->setFlash('error', $msg['_ACTIVATION_LINK_EXPIRE_']);
			$this->redirect(Yii::app()->params->base_path."site/signin");
		}
	}
	
	
		
	function actionPrefferedLanguage($lang='eng')
	{
		if(isset(Yii::app()->session['userId']) && Yii::app()->session['userId']>0)
		{
			//$userObj=new User();
			//$userObj->setPrefferedLanguage(Yii::app()->session['userId'],$lang);
		}
		
		Yii::app()->session['prefferd_language']=$lang;
		//Yii::app()->language = Yii::app()->user->getState('_lang');
		$this->redirect(Yii::app()->params->base_path."site/index");
	}
	
	/*********** 	Redirecting to Main signUp page   ***********/ 
	function actionsignUpMain($admin=NULL)
	{
		error_reporting(E_ALL);
		$this->loginRedirect();
		global $msg;
		$Yii=Yii::app();
		if($this->isLogin())
		{
			header("location:".BASE_PATH);
			exit;
		}
		if(isset($_GET['userId']) && $_GET['userId'] != '' && isset($_GET['listId']) && $_GET['listId'] != '')
		{
			Yii::app()->session['userIdForNetwork'] = $_GET['userId'];
			Yii::app()->session['listId'] = $_GET['listId'];
			
		}
		$userObj=new Users();
		$algObj = new Algoencryption();	
		$_POST['agreementAccepted']= $algObj->encrypt(1);
		
		if((isset($_POST['fName'])) && $_POST['fName']==$msg['_FIRST_NAME_'])
		{
			$_POST['fName']='';
		}			
		if((isset($_POST['lName'])) && $_POST['lName']==$msg['_LAST_NAME_'])
		{
			$_POST['lName']='';
		}
		if((isset($_POST['email'])) && $_POST['email']==$msg['_EMAIL_'])
		{
			$_POST['email']='';
		}
		if((isset($_POST['phoneNumber'])) && $_POST['phoneNumber']==$msg['_PHONE_NUMBER_'])
		{
			$_POST['phoneNumber']='';
		}
		if(isset($admin))
		{
			$_POST['admin'] = $admin;
		}

		$genralObj	=	new General();
		$timezone	=	$genralObj->getTimeZones();
		$data=array('$_POST'=>$_POST);
		$data['timezone'] = $timezone;
		
		$this->render("signup",$data);
	}
	
	/*********** 	Submiting User data   ***********/ 
	function actionSignUp()
	{
		//error_reporting(E_ALL);
		$this->loginRedirect();
		global $msg;	
		$userObj=new Users();
		$validator = new FormValidator();	
		$returnValue=$_POST;
		Yii::app()->session['seeker']=$returnValue;
		$captcha = Yii::app()->getController()->createAction('captcha');
		if(!empty($_POST))
		{
			$validationOBJ = new Validation();
			if(!$captcha->validate($_POST['verifyCode'],1))
			{
				Yii::app()->user->setFlash('error', Yii::app()->params->msg['_INVALID_CAPTCHA_']);
				$this->actionsignUpMain();
				exit;
			}			
			
			if($validator->ValidateForm())
			{
				$result = $validationOBJ->signup($_POST);
				
			}
			else
			{
				$error_hash = $validator->GetError();
				$result = array('status'=>$this->errorCode[$error_hash],'message'=>$this->msg[$error_hash]);
				Yii::app()->user->setFlash('error', $this->msg[$error_hash]);
				$this->redirect(Yii::app()->params->base_path."site/signUpMain");
				exit;	
			}

			if($result['status'] == 0)
			{
				$_POST['userIdForNetwork'] = Yii::app()->session['userIdForNetwork'];
				$_POST['listId'] = Yii::app()->session['listId'];
				Yii::app()->session['userIdForNetwork'] = '';
				Yii::app()->session['listId'] = '';
				//Add user entry
				$userResponse	=	$userObj->addRegisterUser($_POST);
				
				if($userResponse['status'] == 0)
				{
					
					Yii::app()->user->setFlash('success', $userResponse['message']);
					unset(Yii::app()->session['userId']);
					
					if(isset(Yii::app()->session['adminUser']) && Yii::app()->session['adminUser']!='' && isset($_POST['admin']) && $_POST['admin']!=''){
						Yii::app()->user->setFlash('success',$userResponse['message']);	
						?>
							<script>
                            window.opener.location.href = window.opener.location.href;
                            window.close();
                            </script>
						<?php
					}else{
						Yii::app()->user->setFlash('success',$userResponse['message']);
						$this->redirect(Yii::app()->params->base_path."site/verifyPhone");	
					}
				}
				else
				{	
					Yii::app()->user->setFlash('error', $userResponse['message']);
					if(isset($_POST['admin']) && $_POST['admin']=='admin')
					{
						$this->redirect(Yii::app()->params->base_path."site/signUpMain/type/Seeker/admin/admin");
						exit;
					}else
					{
						$this->actionsignUpMain('Seeker');
						exit;
					}
				}	
			}
			else
			{
				Yii::app()->user->setFlash('error',$result['message']);
				$this->actionsignUpMain();exit;
			}
		
		}
		else
		{
			if(isset($_POST['admin']) && $_POST['admin']=='admin'){
				$this->redirect(Yii::app()->params->base_path."site/signUpMain/type/Seeker/admin");
				exit;
			}
			else
			{
				$this->redirect(Yii::app()->params->base_path."site/signUpMain");
				exit;
			}
		}
	}
	
	function actionverifyPhone()
	{
		$this->render("verify_phone");
	}
	function actionLogin()
	{
		error_reporting(E_ALL);
		$this->loginRedirect();
		/***********		Login		************/
		if(isset($_POST['submit_login']))
		{
			$remember=0;
			if(isset($_POST['remenber']))
			{
				$remember=1;
			}
			
			$email_login = $_POST['email_login'];
			$password_login = $_POST['password_login'];
			
			$Userobj=new Users();		
			$result = $Userobj->login(trim($email_login),$password_login,$remember);
			
			/*echo "<pre>";
			print_r($result);
			exit;*/
			
			if($result['status'] == 0)
			{
				/*echo "success";
				exit;*/
				header('location:'.Yii::app()->params->base_path.'user/Welcome');
				exit;
			}
			else
			{
				Yii::app()->user->setFlash('error', $result['message']);
				$this->redirect(Yii::app()->params->base_path.'site/signin');
			}
		}
		else
		{
			header('location:'.Yii::app()->params->base_path.'site/index');
		}	
		exit;
	}
	function actionContactus($ajax=0)
	{	
		$result['message']='';	
		$captcha = Yii::app()->getController()->createAction('captcha');
		if(isset($_POST['FormSubmit']))
		{			
			if($captcha->validate($_POST['verifyCode'],1)) {
					$validationOBJ = new Validation();
					$result = $validationOBJ->contactUs($_POST);
					if($result['status']==0)
					{
						$userObj=new Users();
						$result=$userObj->contactus($_POST,0,Yii::app()->session['prefferd_language']);
						if($result['status']==0)
						{
							Yii::app()->user->setFlash('success', $result['message']);
						}else{
							Yii::app()->user->setFlash('error', $result['message']);
							$this->render("contactus");
							exit;
						}
					}
					else
					{
						Yii::app()->user->setFlash('error', $result['message']);
						$data = array('name'=>$_POST['name'],'email'=>$_POST['email'],'comment'=>$_POST['comment'],'message'=>$result['message']);
						$this->render("contactus",$data);
						exit;
					}
				
			}
			else
			{
				Yii::app()->user->setFlash('error', Yii::app()->params->msg['_INVALID_CAPTCHA_']);
				$data = array('name'=>$_POST['name'],'email'=>$_POST['email'],'comment'=>$_POST['comment'],'message'=>Yii::app()->params->msg['_INVALID_CAPTCHA_']);
				$this->render("contactus",$data);
				exit;
			}
		}		
		$data = array('name'=>'','email'=>'','comment'=>'','message'=>$result['message']);
		if(!$this->isAjaxRequest())
		{
			$this->render('contactus',$data);
		}
		else
		{
			$this->renderPartial('contactus',$data);
		}
	}
	
	/*********** 	Cheking if is login  ***********/ 
	function isLogin()
	{
		if(isset(Yii::app()->session['loginId']))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function actiongetVerifyCode()
	{
		$jsonarray= array();
		if(isset($_POST['phone']))
		{
			$userObj=new User();
			if(!is_numeric($_POST['phone'])){
				$algoencryptionObj	=	new Algoencryption();
				$_POST['phone']	=	$algoencryptionObj->decrypt($_POST['phone']);
			}
			$result=$userObj->getVerifyCodeById($_POST['phone'],'-1');
			$jsonarray['status']=$result['status'];
			$jsonarray['message']=$result['message'];
		}
		else
		{
			$message=$this->msg['ONLY_PHONE_VALIDATE'];
			$jsonarray['status']='false';
			$jsonarray['message']=$message;
		}
		echo $jsonarray['message'];
	}
	function actiongetActiveVerifyCode()
	{
		$jsonarray= array();
		if(isset($_POST['phone']))
		{	
			$loginObj=new Login();
			$result=$loginObj->getVerifyCode($_POST['phone'],'-1');
			$jsonarray['status']=$result[0];
			$jsonarray['message']=$result[1];
			
		}
		else
		{
			$message=$this->msg['ONLY_PHONE_VALIDATE'];
			$jsonarray['status']='false';
			$jsonarray['message']=$message;
		}
		echo $jsonarray['status'].'**'.$jsonarray['message']; 
	}
	
	function isAjaxRequest()
	{
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	function actionHowItWorks()
	{
		if($this->isAjaxRequest())
		{
			$this->renderPartial('HowItWorks');
		}
		else
		{
			
			$this->render("/site/error");
		}
	}
	
	function actionforgotPassword()
	{
			$this->loginRedirect();
			$result['message'] = '';
			$captcha = Yii::app()->getController()->createAction('captcha');
			if(isset(Yii::app()->session['loginId']))
			{
				header("Location: ".Yii::app()->params->base_path);
				exit;
			}
			
			if(isset($_POST['verifyCode']) && (!$captcha->validate($_POST['verifyCode'],1)))
			{
				Yii::app()->user->setFlash('error', Yii::app()->params->msg['_INVALID_CAPTCHA_']);
				$data = array('loginId'=>$_POST['loginId'],'message'=>'');
				$this->render('forgot_password',$data);	
			}
			else
			{
				if(isset($_POST['loginId']))
				{
					$validationOBJ = new Validation();
					$res = $validationOBJ->forgot_password($_POST);
					if($res['status']==0)
					{
						$UserObj = new Users();
						$result=$UserObj->forgot_password($_POST['loginId'],0,Yii::app()->session['prefferd_language']);
						if($result['status']==0)
						{
							Yii::app()->user->setFlash('success', $result['message']);
							$data = array('message'=>$result['message']);
							$this->render('password_confirm',$data);	
						}else{
							Yii::app()->user->setFlash('error', $result['message']);
							$data = array('loginId'=>$_POST['loginId'],'message'=>$result['message']);
							$this->render('forgot_password',$data);	
						}
					}
					else
					{
						Yii::app()->user->setFlash('error',$res['message']);
						$this->redirect(array("site/forgot_password"));
						exit;
					}
				}
				else
				{
					$data = array('loginId'=>'','message'=>'');
					$this->render('forgot_password',$data);	
				}
			}
	}
	
	
	public function actionResetPassword()
	{
		$this->loginRedirect();
		$message='';
		$data=array();
		if(isset($_POST['submit_reset_password_btn']))
		{
			$validationOBJ = new Validation();
			$res = $validationOBJ->resetpassword($_POST);
			if($res['status']==0)
			{
				$userObj=new Users();
				$result=$userObj->resetpassword($_POST);
				$message=$result['message'];
				if($result['status']==0)
				{					
					Yii::app()->user->setFlash('success', $result['message']);
					$this->redirect(Yii::app()->params->base_path."site/signin");
					exit;
				}
				$data = array('message'=>$result['message']);
			}else
			{
				Yii::app()->user->setFlash('error', $res['message']);
				$this->render('password_confirm',array("$_POST"=>$_POST));
				exit;
			}
		}
		if($message!='')
		{
			Yii::app()->user->setFlash('error', $result['message']);
		}
		
		if( isset($_REQUEST['token']) ) {
			$data['token']	=	trim($_REQUEST['token']);
		}
		$this->render('password_confirm',$data);
	}
	
	/*********** 	Activation page redirect  ***********/ 
	public function actionActivate()
	{ 
		$result['message'] = '';
		$captcha = Yii::app()->getController()->createAction('captcha');
		if(isset($_POST['activation_email']))
		{ 
			if(!$captcha->validate($_POST['verifyCode'],1))
			{
				Yii::app()->user->setFlash('error', Yii::app()->params->msg['_INVALID_CAPTCHA_']);
				$data = array('message'=>Yii::app()->params->msg['_INVALID_CAPTCHA_']);
				$this->render('activate',$data);
				exit;
			}
			$userObj=new Users();
			$result=$userObj->activate($_POST['activation_email']);	
			
		
			if($result['status']==0)
			{
				Yii::app()->user->setFlash('success', $result['message']);
				$data = array('message'=>$result['message']);
				$this->render('activate',$data);
			}
			else
			{
				Yii::app()->user->setFlash('error', $result['message']);
				$data = array('message'=>$result['message']);
				$this->render('activate',$data);	
			}
		}
		else
		{
			$data = array('loginId'=>'','message'=>'');
			$this->render('activate',$data);	
		}
	}
	
	function actiontestemail()
	{
		$reminderObj=new Reminder();
		$result=$reminderObj->getAllReminder();
		echo "<pre>";
		print_r($result);exit;
	}
	
	public function actiontestDaemon($daemon_name='reminder')
	{
		 $sig = new signals_lib();
        $sig->get_queue($this->arr[$daemon_name]);
        $sig->send_msg($daemon_name);
		echo $daemon_name;exit;
	}
	
	public function actionrestCall()
	{
		print "<pre>";
		// id,todoList,title,description,attachment,priority,duedate,assignerType,userlist,loginId,fullname
		/*$post['id'] = "2";
		$post['loginId'] = "6";
		$post['fullname'] = "vishalpanchal";
		$post['todoList'] = "2";
		$post['title'] = "asfasdf";
		$post['description'] = "asfasdf";
		$post['priority'] = "2";
		$post['duedate'] = "duedate";
		$post['assignerType'] = "other";
		$post['userlist'] = "jasmin@todooli.com";*/
		$post['id'] = "1161";
		$post['loginId'] = "6";
		$post['comments'] = "test";
		
		$incoming_rest_callObj=new IncomingRestCalls();
		$res= $incoming_rest_callObj->assignBack(NULL,$post);
		print_r($res);
		/*$post=array();
		$post['userId'] = "6";
		$incoming_rest_callObj=new IncomingRestCalls();
		$res= $incoming_rest_callObj->getMyToDoItems($post,NULL);*/
		//print_r($res);
		exit;
	}
	
	function actioncheckDeamon()
	{
		$incoming_rest_callObj=new IncomingRestCalls();
		$result=$incoming_rest_callObj->getAllUnreadRestCall();
		$count=count($result);	
		error_log("Total call:".$count);
		if($count>0)
		{
			foreach($result as $incoming_rest_call)
			{
				$functionname=$incoming_rest_call['functionname'];
				$post=unserialize($incoming_rest_call['postParameter']);
				$get=unserialize($incoming_rest_call['getParameter']);
				$id=$incoming_rest_call['id'];
				error_log("INFO CALL FUNCTION :".$functionname);
				$data=$incoming_rest_callObj->$functionname($get,$post);
				echo "<pre>";
				print_r($data);
				$incoming_rest_call_data['response']=json_encode($data);
				$incoming_rest_call_data['status']='0';
				$incoming_rest_call_data['modified']=date('Y-m-d h:s:i');
				$incoming_rest_callObj->setData($incoming_rest_call_data);
				$incoming_rest_callObj->insertData($id);
			}
			
		}
	}
}