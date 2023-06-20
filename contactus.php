<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if name, email, phone, and message are not empty
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])) {
    
        // sanitize inputs
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

        // Email details
        $to = "owner@example.com"; // replace with the owner's email address
        $subject = "New Message from Contact Form";
        $body = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nMessage: {$message}";

        // Send email
        if(mail($to, $subject, $body)) {
            echo "Message sent successfully";
        } else {
            echo "Message sending failed";
        }
    } else {
        echo "Please fill all the fields";
    }
} else {
    echo "Invalid Request";
}
?>
