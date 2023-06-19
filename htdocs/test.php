<html>
  <head>
    <title>Place Autocomplete</title>
    <script async
      
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCr43Thj2TqhvSKrUTiT1hFfGT5TRzBcE&libraries=places&callback=initMap">
    </script>
    <link rel="stylesheet" type="text/css" href="./style.css" />
  </head>
  <body>
    <input id="autocomplete" placeholder="Enter a place" type="text">
    <script>
      let autocomplete;
      function initAutocomplete(){
        autocomplete = new google.maps.places.Autocomplete(document.getElementById('autocomplete'),
          {
            types: ['establishment'],
            componentRestrictions: {'country' : ["AU"]},
            fields: ['place_id', 'geometry', 'name']
          });
      }
    </script>
  </body>
</html>
