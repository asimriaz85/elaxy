<?php
include("include/session.php");

	
	
	

class Process
{
   function Process(){
      global $session;

      if(isset($_POST['sublogin'])){
         $this->procLogin();
		 
      }
      else if($session->logged_in){
         $this->procLogout();
		 
      }
      else{
          header("Location: index.php");
       }
   }


   function procLogin(){
      global $session, $form;
      /* Login attempt */
      $retval = $session->login($_POST['user'], $_POST['pass'], isset($_POST['remember']));
      
      /* Login successful */
      if($retval){
        //header("Location: ".$session->referrer);
		
		header("Location: dashboard.php");
      }
      /* Login failed */
      else{
         $_SESSION['value_array'] = $_POST;
         $_SESSION['error_array'] = $form->getErrorArray();
         header("Location: ".$session->referrer);
      }
   }
   
   function procLogout(){
      global $session;
      $retval = $session->logout();
      header("Location: index.php");
   }
   

};

$process = new Process;

?>
