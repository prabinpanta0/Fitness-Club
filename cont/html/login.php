<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>  
    
</head>
<body style="background-color: #230f5b;">
    <div class="body">
        <div>
            <div id="div1">
                <form action="../php/login.php" method="POST" class=" g-3">
                    <h1>The Fitness Club</h1>
                    <p>&nbsp;</p>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" name="email" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                      </div>
                      <div class="form-floating">
                        <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                      </div>
                      <p>&nbsp;</p>
                      <button class="btn-0 btn-outline-danger" type="submit">Login </button><p>&nbsp;</p>
                      <a style="float: left;" href="../index.html"><i class="fa-solid fa-arrow-left"></i> Back</a>
                      <a style="float: right;" href="./createacc.php">Create a Account</a>
                      <p>&nbsp;</p>

                                            <!--Error message-->
                      <div class="text-center" style="color: red;">
                        <?php if (isset($_GET['error'])): ?>
                          <div class="error-message" style="text-align: center; color: red;"><?php echo $_GET['error']; ?></div>
                        <?php endif; ?> 
                      </div>
                </form>
            </div>

    <script>
        function toggleDivs() {
          var div1 = document.getElementById('div1');
          var div2 = document.getElementById('div2');
    
          // Toggle visibility of div1 and div2
          if (div1.style.display === 'none') {
            div1.style.display = 'block';
            div2.style.display = 'none';
          } else {
            div1.style.display = 'none';
            div2.style.display = 'block';
          }
        }
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/tilt.jquery.min.js"></script>
</body>
</html>