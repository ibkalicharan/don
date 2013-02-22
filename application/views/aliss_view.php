<!DOCTYPE html>
<html>
  <head>

    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />

    <?php $this->load->view('stdcomponents/stdhead'); ?>

    <style type="text/css">
      html { height: 100% }
      body { height: 100%; margin: 0; padding: 0 }
      #map_canvas { height: 100% }
    </style>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCvl8SJyJclRdoAnsvTxt9eno4TRfZ7dnM&sensor=false">
    </script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script src="/ilw/resources/js/aliss.js"></script>
    <script type="text/javascript">
      function initialize() {
        var mapOptions = {
          center: new google.maps.LatLng(55.9483399, -3.1932723),
          zoom: 12,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        var map = new google.maps.Map(document.getElementById("map_canvas"),
            mapOptions);

        getAliss(map, "edinburgh", 100, "")
      }
    </script>
  </head>
  <body onload="initialize()">

    <div class="navbar">
      <div class="navbar-inner">
        <a class="brand" href="#">MyED <small>2.0 POC</small></a>
        <ul class="nav">
          <li><a href="/ilw/index.php/local">Back</a></li>
        </ul>
      </div>
    </div>

      <div id="map_canvas" style="width:100%; height:100%"></div>


  </body>
</html>
