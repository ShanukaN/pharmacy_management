<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset($_POST['fname']) && isset($_POST['lname'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "shanuka.nadee2021@gmail.com"; //enter you email address
        $mail->Password = 'Mallika@123'; //enter you email password
        $mail->Port = 587;
        $mail->SMTPSecure = "tls";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom("shanuka.nadee2021@gmail.com");
        $mail->addAddress($email); //enter you email address
        $mail->Subject = ("$email");
        $mail->Body = "    <h2>Hellow</h2>
        <h3> You are receiving this email because we received  </h3>
        <br/><br/>";

        if ($mail->send()) {
            $status = "success";
            $response = "Email is sent!";
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));
    }
?>