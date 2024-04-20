<!-- Author: w3schools.in
URL: https://demo.w3schools.in/php-upload-image-to-mysql-database/
license: Free to use without republishing.
https://www.w3schools.in/page/copyright -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "the_fitness_club";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

<?php 
// Get config file

// Check for successful image upload
if (isset($_FILES["profile_pic"]) && $_FILES["profile_pic"]["error"] == 0) {

    // Get uploaded image content
    $uploadedImageContent = file_get_contents($_FILES['profile_pic']['tmp_name']);
    
    // Prepare SQL query to insert image
    $insertImageStmt = mysqli_prepare($conn, "INSERT INTO users(profile_pic) VALUES(?)");

    if($insertImageStmt === false) {
        // SQL prep failed
        $message = "SQL prep failed: " . mysqli_error($conn);
    } else {
        // Bind image content to SQL query
        mysqli_stmt_bind_param($insertImageStmt, 's', $uploadedImageContent);
        
        // Execute SQL query
        if (mysqli_stmt_execute($insertImageStmt)) {
            // Upload successful
            $message = "Upload successful.";
        } else {
            // Upload failed
            $message = "Upload failed: " . mysqli_stmt_error($insertImageStmt);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP - Image Upload to MySQL Database Demo</title>
  <link rel="stylesheet" href="app.css">
  <style>
    body {
    font: 16px/1.5 -apple-system, BlinkMacSystemFont, Roboto, Segoe UI, Helvetica Neue, Helvetica, Arial, sans-serif;
    margin: 0;
    color: #2f2f2f;
    background: #FFF;
}

*, *::before, *::after {
    box-sizing: border-box;
}

a {
    color: #2f20d1;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

img {
    max-width: 100%;
    margin-bottom: 16px;
}

.container-custom {
    max-width: 740px;
    margin: 20px auto;
    padding: 0 20px;
}

.message {
    background: #fefefe;
    border: 1px solid #eee;
    padding: 6px 20px;
}

input[type=file] {
    width: 200px;
    padding: 8px;
    border: 1px solid #ddd;
}

input[type=submit] {
    background:#44c767;
    border-radius:28px;
    border:1px solid #18ab29;
    display:inline-block;
    color:#ffffff;
    font-size:17px;
    padding:8px 32px;
    text-shadow:0px 1px 0px #2f6627;
}

input[type=submit]:hover {
    background:#5cbf2a;
}

input[type=submit]:active {
    position:relative;
    top:1px;
}

  </style>
</head>

<body>
  <div class="container-custom">
    <h1>Upload Image to MySQL Database:</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="profile_pic" accept="image/*">
        <input type="submit" value="Upload">
    </form>

    <h2>Uploaded Image (Displayed From the MySQL Database)</h2>
    <?php
    // Fetch latest uploaded image
    $result = mysqli_query($conn, "SELECT ID, profile_pic FROM users ORDER BY ID DESC LIMIT 1");

    if ($result && mysqli_num_rows($result) > 0) {
        // Extract image data if exists
        $imageRow = mysqli_fetch_assoc($result);
        
        // Display the image
        echo '<img src="data:image/jpeg;base64,' . base64_encode($imageRow['profile_pic']) . '" alt="Uploaded Image">';

        // Delete the image from the database
    } else {
        // No image found
        $message = "No image uploaded yet.";
    }

    // Output message if exists
    echo isset($message) ? "<div class='message'>$message</div>" : '';

    // Close the DB connection
    mysqli_close($conn);
    ?>
</body>
</html>
