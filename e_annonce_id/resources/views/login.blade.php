<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from wpkixx.com/html/winku/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 20:02:44 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
	<title>Winku Social Network Toolkit</title>
    <link rel="icon" href="{{asset('assets_1/images/fav.png')}}" type="image/png" sizes="16x16"> 
      
    <link rel="stylesheet" href="{{asset('assets_1/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_1/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets_1/css/color.css')}}">
    <link rel="stylesheet" href="{{asset('assets_1/css/responsive.css')}}">

</head>
<body>
<!--<div class="se-pre-con"></div>-->
<div class="theme-layout">
	<div class="container-fluid pdng0"> 
		<div class="row merged">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
			<img src="{{asset('assets_1/images/resources/player1.jpg')}}" alt="" style="height:780px">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
				<div class="login-reg-bg">
					<div class="log-reg-area sign">
						<h2 class="log-title">Login</h2>
							<p>
							If you are a club and want to register <a href="{{url('registerclube')}}" title="click here">click here</a> or <a href="#" title="">Join now</a>
							</p>
                        <form action="{{url('loginValUser')}}" method="post">
                                {{csrf_field()}}
							<div class="form-group">	
							  <input type="text" id="input" required="required" name="email"/>
							  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password" required="required" name="password"/>
							  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
							</div>
							<div class="checkbox">
							  <label>
								<input type="checkbox" checked="checked"/><i class="check-box"></i>Always Remember Me.
							  </label>
							</div>
							<a href="#" title="" class="forgot-pwd">Forgot Password?</a>
							<div class="submit-btns">
								<button class="mtr-btn signin" type="submit"><span>Login</span></button>
								<button class="mtr-btn signup" type="button"><span>Register</span></button>
							</div>
						</form>
					</div>
					<div class="log-reg-area reg" style="position: relative;top: 400px; margin-bottom:30px;">
						<h2 class="log-title">Register</h2>
                        <form action="{{url('storeUser')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
							<div class="form-group">	
							  <input type="text" required="required" name="nom"/>
							  <label class="control-label" for="input">First Name</label><i class="mtrl-select"></i>
							</div>
                            <div class="form-group">	
							  <input type="text" required="required" name="prenom"/>
							  <label class="control-label" for="input">Last Name</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="email" required="required" name="email"/>
							  <label class="control-label" for="input">Email</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="password" required="required" name="password"/>
							  <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>
							</div>
							<!-- <div class="form-radio">
							  <div class="radio">
								<label>
								  <input type="radio" name="radio" checked="checked"/><i class="check-box"></i>Male
								</label>
							  </div>
							  <div class="radio">
								<label>
								  <input type="radio" name="radio"/><i class="check-box"></i>Female
								</label>
							  </div>
							</div> -->
                            <div class="form-group">	
							  <input type="date" required="required" name="dateNaissance"/>
							  <label class="control-label" for="input">Date Naissance</label><i class="mtrl-select"></i>
							</div>
							<div class="form-group">	
							  <input type="tel" required="required" name="tel"/>
							  <label class="control-label" for="input">Tel</label><i class="mtrl-select"></i>
							</div>
                            <div class="form-group">	
							  <input type="text" required="required" name="adresse"/>
							  <label class="control-label" for="input">Adress</label><i class="mtrl-select"></i>
							</div>
                            <div class="form-group">	
							  <input type="text" required="required" name="ville"/>
							  <label class="control-label" for="input">Ville</label><i class="mtrl-select"></i>
							</div>	
                            <div class="edit-phto" style="position: relative;left: 0px;bottom: -10px;">
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Your Photo
                                <input type="file" name="image">
                                </label>
                            </div>
							<div class="edit-phto" style="position: relative;left: 0px;bottom: -10px;">
                                <i class="fa fa-camera-retro"></i>
                                <label class="fileContainer">
                                    Your Cover Photo 
                                <input type="file" name="coverture">
                                </label>
                            </div>
								
							<div class="submit-btns">
								<button class="mtr-btn signin" type="submit"><span>Register</span></button>
                                <a href="#" title="" class="already-have">Already have an account</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	
	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('assets_1/js/main.min.js')}}"></script>
	<script src="{{asset('assets_1/js/script.js')}}"></script>

</body>	

<!-- Mirrored from wpkixx.com/html/winku/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 20:02:44 GMT -->
</html>