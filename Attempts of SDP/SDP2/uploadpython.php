<?php
session_start();
include('connection_database.php'); // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $pythonid = $_POST['pythonid'];
    $title = $_POST["title"];
    $description = $_POST["description"];
    $backimg = $_POST["backimg"];
    $file = $_POST["file"];

    // Validation and data sanitization can be added here as needed

    // Insert the class data into the database
    $sql = "INSERT INTO python (title, description, backimg, file) VALUES 
            ('$title', '$description', '$backimg', '$file')";

    if (mysqli_query($con, $sql)) {
        echo '<script type="text/javascript">
                alert("Added successfully!");
                window.location = "pythontable.php"; 
              </script>';
        exit();
    } else {
        // Handle the error as needed
        echo "Error: " . mysqli_error($con);
        echo '<script type="text/javascript">
                alert("Error adding. Please try again.");
                window.location = "uploadpython.php";
              </script>';
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap');
*{
    margin: 0;
    padding: 0;
    font-family: 'poppins',sans-serif;
    color: #013a8b;
}
section{
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    width: 100%;
    
    background: url('admin_background.jpg')no-repeat;
    background-position: center;
    background-size: cover;
}
.form-box{
    position: relative;
    width: 450px;
    height: 560px;
    background: transparent;
    border: 2px solid #013a8b;
    border-radius: 20px;
    backdrop-filter: blur(15px);
    display: flex;
    justify-content: center;
    align-items: center;

}
h2{
    font-size: 2em;
    color: #013a8b;
    text-align: center;
}
.inputbox{
    position: relative;
    margin: 20px 0;
    width: 300px;
    border-bottom: 2px solid #013a8b;
}
.inputbox label{
    position: absolute;
    top: 50%;
    left: 5px;
    transform: translateY(-50%);
    color: #013a8b;
    font-size: 1em;
    pointer-events: none;
    transition: .5s;
}
input:focus ~ label,
input:valid ~ label{
top: -5px;
}
.inputbox input {
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding:0 35px 0 5px;
    color: #013a8b;
}
.inputbox select{
    width: 100%;
    height: 50px;
    background: transparent;
    border: none;
    outline: none;
    font-size: 1em;
    padding:0 35px 0 5px;
    color: #013a8b;
    border-bottom: 2px solid #013a8b;  
}
.inputbox select option{
    background-color: #013a8b;
    color: #013a8b;
}
.inputbox ion-icon{
    position: absolute;
    right: 0px;
    color: #013a8b;
    font-size: 1.2em;
    top: 20px;
}
.forget{
    margin: -15px 0 15px ;
    font-size: .9em;
    color: #013a8b;
    display: flex;
    justify-content: space-between;  
}

.forget label input{
    margin-right: 3px;
    
}
.forget label a{
    color: #013a8b;
    text-decoration: none;
}
.forget label a:hover{
    text-decoration: underline;
}
button{
    width: 100%;
    height: 40px;
    border-radius: 40px;
    background: #013a8b;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
    color:#fff;
}
.login{
    font-size: .9em;
    color: #013a8b;
    text-align: center;
    margin: 25px 0 10px;
}
.login p a{
    text-decoration: none;
    color: #013a8b;
    font-weight: 600;
}
.login p a:hover{
    text-decoration: underline;
}
.register a{
    width: 100%;
    height: 40px;
    border-radius: 40px;
    background: #013a8b;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    font-weight: 600;
    color: #013a8b;
    text-decoration: none;
}

.back {
    display: block;
    width: fit-content;
    margin: 0 auto;
    text-align: center;
    color: #013a8b; /* Change color to white */
    text-decoration: underline;
  }
  
  </style>
  <title>Add Database</title>
  <link href="/images/workout planner2.png" rel="icon">      
</head>
<body>
    <section>
        <div class="form-box">
            <div class="form-value">
                <form pythonid="python" name="python" action="uploadpython.php" method="POST">
                    <h2>Add Python</h2>
                    <div class="inputbox">
                        <input type="text" name="title" pythonid="title"  autocomplete="off" required>
                        <label for="">Title</label>
                    </div>          
                    <div class="inputbox">
                        <input type="text" name="description" pythonid="description"  autocomplete="off" required>
                        <label for="">Description</label>
                    </div>  

                    <label for="">Backgroung Image</label>
                    <div class="inputbox">
                        <input type="file" name="backimg" pythonid="backimg"  autocomplete="off" required>
                    </div>

                    <label for="">File</label>
                    <div class="inputbox">
                        <input type="file" name="file" pythonid="file"  autocomplete="off" required>
                    </div>

                    <button type="submit" class="class">Add chp</button><br><br>
                    <p><a href="pythontable.php" class="back">Back</a></p>

                </form>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
