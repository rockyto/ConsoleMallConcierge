<?php

class sendEmail{

    public function sendMail($messageDetails){

        $subject = $messageDetails["message_subject"];
        $to = $messageDetails["to_email"];
        $fromName = $messageDetails["from_name"];
        $fromEmail = $messageDetails["from_email"];
        $body = $messageDetails["message_body"];

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;content=UTF-8" . "\r\n";
        $headers .= "From: " . $fromName . " <" . $fromEmail . ">" . "\r\n";

        mail($to, $subject, $body, $headers);
        

    }



}