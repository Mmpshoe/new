<?php
session_start();

include("connection.php");
include_once 'functions.php';


$firstname ="";
$lastname ="";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'fintechdb');

if (isset($_POST['upload'])) {
  // Validate form data
  $firstname = mysqli_real_escape_string($db, $_POST['firstnames']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  
  // Check if first name and last name are set
  if (!isset($_POST['firstnames']) || empty($_POST['firstnames'])) {
    $errors[] = "First name is required.";
  }
  
  if (!isset($_POST['lastname']) || empty($_POST['lastname'])) {
    $errors[] = "Last name is required.";
  }

  // Check if a file was uploaded
  if (!isset($_FILES['pdf']) || $_FILES['pdf']['error'] == UPLOAD_ERR_NO_FILE) {
    $errors[] = "Please select a PDF file to upload.";
  } else {
    // Check if the file is a PDF
    $file_ext = strtolower(pathinfo($_FILES['pdf']['name'], PATHINFO_EXTENSION));
    if ($file_ext != 'pdf') {
      $errors[] = "Only PDF files are allowed.";
    }
  }

  // Check if there are any errors
  if (count($errors) > 0) {
    // Display the errors
    foreach ($errors as $error) {
      echo "<p>$error</p>";
    }
  } else {

      ini_set('memory_limit', '2048M');

      require('upload.php');
      extract($_POST);

      if(isset($readpdf)){
        
        if($_FILES['file']['type']=="application/pdf") {
          $a = new PDF2Text();
          $a->setFilename($_FILES['file']['tmp_name']);
          $a->decodePDF();
          echo $a->output();
        }
        
        else {
          echo "<p style='color:red; text-align:center'>
            Wrong file format</p>";
        }
      }

    // Save PDF file in a folder
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["pdf"]["name"]);
    if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $target_file)) {
      // Save data in the database
      $sql = "INSERT INTO taxpayer (firstnames, lastname, documents) 
              VALUES ('$firstname', '$lastname', '$target_file')";
      mysqli_query($db, $sql);
      echo "File uploaded successfully.";
    } else {
      echo "Error uploading file.";
    }
    header('location: taxcalculator.py');
  }
}

