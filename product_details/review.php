<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $message = trim($_POST['message']);
    $name = trim($_POST['username']);
    $email = trim($_POST['number']);  // Assuming this is email; rename to a relevant field if needed

    // Validate form inputs
    if (empty($message) || empty($name) || empty($email)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    // Prepare email
    $to = "contactus@gmtherapeutics.com";
    $subject = "New Review from $name";
    $body = "
        You have received a new review from $name.\n\n
        Review Message: \n$message\n\n
        Email: $email
    ";
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Your review has been submitted successfully!";
    } else {
        echo "Failed to send the email. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
