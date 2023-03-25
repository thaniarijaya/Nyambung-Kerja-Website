<?php
session_start();
// Include config file
require_once "connect.php";
 
// Define variables and initialize with empty values
$username = $password = $confirm_password = $email = $alamat = $no_telp = $lokasi_id = $foto_id = "";
$username_err = $password_err = $confirm_password_err = $email_err = $alamat_err = $no_telp_err = $lokasi_id_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT employee_id FROM employee WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";     
    }else{
        $email = trim($_POST["email"]);
    }

    if(empty(trim($_POST["alamat"]))){
        $alamat_err = "Please enter an address.";     
    }else{
        $alamat = trim($_POST["alamat"]);
    }

    if(empty(trim($_POST["no_telp"]))){
        $no_telp_err = "Please enter a phone num.";     
    }else{
        $no_telp = trim($_POST["no_telp"]);
    }

    if(empty(trim($_POST["lokasi_id"]))){
        $lokasi_id_err = "Please select your location";     
    }else{
        $lokasi_id = (int)trim($_POST["lokasi_id"]);
    }

    $foto_id = (int)'1';
    $password =  password_hash($password, PASSWORD_DEFAULT);

    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($email_err) && empty($alamat_err) && empty($no_telp_err) && empty($lokasi_id_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO employee (username, password, email, alamat, no_telp, lokasi_id, foto_id) VALUES ('$username', '$password', '$email', '$alamat', '$no_telp', '$lokasi_id', '$foto_id');";
        echo '<script>console.log("'.$sql.'")</script>';
                
        if (mysqli_query($conn, $sql)) {
            header("location: login.php");
        } else {
            echo "Something went wrong. Please try again later.";           
        }
    
    }
    
    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <!-- add icon link -->
    <link rel = "icon" href = "asset/nyambungkerja.png"  type = "image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- bagian css -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

        
        :root{
            --dark-one: #333;
            --dark-two: #7a7a7a;
            --main-color: #784cfb;
            --light-one: #fff;
            --light-two: #f9fafb;
           --light-three: #f6f7fb; 
           --dark-blue: #23049d;
           --light-purple: #aa2ee6;
           --light-pink: #ff79cd;
           --light-yellow: #ffdf6b;
        }
        
        *, *::before, *::after{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body, button, input, textarea{
            font-family: 'Poppins', sans-serif;
        }

        a{
            text-decoration: none;
        }

        ul{
            list-style: none;
        }

        img{
            width: 100%;
        }

        .container{
            position: relative;
            z-index: 5;
            max-width: 92rem;
            margin: 0 auto;
        }

        .grid-2{
            display: grid;
            grid-template-columns: 1fr 1fr;/*bagi kolom jadi 2 di dalem container*/
            align-items: center;
            justify-content: center;
        }

        .text{
            font: 1rem;
            color: var(--dark-two);
            line-height: 1.6;
        }

        .column-1{
            margin-right: 1.5rem;
        }

        .column-2{
            margin-left: 1.5rem;
        }

        .col-sm{
            margin-right: auto;
            margin-left: auto;
            margin-bottom: auto;
            margin-top: auto;
        }


        /* End General Styles*/
        header{
            width: 100%;
            background-color: #f6f7fb;
            overflow: hidden;
        }

        .service-content{
            width: 100%;
            background-color: var(--main-color);
            overflow: hidden;
        }

        nav{
           width: 100%; 
           position: relative;
           z-index: 50;
        }

        nav .container{
            display: flex; /*jadiin 1 baris*/
            justify-content: space-between;/*membuat space antara logo di kiri dan tulisan di kanan*/
            height: 6rem;
            align-items: center;
        }

        .logo{
            width: 80px;
            display: flex;
            align-items: center;
        }

        .links ul {
            display: flex;
        }

        .links a{
            display: inline-block;
            padding: .9rem 1.2rem;
            color: var(--dark-one);
            font-size: 1.05rem;
            text-transform: uppercase;/*biar huruf besar semua*/
            font-weight: 500;
            line-height: 1;
            transition: 0.3s;
        }

        .links a.active{
            background-color: var(--main-color); 
            color: var(--light-one);
            border-radius: 2rem;
            font-size: 1rem;
            padding: 0.9rem 2.1rem;
            margin-left: 1rem;
        }

        .links a:hover{
            color: var(--main-color);
        }

        .links a.active:hover{
            color: var(--light-one);
            background-color: #6b44e0;
        }

         /* bagi section pada website*/
        .header-content .container.grid-2{
            grid-template-columns: 1fr 1fr;/*bagi kolom container jadi 2*/
            min-height: calc(100vh - 6rem);
            padding-bottom: 2.5rem;
            text-align: left;
        }

        .service-content .container.grid-2{
            grid-template-columns: 1fr 1fr;/*bagi kolom container jadi 2*/
            min-height: calc(100vh - 6rem);
            padding-bottom: 2.5rem;
            text-align: left;
        }

        .header-title{
            font-size: 2.8rem;
            line-height: 0.8;
            color: var(--dark-one);
        }

        .header-content .text{
            margin: 2.15rem 0;
        }

        .btn{
            display: inline-block;
            padding: .85rem 2rem;
            background-color: var(--main-color);
            color: var(--light-one);
            border-radius: 2rem;
            font-size: 1.05rem;
            text-transform: uppercase;
            font-weight: 500;
            transition: .3s;
        }

        .btn:hover{
            background-color: #6b44e0;
        }

        .image{
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .header-content .image .img-element{
            max-width: 750px;
        }

        .card {
            background-color: white;
            width: 600px;
            height: 875px;
            perspective: 1000px; /* Remove this if you don't want the 3D effect */
            margin: auto;
            color: var(--dark-one);
            box-shadow: 0 14px 28px; 
            padding: 25px;  
            
        }

    </style> 
   

</head>
<body>
        <header>
             <!-- navigation bar -->
            <nav>
                <div class="container">
                    <div class="logo">
                        <!-- buat logo -->
                        <a href="index.php"><img src="asset/nyambungkerja.png" alt=""></a>
                    </div>

                    <div class="links">
                        <ul>
                             <!-- bagian button navbar -->
                            <li>
                                <a href="display.php">Daftar Lowongan</a>
                            </li>
                            <li>
                                <a href="displayLowongan.php">Buka Lowongan</a>
                            </li>
                            <li>
                                <a href="loginemployer.php" class="active">Sign In as Employer</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <br><br><br><br><br><br>    
        <!-- content Sign In -->

        <div class="card">
        <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div><br>   
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div><br>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" value="<?php echo $confirm_password; ?>">
                <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div><br>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?php echo $email; ?>">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div><br>
            <div class="form-group <?php echo (!empty($alamat_err)) ? 'has-error' : ''; ?>">
                <label>Alamat</label>
                <input type="alamat" name="alamat" class="form-control" value="<?php echo $alamat; ?>">
                <span class="help-block"><?php echo $alamat_err; ?></span>
            </div><br>
            <div class="form-group <?php echo (!empty($lokasi_id_err)) ? 'has-error' : ''; ?>">
                <label>Lokasi</label>
                <select name="lokasi_id">
                    <option value="">Pilih lokasi..</option>
                    <?php
                        $sql_stmt = mysqli_query($conn, "SELECT * from lokasi");
                        while ($row = $sql_stmt->fetch_assoc()){
                            echo "<option value='" . $row['lokasi_id']. "'>" . $row['kota'] . "</option>";
                        }
                    ?>
                </select>
                <span class="help-block"><?php echo $alamat_err; ?></span>
            </div><br>
            <div class="form-group <?php echo (!empty($no_telp_err)) ? 'has-error' : ''; ?>">
                <label>Nomor Telepon</label>
                <input type="no_telp" name="no_telp" class="form-control" value="<?php echo $no_telp; ?>">
                <span class="help-block"><?php echo $no_telp_err; ?></span>
            </div><br>
            <div class="form-group">
                <input type="submit" class="btn" value="Submit">
                <input type="reset"  class="btn" value="Reset">
            </div><br>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
        </div>

    <br><br><br><br><br><br><br><br><br><br>
    
        
     
        
    </main>    
</body>
</html>