if (isset($_POST['extract'])) {
    $tin = mysqli_real_escape_string($db, $_POST['id']);
  
    // Retrieve PDF file path from taxpayer table
    $sql = "SELECT documents FROM taxpayer WHERE id = '$id'";
    $result = mysqli_query($db, $sql);
    $row = mysqli_fetch_assoc($result);
    $pdf_file_path = $row['documents'];
  
    // Use PDF parsing library to extract data from PDF file
    require_once 'pdfminer/vendor/autoload.php';
    $parser = new \Smalot\PdfParser\Parser();
    $pdf = $parser->parseFile($pdf_file_path);
    $pages = $pdf->getPages();
    $extracted_data = '';
    foreach ($pages as $page) {
      $extracted_data .= $page->getText();
    }
  
    // Save extracted data in variables
    $employee_name = ''; // extract employee name from $extracted_data
    $id = ''; // extract employee ID from $extracted_data
    $tax_year = ''; // extract tax year from $extracted_data
  
    // Insert extracted data into formP16 table
    $sql = "INSERT INTO formP16 (tin, employee_name, employee_id, tax_year) 
            VALUES ('$id', '$employee_name', '$employee_id', '$tax_year')";
    mysqli_query($db, $sql);
    header('location: index.php');
    echo "Data extracted successfully.";
  }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Fintech pro</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/fonts/material-icons.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome5-overrides.min.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/fintech-nav.css">
    <link rel="stylesheet" href="assets/css/Highlight-Clean.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean-1.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/Registration-Form-with-Photo.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="row">
        <div class="col-xxl-2" style="background: #3AAFA9;padding-top: 20px;height: auto;width: 200px;">
            <ul class="list-group" style="height: 100ch;">
                <li class="list-group-item" style="background: transparent;border-style: none;margin: 0px;width: auto;">
                    <div class="col" style="text-align: center;border-style: none;"><i class="fas fa-user-circle" style="width: 80px;height: 80px;font-size: 80px;color: #feffff;text-align: left;margin-bottom: 20px;"></i></div>
                    <p style="color: #feffff;text-align: center;padding: 0px;margin: 0px;font-size: 16px;margin-bottom: 10px;">Hello, <?php echo $user_data['username']; ?></p><button class="btn btn-primary" type="button" style="background: #3aafa9;width: 130px;font-size: 12px;border-color: #feffff;"><i class="material-icons" style="font-size: 16px;padding: 4px;text-align: left;">create</i>Edit Profile</button>
                </li>
                <li class="list-group-item" style="background: transparent;border-style: none;"><span style="color: #fff;"><i class="fa fa-tasks"></i>&nbsp; &nbsp; <a href="#" style="color: #fff;text-decoration: none;">Event</a>&nbsp;</span></li>
                <li class="list-group-item" style="background: transparent;border-style: none;"><span style="color: #fff;"><i class="fa fa-calendar"></i>&nbsp; &nbsp; &nbsp;Calendar</span></li>
                <li class="list-group-item" style="background: transparent;border-style: none;"><span style="color: #fff;"><i class="far fa-bell"></i>&nbsp; &nbsp; &nbsp;Notifications</span></li>
                <li class="list-group-item" style="background: transparent;border-style: none;"><span style="color: #fff;"><i class="fa fa-question-circle-o"></i>&nbsp; &nbsp; &nbsp;Help center</span></li>
            </ul>
        </div>
        <div class="col text-center" style="width: auto;padding: 0;height: auto;background: #def2f1;">
            <nav class="navbar navbar-light navbar-expand-lg navigation-clean" style="background: #3AAFA9;padding: 0;height: 72px;">
                <div class="container"><img src="assets/img/Logobg.png" style="width: 70px;height: 70px;"><a class="navbar-brand" href="#" style="color: #FEFFFF;">Fintech</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link d-xxl-flex justify-content-xxl-center" href="index.php" style="color: #FEFFFF;">Home</a></li>
                            <li class="nav-item"><a class="nav-link d-xxl-flex justify-content-xxl-center" href="Services.html" style="color: #FEFFFF;">Services</a></li>
                            <li class="nav-item"><a class="nav-link d-xxl-flex justify-content-xxl-center" href="upload.php" style="color: #FEFFFF;">Individuals</a></li>
                            <li class="nav-item"><a class="nav-link d-xxl-flex justify-content-xxl-center" href="#" style="color: #FEFFFF;">Business &amp; Employers</a></li>
                            <li class="nav-item"><a class="nav-link d-xxl-flex justify-content-xxl-center" href="#" style="color: #FEFFFF;">Acts &amp; Laws</a></li>
                            <li class="nav-item"><a class="nav-link d-xxl-flex justify-content-xxl-center" href="login.php" style="color: #3AAFA9;background: #e5fffe;border-radius: 20px;margin: 0px 12px;">Log Out</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <nav class="navbar navbar-light navbar-expand-lg d-xxl-flex justify-content-xxl-start navigation-clean-button">
                <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse text-center d-flex justify-content-between justify-content-xxl-center" id="navcol-2">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item"><a class="nav-link active" href="#" style="color: #17252a;">Registration</a></li>
                            <li class="nav-item"><a class="nav-link active" href="#" style="color: #17252a;">Payment Reference</a></li>
                            <li class="nav-item"><a class="nav-link active" href="#" style="color: #17252a;">Question &amp; Support</a></li>
                            <li class="nav-item"><a class="nav-link active" href="#" style="color: #17252a;">Tax Calculator</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="row" style="background-color:#feffff; background-image: linear-gradient(315deg, #feffff 0%, #f5f7f7 100%); font-family:'Poppins', sans-serif ; display: flex; align-items: left; height: 80vh; overflow: hidden; margin: 0;">
                        <div class="Registration-header" style="padding: 4rem;">
                            <form method="POST" enctype="multipart/form-data">
                                <div>
                                    <input type="file" id="pdf" name="pdf"><br><br>
                                </div>
                                <div class="input-group">
                                    <button type="submit" class="btn" style="background: #3AAFA9;width: 80px; border-radius: 20px;margin-left:80px;" name="upload">Next</button>
                                </div>
                            </form>
                        </div>
                     </div>
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
             </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>

</html>