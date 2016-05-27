<!DOCTYPE html><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<!-- Include Google Maps API -->
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>

<!-- Include jQuery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

<!-- Geolocation JS -->
<script type="text/javascript" src="{{asset('js/AdminMap.js')}}">


</script>
<link rel="stylesheet" href="{{asset('css/map.css')}}">
<!-- Map Container Styling -->
<style type="text/css">

    /* #Full Screen CSS (Desktop)
    ================================================== */
    #mapContainer {
        height: 500px;
        width: 920px;
        border:10px solid #eaeaea;
        margin-top:20px;
        margin-bottom:20px;
    }

    /* #Tablet (Portrait)
    ================================================== */
    @media only screen and (min-width: 768px) and (max-width: 959px) {
        #mapContainer {
            height: 500px;
            width: 708px;
        }
    }	

    /*  #Mobile (Portrait)
    ================================================== */
    @media only screen and (max-width: 767px) {
        #mapContainer {
            height: 260px;
            width: 260px;
        }
    }	

    /* #Mobile (Landscape)
    ================================================== */
    @media only screen and (min-width: 480px) and (max-width: 767px) {
        #mapContainer {
            height: 400px;
            width: 400px;
        }
    }	

</style>

</head>

<body>

    <!-- Map Container -->
    <div id="mapContainer"></div>

</body>

</html>