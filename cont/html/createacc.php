
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sevillana&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="../css/createacc.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>
<body>

    <form action="../php/account.php" method="POST"  enctype="multipart/form-data">
        <h1>The Fitness Club</h1>
        <!--Error message-->
        <div class="text-center" style="color: red;">
            <?php if (isset($_GET['error'])): ?>
            <div class="error-message" style="text-align: center; color: red;"><?php echo $_GET['error']; ?></div>
            <?php endif; ?> 
        </div>
        <br/>
        <div class="row g-3">
            <div class="cx col-lg-6">
                <label for="inputName4" class="form-label">Name</label>
                <input type="Name" name="name" class="form-control" id="inputName4" required>
            </div>
            <div class="cx col-lg-6">
                <label for="inputAge" class="form-label">Age</label>
                <input type="number" name="age" class="form-control" id="inputAge4" required>
            </div>
            <div class="cx col-lg-6">
                <label for="inputGender" class="form-label">Gender</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="radio1" name="Gender" value="Male" checked>
                        <label class="form-check-label" for="radio1">Male</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="radio2" name="Gender" value="Female">
                        <label class="form-check-label" for="radio2">Female</label>
                      </div>
                      <div class="form-check form-check-inline">
                        <input type="radio" class="form-check-input" id="radio3" name="Gender" value="Others">
                        <label class="form-check-label">Others</label>
                      </div>
                </div>
            </div>
            <div class="cx col-lg-6">
                <label for="inputEmail4" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required id="inputEmail4">
            </div>
            <div class="cx col-lg-6">
                <label for="inputPassword4" class="form-label">Password</label>
                <input type="password" name="password" required class="form-control" id="inputPassword4">
            </div>
            <div class="cx col-lg-6">
                <label for="inputAddress" class="form-label">Address</label>
                <input type="text" name="address" required class="form-control" id="inputAddress">
            </div>
            <div class="cx col-lg-6">
                <label for="formFile" class="form-label">Profile Picture</label>
                <input class="form-control" required name="Media" type="file" id="avatar img_file" value="" onChange="img_pathUrl(this);" accept="image/png, image/jpeg, image/jpg">
            </div>
            <div class="cx col-lg-6"><img src="" id="img_url" alt="your image"></div>
            <div class="cx col-lg-6">
                <label for="inputpackage" class="form-label">Packages</label>
                <select Name="mem_type" required class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                    <option disabled selected>Open this select menu</option>
                    <option value="Basic Membership">Basic Membership</option>
                    <option value="Zumbastic Membership">Zumbastic Membership</option>
                    <option value="Yogastic Membership">Yogastic Membership</option>
                    <option value="Elite Membership">Elite Membership</option>
                    <option value="Private Trainer">Private Trainer</option>
                    <option value="Sauna/ Steam">Sauna/ Steam</option>
                  </select>
            </div>
            <div class="cx col-lg-6">
                <label for="inputduration" class="form-label">Duration</label>
                <select Name="mem_duration" required class="form-select form-select-md mb-3" aria-label=".form-select-md example">
                    <option disabled selected>Open this select menu</option>
                    <option value="3">3 Months</option>
                    <option value="6">6 Months</option>
                    <option value="12">12 months</option>
                  </select>
            </div>
            
        </div>
        <br/> 
        <div class="d-grid gap-2 col-6 mx-auto"><button class="btn  btn-primary" type="submit">Create Account</button></div>

        <a style="float: left;" href="../index.html"><i class="fa-solid fa-arrow-left"></i> Back</a>
        <a style="float: right;" href="./login.php">Login</a>
        <p>&nbsp;</p>
    </form>
    
</body>
<script type="text/javascript">

function img_pathUrl(input){
        $('#img_url')[0].src = (window.URL ? URL : webkitURL).createObjectURL(input.files[0]);
    }

</script>
    
</html>