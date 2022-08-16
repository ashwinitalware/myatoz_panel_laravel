<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Driver QR Code</title>
<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: white;
   color: black;
   text-align: center;
}
</style>
</head>

<body>
	<div style="padding:30%;">
		<div align="center" style=" margin-top:5%;  border-radius: 25px;   border: 2px solid 	#696969; width:50% height:150% ">
			<div style=" margin-top:5%;" >	<a><img src="{{asset('img/logo.png')}}" width="30%" /></a></div>
			<p style="font-size: 20px;">Scan QR-Code for Ride Booking<p>
			<div   align="center" style="margin-bottom:10%;   border-bottom-style: solid;"><div style="margin-bottom:10% ;>{!! QrCode::size(200)->generate($driver->driver_unique_no); !!}</div>
				</div>
			
			</div>
	</div>
	
	
	
	
	
          
             
      
 
              
                                                                  
            </body>
  </html>
