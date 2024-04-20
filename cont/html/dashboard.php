<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Information</title>
    <style></style>
    <link  rel="stylesheet" href="../css/dashboard.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <?php
    include("../php/conn.php");

    $sql = "SELECT * FROM users WHERE email LIKE ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION["email"]);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $first_name = $row['name'];
        $email = $row['email'];
        $address = $row['address'];
        $gender = $row['Gender'];
        $age = $row['Age'];
        $mem_type = $row['membership'];
        $mem_duration = $row['duration'];
        $regis_date = $row['registered_date'];
        $dateTime = new DateTime($regis_date);
        $dateTime->add(new DateInterval("P{$mem_duration}M"));
        $newTimestamp = $dateTime->format('Y-m-d H:i:s');
        // Fetch the image data from $row
        $imageRow = $row;
        
    ?>
    <div class="container">
        
    <div class="con1 bd-example card">
    <div class="header  nav navbar header-nav">
        <h2 style="text-align:center;" class="text-center justify-item-center  nav-item lh-lg">Personal Information</h2>
        <a href="#" onclick="destroySessionAndReload(); return false;"><i style="float:right; font-size:24px" class="fa justify-item-end nav-item">&#xf08b;</i></a>
        <script>
  function destroySessionAndReload() {
    // Make an AJAX request to a PHP script that destroys the session
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "../php/destroy_session.php", true);
    xhr.onload = function () {
      if (xhr.status == 200) {
        // Reload the page
        location.reload();
      }
    };
    xhr.send();
  }
</script>
        </div>
        <br/>
        <!-- Profile Image -->
        <div class="div1">
            <div height="200px" width="200px" class="profile-picture-container">
                <?php  echo '<img class="rounded-circle border border-black" height="200px" width="200px" src="data:image/jpeg;base64,' . base64_encode($imageRow['profile_pic']) . '" alt="Uploaded Image">';?>
            </div>
        </div>
    </div>
    <h3 style="text-align: center">
        <?php echo '<strong>Name :</strong> '.$first_name?>
    </h3><br/><hr>
    <div class="containe">
        

       <div class="row r cols-row-1">
        <div class ="cols">
        <div class="row cols-row-2">
        <div class="col-5 col-md-6">
        <?php echo '<strong>Email :</strong> '.$email?>
        </div>
        <div class="col-5 col-md-6">
        <?php echo '<strong>Age :</strong> '.$age?>
        </div>
        <div class="col-5 col-md-6">
        <?php echo '<strong>Gender :</strong> '.$gender?>
        </div>
        <div class="col-5 col-md-6">
        <?php echo '<strong>Address :</strong> '.$address?>
        </div>
        </div>
        </div>
        <div class ="cols">
        <div class="row cols-row-2">
        <div class="col-5 col-md-6">
        <?php echo '<strong>Package :</strong> '.$mem_type?>
        </div>
        <div class="col-5 col-md-6">
        <?php echo '<strong>Duration :</strong> '.$mem_duration. ' Months'?>
        </div>
        <div class="col-5 col-md-6">
        <?php echo '<strong>Registered In :</strong> '.$regis_date?>
        </div>
        <div class="col-5 col-md-6">
        <?php echo '<strong>Expires In :</strong> '.$newTimestamp?>
        </div>
        </div>
        </div>
        
        
       </div>
    </div>
    </div>
    <?php
    } 
    ?>
</body>
</html>