<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedinEmp"]) && $_SESSION["loggedinEmp"] === true){
  header("location: displayLowongan.php");
  exit;
}
 
// Include config file
require_once "connect.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT employer_id, username, password FROM employer WHERE username = ?";
        
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $employer_id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedinEmp"] = true;
                            $_SESSION["employer_id"] = $employer_id;
                            $_SESSION["username"] = $username;                              
                            
                            // Redirect user to welcome page
                            header("location: displayLowongan.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
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
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Log In</title>

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
            height: 450px;
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
                                <a href="login.php" class="active">Sign In as Employee</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <br><br><br><br><br><br>    
        <!-- content Sign In -->
        <div class="card">
        <div class="wrapper">
        <h2>Login as Employer</h2>
        <p>Please fill in your credentials to login.</p>
        <form method="post">
            <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                <span class="help-block"><?php echo $username_err; ?></span>
            </div><br>    
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div><br>
            <div class="form-group">
                <input type="submit" class="btn" value="Login">
            </div><br>
            <p>Don't have an account? <a href="registeremployer.php">Sign up now</a>.</p>
        </form>
    </div>    
        </div>

    <br><br><br><br><br><br><br><br><br><br>
    
        
     
        
    </main>    
</body>
</html>