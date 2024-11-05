<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Style.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">
</head>

<body>
    <div class="container register">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt="" />
                <h3>Welcome</h3>
                <p style="font-size: 18px;
            color: #333;
            line-height: 1.6;">Welcome to our exclusive perfume store! Join us today to experience the finest
                    fragrances that reflect your personality and add a touch of elegance to your life.</p>
                <!-- <input type="submit" name="" value="Login"/><br/> -->
            </div>
            <div class="col-md-9 register-right mt-5">
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Log In</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <!-- Employee Tab -->

                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Registration</h3>
                        <div class="row register-form">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <!-- post to sign in tap    -->
                                    <form action="register.php" method="POST">

                                        <input type="text" class="form-control" name="FName" placeholder="First Name *"
                                            required />
                                </div>
                                <div class="form-group">

                                    <input type="text" class="form-control" name="Lname" placeholder="Last Name *"
                                        required />
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="pws" placeholder="Password *"
                                        required />
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pwer"
                                        placeholder="Confirm Password *" required />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="email" class="form-control" name="Email" placeholder="Your Email *"
                                        required />
                                </div>
                                <div class="form-group">
                                    <input type="text" minlength="10" maxlength="10" class="form-control" name="Phone"
                                        placeholder="Your Phone *" required />
                                </div>
                                <div class="form-group">

                                    <input type="date" class="form-control" name="dob"  required />

                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="Add"
                                        placeholder="Enter Your Addres *" />
                                </div>
                                <input type="submit" class="btnRegister" name="registration" value="registration" />
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- LOGIN Tab -->
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <h3 class="register-heading">Log in</h3>
                        <div class="row register-form">
                            <div class="col-md-6">


                                <div class="form-group">
                                    <form action="login.php" method="post">
                                        <input type="email" class="form-control" name="email" placeholder="Email *"
                                            required />
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password *"
                                        required />
                                    </div>
                                    
                                    <input type="submit" class="btnRegister" name="login" value="LogIn" />
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>