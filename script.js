(function(window, google){
    //map options
     var options = {
        center: {
            lat:46.3601,
            lng: -71.0589
        },
        zoom:10
     },

        element = document.getElementById('map')
        //map
        map = new google.maps.Map(element, options);

        addMarker(46.3601,-71.0589);
        // var marker = new google.maps.Marker({
        //     position:{
        //         lat:46.3601,
        //         lng:-71.0589
                

        //     },
        //     map:map
        // });
        function addMarker(lat,lng){
            _createMarker(lat,lng);
        }
        function _createMarker(lat,lng){
            var opts = {
                position:{
                    lat:lat,
                    lng:lng
                },
                map:map
            };
            return new google.maps.Marker(opts);
        
        }
        

}(window, google));

