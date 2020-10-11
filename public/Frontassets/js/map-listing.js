(function ($) {
    "use strict";
    function mainMap() {
        function locationData(locationURL, locationImg, locationTitle, locationAddress, locationCategory, locationStarRating, locationRevievsCounter, locationStatus) {
            return ('<div class="map-popup-wrap"><div class="map-popup"><div class="infoBox-close"><i class="fal fa-times"></i></div><a href="' + locationURL + '" class="listing-img-content fl-wrap"><div class="infobox-status '+ locationStatus +'">' + locationStatus + '</div><img src="' + locationImg + '" alt=""><div class="card-popup-raining map-card-rainting" data-staRrating="' + locationStarRating + '"><span class="map-popup-reviews-count">( ' + locationRevievsCounter + ' نظرات )</span></div></a> <div class="listing-content"><div class="listing-content-item fl-wrap"><div class="map-popup-location-category ' + locationCategory + '"></div><div class="listing-title fl-wrap"><h4><a href=' + locationURL + '>' + locationTitle + '</a></h4><div class="map-popup-location-info"><i class="fas fa-map-marker-alt"></i>' + locationAddress + '</div></div><div class="map-popup-footer"><a href=' + locationURL + ' class="main-link">جزئیات <i class="fal fa-long-arrow-left"></i></a><a href="#" class="infowindow_wishlist-btn"><i class="fal fa-heart"></i></a></div></div></div></div> ')
        }
	    //  Map Infoboxes ------------------
        var locations = [
            [locationData('listing-single2.html', 'images/all/1.jpg', 'رستوران مجلل', " ایران , تهران , زعفرانیه", 'cafe-cat', "5", "12", "باز"  ), 35.804896, 51.413373, 0 , 'images/all/1.jpg'],
            [locationData('listing-single.html', 'images/all/9.jpg', 'کنسرت', "ایران , تهران , زعفرانیه", 'event-cat', "4", "6", "27 اسفند 1399" ), 35.809368, 51.393469, 1, 'images/all/9.jpg'],
            [locationData('listing-single.html', 'images/all/31.jpg', 'باشگاه بدنسازی', " ایران , تهران , زعفرانیه", 'gym-cat', "3",  "4" , "بسته"   ), 35.809168, 51.391345, 2,  'images/all/31.jpg'],
            [locationData('listing-single.html', 'images/all/16.jpg', 'هتل مونت پلاسا', " ایران , تهران , زعفرانیه", 'hotels-cat', "4", "12","باز"  ), 35.808080, 51.391420, 3, 'images/all/16.jpg' ],
            [locationData('listing-single.html', 'images/all/28.jpg', 'فروشگاه صنایع دست', "ایران , تهران , زعفرانیه", 'shop-cat', "5", "9","بسته" ), 35.802807, 51.406141, 4,  'images/all/28.jpg'],
            [locationData('listing-single.html', 'images/all/18.jpg', 'کافه ژپتو در جردن', " ایران , تهران , زعفرانیه", 'cafe-cat', "4", "26", "باز"  ), 35.800936, 51.402354, 5,   'images/all/18.jpg'],
            [locationData('listing-single.html', 'images/all/46.jpg', 'هتل استقلال', "ایران , تهران , زعفرانیه", 'hotels-cat', "4", "12","باز" ), 35.800263, 51.428244, 6,  'images/all/46.jpg'],
            [locationData('listing-single2.html', 'images/all/50.jpg', 'کنفرانس طراحی وب', "ایران , تهران , زعفرانیه", 'event-cat', "5", "12","27 اسفند 1399" ), 35.799262, 51.426055, 7, 'images/all/50.jpg'],
            [locationData('listing-single2.html', 'images/all/25.jpg', 'باشگاه بدنسازی', "ایران , تهران , زعفرانیه", 'gym-cat', "3", "7","باز"  ), 35.799996, 51.413288, 8,   'images/all/25.jpg'],
            [locationData('listing-single3.html', 'images/all/56.jpg', 'هتل پلازا', "ایران , تهران , زعفرانیه", 'hotels-cat', "5", "12","باز"  ), 35.808502, 51.420111, 9, 'images/all/56.jpg'],
            [locationData('listing-single3.html', 'images/all/48.jpg', 'رستوران در مرکز شهر', "ایران , تهران , زعفرانیه", 'cafe-cat', "3", "8","باز"  ), 35.808894, 51.415186, 10,  'images/all/48.jpg'],
        ];
	    //   Map Infoboxes end ------------------
        var map = new google.maps.Map(document.getElementById('map-main'), {
            zoom: 15,
            scrollwheel: false,
            center: new google.maps.LatLng(35.804148, 51.411744),
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoomControl: false,
            mapTypeControl: false,
            scaleControl: false,
            panControl: false,
            fullscreenControl: true,
            navigationControl: false,
            streetViewControl: false,
            animation: google.maps.Animation.BOUNCE,
            gestureHandling: 'cooperative',
            styles: [{
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [{
                    "color": "#444444"
                }]
            }]
        });
        var boxText = document.createElement("div");
        boxText.className = 'map-box'
        var currentInfobox;
        var boxOptions = {
            content: boxText,
            disableAutoPan: true,
            alignBottom: true,
            maxWidth: 0,
            pixelOffset: new google.maps.Size(-150, -55),
            zIndex: null,
            boxStyle: {
                width: "300px"
            },
            closeBoxMargin: "0",
            closeBoxURL: "",
            infoBoxClearance: new google.maps.Size(1, 1),
            isHidden: false,
            pane: "floatPane",
            enableEventPropagation: false,
        };








      var markerCluster, overlay, i;
      var allMarkers = [];

      var clusterStyles = [
        {
          textColor: 'white',
          url: '',
          height: 50,
          width: 50
        }
      ];

      var ib = new InfoBox();
             google.maps.event.addListener(ib, "domready", function () {
                cardRaining();
 
            });
	  var markerImg;
	  var markerCount;
      for (i = 0; i < locations.length; i++) {
             var labels = '123456789';
		markerImg = locations[i][4];
		markerCount = locations[i][3] + 1;
        var overlaypositions = new google.maps.LatLng(locations[i][1], locations[i][2]),

        overlay = new CustomMarker(
         overlaypositions, map,{ marker_id: i},  markerImg , markerCount
        );

        allMarkers.push(overlay);

        google.maps.event.addDomListener(overlay, 'click', (function(overlay, i) {

        return function() {
             ib.setOptions(boxOptions);
             boxText.innerHTML = locations[i][0];
             ib.close();
             ib.open(map, overlay);
             currentInfobox = locations[i][3];
 
                    var latLng = new google.maps.LatLng(locations[i][1], locations[i][2]);
                    map.panTo(latLng);
                    map.panBy(0, -110);

            google.maps.event.addListener(ib,'domready',function(){
              $('.infoBox-close').click(function(e) {
                  e.preventDefault();
                  ib.close();
                  $('.map-marker-container').removeClass('clicked infoBox-opened');
              });

            });

          }
        })(overlay, i));

      }
        var options2 = {
            imagePath: '',
            styles: clusterStyles,
            minClusterSize: 2
        };
        markerCluster = new MarkerClusterer(map, allMarkers, options2);
        google.maps.event.addDomListener(window, "resize", function () {
            var center = map.getCenter();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });
 
        $('.map-item').on("click", function (e) {
            e.preventDefault();
            map.setZoom(15);
            var index = currentInfobox;
            var marker_index = parseInt($(this).attr('href').split('#')[1], 10);
            google.maps.event.trigger(allMarkers[marker_index-1], "click");
            if ($(window).width() > 1064) {
                if ($(".map-container").hasClass("fw-map")) {
                    $('html, body').animate({
                        scrollTop: $(".map-container").offset().top + "110px"
                    }, 1000)
                    return false;
                }
            }
        });
        $('.nextmap-nav').on("click", function (e) {
            e.preventDefault();
             map.setZoom(15);
            var index = currentInfobox;
            if (index + 1 < allMarkers.length) {
                google.maps.event.trigger(allMarkers[index+ 1], 'click');
            } else {
                google.maps.event.trigger(allMarkers[0], 'click');
            }
        });
        $('.prevmap-nav').on("click", function (e) {
            e.preventDefault();
            map.setZoom(15);
            if (typeof (currentInfobox) == "undefined") {
                google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
            } else {
                var index = currentInfobox;
                if (index - 1 < 0) {
                    google.maps.event.trigger(allMarkers[allMarkers.length - 1], 'click');
                } else {
                    google.maps.event.trigger(allMarkers[index - 1], 'click');
                }
            }
        });
      // Scroll enabling button
      var scrollEnabling = $('.scrollContorl');

      $(scrollEnabling).click(function(e){
          e.preventDefault();
          $(this).toggleClass("enabledsroll");

          if ( $(this).is(".enabledsroll") ) {
             map.setOptions({'scrollwheel': true});
          } else {
             map.setOptions({'scrollwheel': false});
          }
      });		
        var zoomControlDiv = document.createElement('div');
        var zoomControl = new ZoomControl(zoomControlDiv, map);
        function ZoomControl(controlDiv, map) {
            zoomControlDiv.index = 1;
            map.controls[google.maps.ControlPosition.RIGHT_CENTER].push(zoomControlDiv);
            controlDiv.style.padding = '5px';
            var controlWrapper = document.createElement('div');
            controlDiv.appendChild(controlWrapper);
            var zoomInButton = document.createElement('div');
            zoomInButton.className = "mapzoom-in";
            controlWrapper.appendChild(zoomInButton);
            var zoomOutButton = document.createElement('div');
            zoomOutButton.className = "mapzoom-out";
            controlWrapper.appendChild(zoomOutButton);
            google.maps.event.addDomListener(zoomInButton, 'click', function () {
                map.setZoom(map.getZoom() + 1);
            });
            google.maps.event.addDomListener(zoomOutButton, 'click', function () {
                map.setZoom(map.getZoom() - 1);
            });
        }
		
		
      // Geo Location Button
      $(".geoLocation, .input-with-icon.location a").on("click", function (e) {
          e.preventDefault();
          geolocate();
      });

      function geolocate() {

          if (navigator.geolocation) {
              navigator.geolocation.getCurrentPosition(function (position) {
                  var pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
                  map.setCenter(pos);
                  map.setZoom(12);
				  
		  var avrtimg = $(".avatar-img").attr("data-srcav");
         var markerIcon3 = {
            url: avrtimg,
        }		
        var marker3 = new google.maps.Marker({
            position: pos,
             map:  map,
 
            icon: markerIcon3,
            title: 'Your location'
        });			  
	 var myoverlay = new google.maps.OverlayView();
       myoverlay.draw = function () {
           // add an id to the layer that includes all the markers so you can use it in CSS
           this.getPanes().markerLayer.id='markerLayer';
       };
       myoverlay.setMap(map);			  
				  
              });
          }
      }		
    }
	
 	
	
	
	
 
	
	
	
    // Custom Map Marker
    // ----------------------------------------------- //

    function CustomMarker(latlng, map, args,   markerImg , markerCount) {
      this.latlng = latlng;
      this.args = args;
 
	  this.markerImg = markerImg;
	  this.markerCount = markerCount;
      this.setMap(map);
    }

    CustomMarker.prototype = new google.maps.OverlayView();

    CustomMarker.prototype.draw = function() {

      var self = this;

      var div = this.div;

      if (!div) {

        div = this.div = document.createElement('div');
        div.className = 'map-marker-container';

        div.innerHTML = '<div class="marker-container">'+
							'<span class="marker-count">'+self.markerCount+'</span>'+
                            '<div class="marker-card">'+
                               '<div class="marker-holder"><img src="'+self.markerImg+'" alt=""></div>'+
                            '</div>'+
                         '</div>'
 

        // Clicked marker highlight
        google.maps.event.addDomListener(div, "click", function(event) {
            $('.map-marker-container').removeClass('clicked infoBox-opened');
            google.maps.event.trigger(self, "click");
            $(this).addClass('clicked infoBox-opened');
        });


        if (typeof(self.args.marker_id) !== 'undefined') {
          div.dataset.marker_id = self.args.marker_id;
        }

        var panes = this.getPanes();
        panes.overlayImage.appendChild(div);
      }

      var point = this.getProjection().fromLatLngToDivPixel(this.latlng);

      if (point) {
        div.style.left = (point.x) + 'px';
        div.style.top = (point.y) + 'px';
      }
    };

    CustomMarker.prototype.remove = function() {
      if (this.div) {
        this.div.parentNode.removeChild(this.div);
        this.div = null; $(this).removeClass('clicked');
      }
    };

    CustomMarker.prototype.getPosition = function() { return this.latlng; };

    // -------------- Custom Map Marker / End -------------- //	
	
	
var head = document.getElementsByTagName( 'head' )[0];

// Save the original method
var insertBefore = head.insertBefore;

// Replace it!
head.insertBefore = function( newElement, referenceElement ) {

    if ( newElement.href && newElement.href.indexOf( 'https://fonts.googleapis.com/css?family=Roboto' ) === 0 ) {
        return;
    }

    insertBefore.call( head, newElement, referenceElement );
};	
	
	    var map = document.getElementById('map-main');
    if (typeof (map) != 'undefined' && map != null) {
        google.maps.event.addDomListener(window, 'load', mainMap);
    }
	
	
	
	
})(this.jQuery);