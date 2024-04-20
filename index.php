<?php
    include "./cont/php/conn.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connecting to Database</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>  
    <style>
        .nav1{
            padding: 30px;
            color: green;
        }
        .breadcrumb-item+.breadcrumb-item::before {
            color: #198754;
        }
        #output{
            color:green;
        }
        .breadcrumb-item.active {
            color: #198754;
        }
    </style>
</head>
<body style="background-color:black;">
    <nav class="nav1" style="--bs-breadcrumb-divider: '>'; color:green;" aria-label="breadcrumb">

    <ol id="output" class="breadcrumb">
        <!-- <li class="breadcrumb-item">Htdocs<br/></li> -->
        <li class="breadcrumb-item" style="color:green;">Htdocs</li> 
    <!-- Initial "Htdocs" breadcrumb item -->
    <!-- <li class="breadcrumb-item" style="color:green;">Htdocs</li> -->
    </ol>
    <!-- <li class="breadcrumb-item" style="color:green;">Htdocs</li> <li class="breadcrumb-item active" aria-current="page">' + lines[lineIndex] + '</li> -->
    </nav>

    <script>
        function typeText(text, element, delay) {
        let lines = text.split('\n');
        let lineIndex = 0;

        function typeLine() {
            if (lineIndex < lines.length) {
                // Display "Htdocs" before every line
                // element.innerHTML +="\n";
                // element.innerHTML += '<li class="breadcrumb-item" style="color:green;">Htdocs</li>';
                element.innerHTML += '<li class="breadcrumb-item active" aria-current="page">' + lines[lineIndex] + '</li>';
                lineIndex++;
                setTimeout(typeLine, delay);
            }
        }

        typeLine();
        }

        let outputElement = document.getElementById("output");

        // Example text to display
        // typeText("Connecting to database...\n", outputElement, 1000);
    </script>
    <?php
         echo '<script>setTimeout(function() { typeText("Connecting to database...<br>", outputElement, 50); }, 1000);</script>';
        if ($conn->connect_error) {
            echo '<script>setTimeout(function() { typeText("Connection Failed: <br>' . $conn->connect_error . '", outputElement, 50); }, 2000);</script>';

        } else {
            echo '<br>';
            echo '<script>setTimeout(function() { typeText("Connection Successful.<br>", outputElement, 50); }, 2000);</script>';
            echo '<script>setTimeout(function() { typeText("Forwarding to main page...<br>", outputElement, 50); }, 3000);</script>';
            echo '<script>setTimeout(function() { window.location.href = "./cont/index.html"}, 4000);</script>';
        }
        $conn->close();
    ?>


</body>
</html>
