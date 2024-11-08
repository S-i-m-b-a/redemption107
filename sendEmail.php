<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and assign form data to variables
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $subject = filter_var(trim($_POST['subject']), FILTER_SANITIZE_STRING);
    $message = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format. Please provide a valid email.";
        exit;
    }

    // Your email address where the message will be sent
    $to = "redemptionstudio107@gmail.com, simbarashetapererwa@gmail.com";

    // Email headers
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "Content-Type: text/plain; charset=UTF-8\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Format the email message
    $fullMessage = "Name: " . $name . "\n" .
                   "Email: " . $email . "\n" .
                   "Subject: " . $subject . "\n\n" .
                   "Message:\n" . $message;

    // Send email
    if (mail($to, $subject, $fullMessage, $headers)) {
        echo "Your message has been sent successfully!";
    } else {
        echo "Failed to send your message. Please try again later.";
    }
} else {
    echo "Invalid request method. Please submit the form.";
}
?>
