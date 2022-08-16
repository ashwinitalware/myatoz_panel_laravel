<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
<title>MyAtoz</title>
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" id="theme" href="{{asset('public/css/login.css')}}"/>
</head>

<body>
  <div class="container">
    <div class="header">
        <div class="header-image">
            <div class="header-image-particle header-image-particle-1"></div>
            <div class="header-image-particle header-image-particle-2"></div>
            <div class="header-image-particle header-image-particle-3"></div>
            <svg viewBox="0 0 1000 1000">
                <g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)">
                    <path d="M2901.7,4280.3c-1274.3-463.7-2048.5-755-2075.3-779.9c-80.5-74.7-99.7-139.9-128.4-448.4c-172.5-1849.2-9.6-3437.8,482.9-4691.1c210.8-538.5,527-1086.5,858.5-1494.7c298.9-367.9,760.8-776.1,1159.4-1025.2c553.8-346.8,1337.6-617,1791.7-620.9c486.8-3.8,1339.5,302.8,1916.3,687.9c550,367.9,1046.3,881.5,1420,1469.8C9187.2-1263.6,9524.4,689.2,9302.1,3052c-28.8,308.5-47.9,373.7-128.4,448.4C9118.2,3554,5078.6,5020,4994.3,5020C4959.8,5018.1,4018.9,4686.6,2901.7,4280.3z M6878,3705.4l1810.9-657.3l23-274c61.3-737.8,51.7-1690.2-24.9-2343.6c-191.6-1684.4-812.5-2977.9-1807.1-3779c-492.5-394.7-1145.9-701.4-1711.3-801c-182.1-32.6-189.7-32.6-390.9,7.7c-1293.5,260.6-2380,1203.4-2964.5,2569.8c-276,649.6-442.7,1368.2-534.7,2309.1c-32.6,331.5-28.7,1646.1,5.8,2027.4l26.8,283.6l1839.6,668.8c1167,423.5,1853.1,665,1878,657.3C5049.9,4368.5,5881.5,4067.6,6878,3705.4z" />
                    <path d="M4430.9,2691.7c-298.9-80.5-532.7-297-642-596c-36.4-103.5-42.2-159-49.8-663l-7.7-551.9h-86.2c-47.9,0-122.6-9.6-166.7-23c-105.4-30.7-264.5-189.7-295.1-295.1c-32.6-113.1-32.6-2010.2,0-2123.3c30.7-105.4,189.7-264.5,295.1-295.1c113.1-32.6,2930-32.6,3043.1,0C6627-1825,6786-1666,6816.7-1560.6c32.6,113.1,32.6,2010.2,0,2123.3C6786,668.1,6627,827.1,6521.6,857.8c-44.1,13.4-118.8,23-166.7,23h-86.2l-7.7,551.9c-7.7,504-13.4,559.6-49.8,663c-111.1,302.8-344.9,517.4-649.6,596C5410.1,2731.9,4576.5,2730,4430.9,2691.7z M5513.6,2053.6c122.7-88.2,128.4-113.1,134.1-668.8l5.7-504H5002h-653.5V1356c1.9,576.8,17.2,640.1,178.2,720.5c51.7,26.8,128.4,30.7,492.5,26.8C5437,2097.6,5452.3,2095.7,5513.6,2053.6z M5210.8,202.4c199.3-132.2,228-415.8,55.6-588.3l-74.7-74.7v-371.8c0-444.6,3.8-433.1-191.6-433.1c-195.5,0-191.6-11.5-191.6,433.1v371.8l-74.7,74.7c-153.3,153.3-155.2,385.2-1.9,538.5c42.2,42.2,103.5,84.3,138,93.9C4971.3,277.2,5128.4,258,5210.8,202.4z" />
                </g>
            </svg>
        </div>

        <h1 class="header-title text-center">
            Welcome to MyAtoz!
        </h1>

       <!--  <p class="text text-center">
            Keep your data safe
        </p> -->
    </div>

    <form autocomplete="off" method="post" action="{{ route('admin_login') }}">
        @csrf
        <div class="input app-input">
            <input type="text" name="username" placeholder="Username" />
           
        </div>

        <div class="input app-input">
            <input type="password" name="password" id="password" placeholder="Password" />
            
        </div>

        <button type="submit" class="button app-login-button">
            Login
        </button>
    </form>

</div>
</body>

</html>