<!DOCTYPE html>
<html>
<head>
    <title>Irina and Anton</title>
</head>
<body>
<h1>This is Irina and Anton wedding celebration page!</h1>
<a href="addComment.html">Add your congratulation!</a>
<div id="skrollr-body">
    <h1>SVG IS AWESOME (so is skrollr)</h1>
    <p>Scroll down for details</p>
    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="900px" height="1200px">
        <path
            style="fill:none;stroke:#333333;stroke-width:7;stroke-linecap:round;stroke-linejoin:miter;stroke-miterlimit:4;stroke-opacity:1;stroke-dasharray:6000;stroke-dashoffset:0"
            data-0="stroke-dashoffset:6000;" data-end="stroke-dashoffset:0;"

            d="m 199.16266,227.29566 c 0,0 -35.71429,-184.285714 37.14286,-210.000004 72.85714,-25.7142792 95.40137,3.16127 134.28572,42.85715 C 462.01038,153.47988 433.14019,231.62843 612.01981,188.72422 740.78435,157.8401 648.46996,-124.25341 423.44838,73.009946 397.57737,95.689556 342.01981,227.29566 322.01981,268.72423 c -20,41.42857 -15.71429,142.85714 64.28571,222.85714 80,80 143.73919,-10.78923 207.14286,17.14286 89.11717,39.26002 175.71428,70 214.28571,198.57143 38.57143,128.57142 -224.28571,45.71428 -311.42857,50 -87.14286,4.28571 -174.7636,-13.7114 -273.33504,69.14573 -98.57143,82.85724 -123.427376,147.71354 -133.893126,125.93684 -13.988987,-29.1077 -55.031934,-20.6196 -72.436974,2.587 -35.52138,47.36187 48.898892,49.25187 59.501803,81.06057 11.228801,33.6863 -55.491303,91.6685 -70.7122836,61.2265 -14.3563298,-28.7127 55.6559746,-11.2104 68.9875946,-11.2104 59.313946,0 106.207266,-47.3062 135.388156,-93.99577 9.07249,-14.516 16.34065,-34.5597 6.03641,-50.0161 -24.31744,-36.4761 -61.10674,32.1704 -64.67586,50.0161 -1.78804,8.94027 -18.73345,93.13327 -18.9716,93.13327 -15.39093,0 28.03002,-116.70147 77.61105,-83.6473 22.80402,15.2025 -31.82409,33.8676 -43.11725,31.0443 -2.54514,-0.6362 -14.1213,-7.4374 -16.38456,-5.174 -1.98676,1.9867 9.07416,13.8365 10.34816,16.3845 2.87494,5.7499 10.51739,15.8661 17.24688,18.1092 69.57702,23.1924 68.47583,-63.69675 106.93079,-50.8783 25.47788,8.4926 17.93869,61.2265 13.79751,61.2265 -4.54633,0 1.86112,-32.5889 2.58704,-36.2185 1.63481,-8.1741 -8.336,-25.008 0,-25.008 23.1702,0 56.38131,-4.3117 84.50982,-4.3117 6.92267,0 20.69627,8.6474 20.69627,1.7246 0,-22.13767 -106.83933,7.883 -73.29932,52.6031 15.39517,20.5269 45.97363,7.0247 56.91476,-11.2104 4.27342,-7.1224 5.92963,-41.2859 6.03643,-41.3927 3.30032,-3.3003 25.38957,-5.1906 31.04441,-7.7611 8.17799,-3.71727 116.56888,-61.61957 80.19809,-70.71237 -62.06519,-15.5162 -84.81857,132.80117 -47.42898,132.80117 39.83429,0 168.06934,-127.94377 127.62705,-141.42457 -48.77358,-16.2579 -78.2302,99.41297 -51.74069,125.90247 20.35735,20.3573 58.34681,-22.9907 73.29932,-37.9432 37.20757,-37.20767 16.38455,62.9731 16.38455,52.603 0,-50.488 -2.86125,-72.28997 41.39257,-61.2265 18.42188,4.6055 41.59056,-2.80515 61.22649,0 33.65343,4.8077 18.48038,96.0268 157.85652,147.0903"
            />
    </svg>
    <p>
        <?php


        function createConnection()
        {

            $hostname = "localhost";
            $username = "irinaand_anton";
            $password = "12345qwert";
            $database = "irinaand_anton";

            $mysqli = new mysqli($hostname, $username, $password, $database);

            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }

            return $mysqli;

        }

        function closeConnection($mysqli)
        {
            $mysqli->close();
        }

        function fetchAllComments($mysqli)
        {
            $selectCommentsSql = "select * from comments";

            $result = mysqli_query($mysqli, $selectCommentsSql);

            $comments = array();

            if ($result) {

                while ($row = $result->fetch_assoc()) {
                    $comments[] = $row;
                }

                $result->free();
            }
            closeConnection($mysqli);

            return ($comments);

        }


        $mysqli = createConnection();

        $comments = fetchAllComments($mysqli);

        foreach ($comments as $comment) {
            printf("Name: %s <br/> comment: %s <br/>",$comment["owner_name"], $comment["text"]);
        }
        //  echo phpinfo();
        ?>



    </p>

</div>

<script type="text/javascript" src="../dist/skrollr.min.js"></script>
<script type="text/javascript">
    skrollr.init({
        forceHeight: false
    });
</script>

</body>
</html>
