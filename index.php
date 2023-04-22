<?php
require("conn.php");
?>
<html>
	<head>
		<title>GST BILLING SYSTEM</title>
                <link href="css/bootstrap.min.css" rel="stylesheet">
                <link href="js/jquery.min.js" rel="stylesheet">
                <link href="js/bootstrap.min.js" rel="stylesheet"> 
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/main.css" type="text/css">
               <?php include 'bootstraplinks.php'; ?>
                        </head>
                        <body>
		<!-- Header -->
                     <?php include 'header.php'; ?>
                <!-- Banner -->
                <section id="banner" style="background-image:url(images/banner.jpg) ">
			<div class="inner">
				<header>
					<h1>WELCOME TO GST BILLING SYSTEM</h1>
				</header>

				<div class="flex ">

					<div>
						<span class="icon"></span>
                                                <a href="index.php"><h3>HOME</h3></a>
					</div>

					<div>
						<span class="icon "></span>
                                                <a href="signup.php?m1="><h3>REGISTER</h3></a>
						<p></p>
					</div>

					<div>
						<span class="icon"></span>
                                                <a href="login.php?error="><h3>LOGIN</h3></a>
						<p></p>
					</div>

				</div>

			</div>
			</section>
		<!-- Footer -->
                <footer id="footer" class="col-lg-push-12">
			<div class="inner">	
                                    <h3>Get in touch</h3>
                                    <form action="" method="post">
					<div class="field half first">
						<label for="name">Name</label>
						<input name="name" id="name" type="text" placeholder="Name">
					</div>
					<div class="field half">
						<label for="email">Email</label>
						<input name="email" id="email" type="email" placeholder="Email">
					</div>
					<div class="field">
						<label for="message">Message</label>
						<textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
					</div>
                                        <input value="Send Message" name="submit" type="submit" class="btn btn-lg btn-primary">					
				</form>
				<div class="copyright">
					&copy; Untitled. Design: <a href="#">GST</a>
				</div>
			</div>
			</footer>
		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<script src="js/main.js"></script>

	</body>
</html>
<?php
    if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $name = mysqli_real_escape_string($con, $name);
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($con, $email);
    $pan=$_POST['message'];
    $query = "INSERT INTO feedback(name, email, message)VALUES('" . $name . "','" . $email . "','" . $pan ."')";
    $ressult=mysqli_query($con, $query) or die(mysqli_error($con));
    if($ressult==1){
        $m = "<span class='red'>GST Number Already Exists</span>";
        echo '<h1>Thanks for Feedback</h1>';
        header( "refresh:3;url=index.php" );
    }
    }