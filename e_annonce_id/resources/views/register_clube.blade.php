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
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<img src="{{asset('204.jpg')}}" alt="" style="height:1400px">
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="row merged20">
                    <div class="central-meta" style="margin:30px">
                        <div class="editing-info">
                            <h5 class="f-title"><i class="ti-info-alt"></i> Create Your Count</h5>
                            <form action="{{url('storeClube')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group half">	
                                    <input type="text" id="input" name="nom" required="required">
                                    <label class="control-label" for="input">Nom de Responsable</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group half">	
                                    <input type="text" required="required" name="prenom">
                                    <label class="control-label" for="input">Prenome de Responsable</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">	
                                    <input type="text" required="required" name="brand_name">
                                    <label class="control-label" for="input">Nome De Clube@</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">	
                                    <input type="email" required="required" name="email">
                                    <label class="control-label" for="input">Email.</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">	
                                    <input type="password" required="required" name="password">
                                    <label class="control-label" for="input">Password.</label><i class="mtrl-select"></i>
                                </div>											
                                <div class="form-group">	
                                    <input type="text" required="required" name="tel">
                                    <label class="control-label" for="input">Telephone</label><i class="mtrl-select"></i>
                                </div>
                                
                                <h5 class="f-title ext-margin"><i class="ti-share"></i> Your Social Accounts</h5>
                                <div class="form-group">	
                                    <textarea rows="4" id="textarea" required="required" name="adresse"></textarea>
                                    <label class="control-label" for="textarea">Adresse</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group">	
                                    <select style="display: none;" name="ville">
                                    <option value="country" disabled>Ville</option>
                                        <option value="Marrakech">Marrakech</option>
                                        <option value="Rabat">Rabat</option>
                                        <option value="Fes">Fes</option>
                                    </select>
                                    <div class="chosen-container chosen-container-single" style="width: 503px;" title="">
                                </div>
                                <div class="form-group">
                                    <div id="map-canvas" style="height: 400px;width:630px;"></div>
                                </div>
                                <div class="form-group half">	
                                    <input type="text" required="required" name="laltitude" id="lat" />
                                    <label class="control-label" for="input">latitude</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group half">	
                                    <input type="text" required="required" name="longitude" id="lng" />
                                    <label class="control-label" for="input">longitude</label><i class="mtrl-select"></i>
                                </div>
                                <div class="form-group half">	
                                    <div class="edit-phto" style="position: relative;left: 0px;bottom: -10px;">
                                        <i class="fa fa-camera-retro"></i>
                                        <label class="fileContainer">
                                            Logo de Clube
                                        <input type="file" name="image">
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group half">	
                                    <div class="edit-phto" style="position: relative;left: 0px;bottom: -10px;">
                                        <i class="fa fa-camera-retro"></i>
                                        <label class="fileContainer">
                                             Cover Photo de Clube
                                        <input type="file" name="coverture">
                                        </label>
                                    </div>
                                </div>
                                <div class="submit-btns">
                                    <a href="{{url('logine')}}" class="mtr-btn"><span>Cancel</span></a>
                                    <button type="submit" class="mtr-btn"><span>Save</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
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
            lat: 31.631980,
            lng: -7.987120
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
            zoom: 13,
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

<!-- Mirrored from wpkixx.com/html/winku/landing.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2019 20:02:44 GMT -->
</html>