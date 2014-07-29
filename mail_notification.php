<?php
   
$Name = "Cantor Arts Visitor Comments"; //senders name 
$email = "cantorartsvisitorcomments@gmail.com"; //senders e-mail adress 
$recipient = "timsants@gmail.com"; //recipient 
$mail_body = "Dear " .  $assignee  . ":

You are receiving this message because a visitor to the Cantor Arts Center has submitted 
a comment/question that requires action and our staff has assigned this comment to the 
category of “Bookstore.” To view this comment, you can login in our Cantor Arts Center 
Visitor Comment Database, following this link: 
https://www.stanford.edu/dept/suma/cgi-bin/comment_db/. 

The following information is included for your convenience:

Visitor Info:" . $name . "
Comment: " . $commenttext . " 
Date of Visit: " . $date . "
Status: " . $status . " 
Department: " . $department . "
Category: " . $category . "

**To reply to a comment:
o	Login Cantor Arts Center Visitor Comment Database, https://www.stanford.edu/dept/suma/cgi-bin/comment_db/
o	Respond directly to the visitor from your personal email
o	Update the status of the comment from “Action required” to “Issue Solved”
Thank you. We hope you have a wonderful day.

Visitor Services,
Cantor Arts Center

";

$subject = "You have received a comment from a visitor"; //subject 
$header = "From: ". $Name . " <" . $email . ">\r\n"; //optional headerfields 

mail($recipient, $subject, $mail_body, $header); //mail command :) 

?>