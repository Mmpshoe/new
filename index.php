<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
</head>

<body>
    <div class="row">
        <div class="col-xxl-2" style="background: #3AAFA9;padding-top: 20px;height: auto;width: 200px;">
            <ul class="list-group" style="height: 400px;font-size: 12px;">
                <li class="list-group-item" style="background: transparent;border-style: none;margin: 0px;width: auto;">
                    <div class="col" style="text-align: center;border-style: none;"><i class="fas fa-user-circle" style="width: 80px;height: 80px;font-size: 80px;color: #feffff;text-align: left;margin-bottom: 20px;"></i>
                </div>
                    <div style="font-size: 16px;padding: 4px;text-align: center;color: #fff;">
                    Hello, <?php echo $user_data['username']; ?></div><br><br>
                        
                    <div class="row">
                        <div class="col"><button class="btn btn-primary" type="button" style="background: #3aafa9;width: 130px;font-size: 12px;border-color: #feffff;"><i class="material-icons" style="font-size: 16px;padding: 4px;text-align: left;">create</i>Edit Profile</button></div>
                    </div>
                </li>
                <li class="list-group-item" style="background: transparent;border-style: none;"><span style="color: #fff;">
                    <i class="fa fa-tasks"></i>&nbsp; &nbsp; <a href="#" style="color: #fff;text-decoration: none;">Event</a>&nbsp;</span></li>
                <li class="list-group-item" style="background: transparent;border-style: none;"><span style="color: #fff;">
                    <i class="fa fa-calendar"></i>&nbsp; &nbsp; &nbsp;Calendar</span></li>
                <li class="list-group-item" style="background: transparent;border-style: none;"><span style="color: #fff;">
                    <i class="far fa-bell"></i>&nbsp; &nbsp; &nbsp;Notifications</span></li>
                <li class="list-group-item" style="background: transparent;border-style: none;"><span style="color: #fff;">
                    <i class="fa fa-question-circle-o"></i>&nbsp; &nbsp; &nbsp;Help center</span></li>
            </ul>
            
        </div>
        <div class="col" style="width: 80%;padding: 0;height: auto;background: #def2f1;">
            <nav class="navbar navbar-light navbar-expand-lg navigation-clean" style="background: #3AAFA9;padding: 0;height: 72px;">
                <div class="container"><img src="assets/img/Logobg.png" style="width: 70px;height: 70px;"><a class="navbar-brand" href="#" style="color: #FEFFFF;">Fintech</a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-1">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="nav-link d-xxl-flex justify-content-xxl-center" href="index.php" style="color: #FEFFFF;">Home</a></li>
                            <li class="nav-item"><a class="nav-link d-xxl-flex justify-content-xxl-center" href="Services.html" style="color: #FEFFFF;">Services</a></li>
                            <li class="nav-item"><a class="nav-link d-xxl-flex justify-content-xxl-center" href="TaxReturn0.html" style="color: #FEFFFF;">Individuals</a></li>
                            <li class="nav-item"><a class="nav-link d-xxl-flex justify-content-xxl-center" href="#" style="color: #FEFFFF;">Business &amp; Employers</a></li>
                            <li class="nav-item"><a class="nav-link d-xxl-flex justify-content-xxl-center" href="#" style="color: #FEFFFF;">Acts &amp; Laws</a></li>
                        </ul>
                    </div><button class="btn btn-primary" type="button" style="border-radius: 45px;background: #DEFEF1;color: #3aafa9;width: 100px;border-width: 0px;border-color: transparent;">
                        <a class="navbar-brand" href="login.php" style="color: #1b2c2c;">Log Out</a></button>
                </div>
            </nav>
            <p style="background: #feffff;margin: 0;padding: 20px;color: #17252A;">Welcome to Fintech, the automated tax filing system that 
            removes the hassle from filing taxes. Our simple and intuitive system helps you to quickly and accurately file your taxes with 
            confidence. Our customer support team is here to answer any questions you may have and provide guidance throughout the process. 
            Experience the ease of filing taxes with Fintech today!<br></p>
            <div class="row">
                <div class="col text-center" style="padding: 0;padding-right: 0;">
                    <div class="box" style="padding: 20px;border-radius: 10px;height: 400px;margin: 15px;background: #feffff;margin-right: 0;width: 250px;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-newspaper" style="width: 32px;margin: 16px;height: 32px;">
                            <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"></path>
                            <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"></path>
                        </svg>
                        <h3 class="name" style="font-size: 20px;">News &amp; Updates</h3>
                        <p class="title">--------</p>
                        <p class="description" style="color: #17252A;">To get the latest information and changes to tax regulations and procedures,
                         stay informed and up to date with tax compliance requirements. Follow the link below.</p>
                         <button class="btn btn-primary" type="button" style="background: #3AAFA9;border-radius: 40px;width: 120px;border-width: 0px;margin-top: 16px;">Read More</button>
                    </div>
                </div>
                <div class="col" style="padding: 0;padding-right: 0;">
                    <div class="box" style="width: 250px;padding: 20px;border-radius: 10px;height: 400px;margin: 15px;background: #feffff;text-align: center;margin-right: 0;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-calendar-date-fill" style="width: 32px;margin: 16px;height: 32px;">
                            <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zm5.402 9.746c.625 0 1.184-.484 1.184-1.18 0-.832-.527-1.23-1.16-1.23-.586 0-1.168.387-1.168 1.21 0 .817.543 1.2 1.144 1.2z"></path>
                            <path d="M16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-6.664-1.21c-1.11 0-1.656-.767-1.703-1.407h.683c.043.37.387.82 1.051.82.844 0 1.301-.848 1.305-2.164h-.027c-.153.414-.637.79-1.383.79-.852 0-1.676-.61-1.676-1.77 0-1.137.871-1.809 1.797-1.809 1.172 0 1.953.734 1.953 2.668 0 1.805-.742 2.871-2 2.871zm-2.89-5.435v5.332H5.77V8.079h-.012c-.29.156-.883.52-1.258.777V8.16a12.6 12.6 0 0 1 1.313-.805h.632z"></path>
                        </svg>
                        <h3 class="name" style="font-size: 20px;">Important Dates</h3>
                        <p class="title">--------</p>
                        <p class="description" style="color: #17252A;">To get the latest information and changes to tax regulations and procedures, stay informed and up to date with tax compliance requirements. Follow the link below.</p><button class="btn btn-primary" type="button" style="background: #3AAFA9;border-radius: 40px;width: 120px;border-width: 0px;margin-top: 16px;">Read More</button>
                    </div>
                </div>
                <div class="col" style="padding: 0;padding-right: 0;">
                    <div class="box" style="width: 250px;padding: 20px;border-radius: 10px;height: 400px;margin: 15px;background: #feffff;text-align: center;margin-right: 0;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-bar-chart-line" style="width: 32px;margin: 16px;height: 32px;">
                            <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2zm1 12h2V2h-2v12zm-3 0V7H7v7h2zm-5 0v-3H2v3h2z"></path>
                        </svg>
                        <h3 class="name" style="font-size: 20px;">Tax Rates</h3>
                        <p class="title">--------</p>
                        <p class="description" style="color: #17252A;">To get the latest information and changes to tax regulations and procedures, stay informed and up to date with tax compliance requirements. Follow the link below.</p><button class="btn btn-primary" type="button" style="background: #3AAFA9;border-radius: 40px;width: 120px;border-width: 0px;margin-top: 16px;">Read More</button>
                    </div>
                </div>
                <div class="col">
                    <div class="box" style="width: 250px;padding: 20px;border-radius: 10px;height: 400px;margin: 15px;background: #feffff;text-align: center;margin-right: 0;"><i class="fas fa-money-check" style="width: 32px;margin: 16px;height: 32px;font-size: 25px;"></i>
                        <h3 class="name" style="font-size: 20px;">Pay Tax Bill</h3>
                        <p class="title">--------</p>
                        <p class="description" style="color: #17252A;">To get the latest information and changes to tax regulations and procedures, stay informed and up to date with tax compliance requirements. Follow the link below.</p><button class="btn btn-primary" type="button" style="background: #3AAFA9;border-radius: 40px;width: 120px;border-width: 0px;margin-top: 16px;">Read More</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>

    
</body>

</html>