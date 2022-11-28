<?php

    // Check IF User Comming a Request
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Assign Variable.
        $user       =  filter_var($_POST["username"], FILTER_SANITIZE_STRING);
        $email      =  filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
        $cellphone  =  filter_var($_POST["cellphone"], FILTER_SANITIZE_NUMBER_INT);
        $message    =  filter_var($_POST["message"], FILTER_SANITIZE_STRING);

        // $userError  = "";
        // $msgError  = "";
        // if (strlen($user) <= 3) {
        //     $userError = "User Name Must be Larger Than 3 Characters";
        // }
        // if (strlen($message) <= 10) {
        //     $msgError = "User Name Must be Larger Than 3 Characters";
        // }

        // Craeting Arrays For Errors.
        $formErrors = array();
        if (strlen($user) <= 3) {
            $formErrors[] = "User Name Must be Larger Than <strong>3</strong> Characters";
        }

        if (strlen($user) <= 3) {
            $formErrors[] = "User Name Must be Larger Than <strong>3</strong> Characters";
        }
        
        if (strlen($message) <= 10) {
            $formErrors[] = "Message Must be Larger Than <strong>10</strong> Characters";
        }

        // If No Error Send The Email ==> [ mail(to, Subject, Message, Headers, Parameters)]
        $headers = "From: " . $email . "\r\n";
        $myEmail = "darwishahmed9@gmail.com";
        $subject = "Contact Form";
        if (empty($formErrors)) {
            mail($myEmail, $subject, $message, $headers);
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" />

    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/contact.css">
    
</head>
<body>

    <div class="container">

        <h1 class="text-center">Contact Me</h1>

        <form class="contact-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">


            <?php 
                if (! empty($formErrors)) { 
            ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                <?php
                    foreach ($formErrors as $error) {
                        echo $error . '<br />';
                    }
                ?>
                    </div>
            <?php
                }
            ?>
                    

            <div class="form-group">
                <input 
                        class="form-control username" 
                        type="text" 
                        name="username" 
                        value="<?php if (isset($user)) {echo $user;} ?>"
                        placeholder="Type Your User name" />
                <i class="fa fa-user fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    User Name Must be Larger Than <strong>3</strong> Characters
                </div>
            </div>
            
            <div class="form-group">
                <input 
                        class="form-control email" 
                        type="email"
                        name="email"
                        value="<?php if (isset($email)) {echo $email;} ?>"
                        placeholder="Please Type a Valid Email" />
                <i class="fa fa-envelope fa-fw"></i>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    Email Can Not Be <strong>Empty</strong>
                </div>
            </div>


            <input 
                    class="form-control" 
                    type="text" 
                    name="cellphone" 
                    value="<?php if (isset($cellphone)) {echo $cellphone;} ?>"
                    placeholder="Type Your Cell Phone" />
            <i class="fa fa-phone fa-fw"></i>


            <div class="form-group">
                <textarea
                        class="form-control message" 
                        name="message"
                        placeholder="Type Your Message!!">
                        <?php if (isset($message)) {echo $message;} ?>
                </textarea>
                <span class="asterisx">*</span>
                <div class="alert alert-danger custom-alert">
                    Message Must be Larger Than <strong>10</strong> Characters
                </div>
            </div>
            
            
            <input 
                    class="btn btn-success btn-blo ck" 
                    type="submit" 
                    value="Send Message">
            <i class="fa fa-paper-plane send-icon fa-fw"></i>

        </form>

    </div>

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/all.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custon.js"></script>
</body>
</html>