<?php
  if (isset($_POST['email']) && isset($_POST['message']) && isset($_POST['subject']))  {
    if(isEmailValid($_POST['email']) && isTextValid($_POST['message']) && isSubjectValid($_POST['subject'])){
      $email = $_POST['email'];
      $email = htmlspecialchars( stripslashes( strip_tags($_POST['email'] ) ) );
    }

    if(strlen($_POST['message']) <= 500){
      $message = $_POST['message'];
    }


    $admin_email = "agent_smith@illuminati.com";
    $subject = $_POST['subject'];

    echo $admin_email . ' ' . $subject . ' ' . $email . ' ' . $message;
    
    //send email
    mail($email, $subject, $message, "From:" . $admin_email);
    
    echo "Email was send!";
  }
  
  else  {
    header('Location: index.html');
  }

  // Check email
  function isEmailValid($email){
    return preg_match('/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}/', $email);
  }

  // Check text
  function isTextValid($text){
    return strlen($text) <= 500;
  }
?>