<script src="http://api.map.baidu.com/api?v=1.2" type="text/javascript"></script> 
var x=document.getElementById("m_city");
function getLocation()
  {
	  if (navigator.geolocation)
		{
			navigator.geolocation.watchPosition(showPosition,showError);
		}
	  else{x.innerHTML="Geolocation is not supported by this browser.";}
  }
function showPosition(position)
  {
	 var longitude =position.coords.longitude;
     var latitude = position.coords.latitude;
     var map = new BMap.Map("allmap");
     var point = new BMap.Point(longitude,latitude);
     var gc = new BMap.Geocoder();
     gc.getLocation(point, function(rs){
     var addComp = rs.addressComponents;
     /*alert(addComp.province + ", " + addComp.city + ", " + addComp.district + ", " + addComp.street + ", " + addComp.streetNumber);*/
	 x.innerHTML = addComp.city; 
     });
  }
function showError(error)
  {
	  switch(error.code) 
			{
				case error.PERMISSION_DENIED:
				  alert("用户拒绝请求地理位置");
				  break;
				case error.POSITION_UNAVAILABLE:
				 alert("位置信息不可用");
				  break;
				case error.TIMEOUT:
				  alert("用户位置请求超时");
				  break;
				case error.UNKNOWN_ERROR:
				  alert("发生未知错误");
				  break;
			}
  }
