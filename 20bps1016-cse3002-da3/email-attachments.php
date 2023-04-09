<?php
if (isset($_POST['submit'])) {
    // Get the uploaded file information
    $resume_name = basename($_FILES['resume']['name']);
    $video_resume_name = basename($_FILES['video_resume']['name']);
    $resume_tmp_name = $_FILES['resume']['tmp_name'];
    $video_resume_tmp_name = $_FILES['video_resume']['tmp_name'];

    // Validate file types
    $resume_file_type = strtolower(pathinfo($resume_name, PATHINFO_EXTENSION));
    $video_resume_file_type = strtolower(pathinfo($video_resume_name, PATHINFO_EXTENSION));
    if ($resume_file_type != "pdf" || $video_resume_file_type != "mp4") {
        echo "Sorry, only PDF and MP4 files are allowed.";
        exit();
    }

    // Validate file sizes
    $resume_size = $_FILES['resume']['size'];
    $video_resume_size = $_FILES['video_resume']['size'];
    $max_file_size = 5000000; // 5MB
    if ($resume_size > $max_file_size || $video_resume_size > $max_file_size) {
        echo "Sorry, your file is too large.";
        exit();
    }

    // Move uploaded files to a specific directory
    $resume_path = "uploads/" . $resume_name;
    $video_resume_path = "uploads/" . $video_resume_name;
    move_uploaded_file($resume_tmp_name, $resume_path);
    move_uploaded_file($video_resume_tmp_name, $video_resume_path);

    // Send email with attachments
    $to = "recipient@example.com";
    $subject = "Fall 22-23 results";
    $message = "Please find my Fall 22-23 results attached.";
    $headers = "From: sender@example.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"boundary\"\r\n";

    $body = "--boundary\r\n";
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $body .= $message . "\r\n";

    $body .= "--boundary\r\n";
    $body .= "Content-Type: application/octet-stream; name=\"$resume_name\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "Content-Disposition: attachment\r\n\r\n";
    $body .= chunk_split(base64_encode(file_get_contents($resume_path))) . "\r\n";

    $body .= "--boundary\r\n";
    $body .= "Content-Type: application/octet-stream; name=\"$video_resume_name\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "Content-Disposition: attachment\r\n\r\n";
    $body .= chunk_split(base64_encode(file_get_contents($video_resume_path))) . "\r\n";

    $body .= "--boundary--";

    if (mail($to, $subject, $body, $headers)) {
        echo "Email sent successfully.";
    } else {
        echo "Email sending failed.";
    }
}
?>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label for="resume">Resume (PDF file):</label>
    <input type="file" id="resume" name="resume"><br>
    <label for="video_resume">Video Resume (MP4 file):</label>
    <input type="file" id="video_resume" name="video_resume"><br>
    <input type="submit" value="Upload Files">
</form>
