<?php
echo "mac";
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $message = $_POST["message"];

    // Validate the form data (You should implement more robust validation)
    if (empty($name) || empty($email) || empty($phone) || empty($message)) {
        // Some fields are missing, handle the error
        // For example, you could redirect back to the form with an error message
        header("Location: index.html?error=missing_fields");
        exit;
    }

    // If the form data is valid, proceed with further processing
    // For example, you could send an email to the site owner with the form data
    $to = "info@geekmac.online";
    $subject = "New Contact Form Submission";
    $message = "Name: $name\nEmail: $email\nPhone: $phone\nMessage: $message";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        // The email was sent successfully, display success message
        header("Location: index.html?success=true");
        exit;
    } else {
        // There was an error sending the email, handle the error
        header("Location: index.html?error=email_error");
        exit;
    }
}
?>
