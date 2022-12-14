<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
#mapdiv{height:100%; width:100%;}
#map{ height:400px;width:600px; margin-left:20%;}
html,body{ height:100%;width:100%; padding:0; margin:0; }
</style>
</head>
<body >
   
<div class="container">
    <h1>How to Get Current User Location with Laravel</h1>
    <form method="post">
    	@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Latitude</label>
    <input type="text" name="Latitude" class="form-control" id="latvalue" value="" placeholder="Latitude">
   </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Longitude</label>
    <input type="text" name="Longitude" class="form-control" id="longvalue" value="" placeholder="Longitude">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    <div class="card">
              <h4>Latitude: <span id="latval"></span></h4>
                <h4>Longitude: <span id="longval"></span></h4> 
                <div class="latitudeAndLongitude"></div> 
        <div class="card-body">
          @if(isset($address))
            @foreach($address as $array)
            <li>{{$array}}</li>
            @endforeach
          @else
          <span> Submit Coordinates</span>
          @endif
          
        </div>
    </div>
</div>
<div class="mapdiv">
<div id="map"></div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVpPivRtI0iD2n3iwtBNfdym3ceuT3m-M"></script>
<script type="text/javascript">
///AIzaSyCrBW_-dZUneHu9WRiaFJ4a9f6k-QhRp2w
/// sir api : AIzaSyBVpPivRtI0iD2n3iwtBNfdym3ceuT3m-M
var map;     
$(document).ready(function(){
    getLocation();
    function getLocation() {
      if (navigator.geolocation) {
        //alert(navigator.geolocation.getCurrentPosition);
        navigator.geolocation.getCurrentPosition(success,fails);
      } 
    }
function success(position) {
  //alert(position);
  var Latitude = position.coords.latitude;
  var Longitude = position.coords.longitude;
  var maplatlng = new google.maps.LatLng(Latitude,Longitude);
  $('#latvalue').val(Latitude);
    $('#longvalue').val(Longitude);
    $('#latval').html(Latitude);
    $('#longval').html(Longitude);
  
  alert(maplatlng);
  createMap(maplatlng);
}

function fails(){
    alert('fails');
}
//
function createMap(maplatlng){
var mymap = new google.maps.Map(document.getElementById('map'),{
    center:maplatlng,
    zoom: 12
});
}

function createMaker(latlng,icn,name){
    var marker =   new google.maps.Marker({
        position:latlng,
        map:map
    });
}

});   
</script>

</body>
</html>