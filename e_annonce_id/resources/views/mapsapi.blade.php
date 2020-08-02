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
    <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
    
</head>
<body>
	<div class="container"> 
		<div class="row">
			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
				
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" >
                <div class="" style="position: relative;top: 400px; margin-bottom:30px;">
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
                        <!-- <div class="form-group">	
                            
                            <label class="control-label" for="input">Search</label><i class="mtrl-select"></i>
                        </div> -->
                        <div class="form-group">
                            <div id="map-canvas" style="height: 400px;width:500px;"></div>
                        </div>
                        <div class="form-group">	
                            <input type="text" required="required" name="lat" id="lat"/>
                            <label class="control-label" for="input">latitude</label><i class="mtrl-select"></i>
                        </div>
                        <div class="form-group">	
                            <input type="text" required="required" name="lon" id="lng"/>
                            <label class="control-label" for="input">longitude</label><i class="mtrl-select"></i>
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
	
	<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{asset('assets_1/js/main.min.js')}}"></script>
	<script src="{{asset('assets_1/js/script.js')}}"></script> 
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfsuGBlL2-xHYwaF8LFGWEApuAvSZTz1Q&callback=initMap">
    </script>
	<script>
   function initMap() {     
        var myLatlng = {
            lat: 31.594603,
            lng: -8.018857
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            zoom: 10,
            center: myLatlng,
            mapTypeId: 'terrain'
        });
        var markers = []
        map.addListener('click', function(e) {
           //Loop through all the markers and remove
           if (markers) {
            markers.map(d=>{
                d.setMap(null);
            })
          }
          var m = new google.maps.Marker({
            position: e.latLng,
            map: map
          })
          markers.push(m);
          map.panTo(e.latLng);
           console.log(m.getPosition().lat());
           console.log(m.getPosition().lng());
           document.getElementById('lat').value=m.getPosition().lat();
           document.getElementById('lng').value=m.getPosition().lng();
          
        });
    }
    </script>
 

</body>	
<!-- // google.maps.event.addListener(marker,'position_changed',function(){
        //   var lat=marker.getPosition().lat();
        //   var lng=marker.getPosition().lng();
        //   $('#lat').val(lat);
        //   $('#lng').val(lng);

        // }) -->
<!-- Mirrored from wpkixx.com/html/winku/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 20:02:44 GMT -->
</html>