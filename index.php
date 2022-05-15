<!-- localhost/MT/Working/ok/layout333_with_darkmode.php -->
<!-- layoutUI-->
<!--http://sumitprabhatkeyur.epizy.com-->
<!--http://sumitprabhatkeyur.epizy.com/layout333_with_darkmode.php?i=1-->
<!--https://bit.ly/3womn5Q-->
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="CSS/layout333.css">
<script src="JS/jquery.js"></script>
<script src="JS/layout333_with_darkmode.js"></script>


</head>
    <body>
<!-- top bar navigation from w3schools -->
<div class="topnav" id="myTopnav">
  <a href="#home" class="active">Home</a>
  <a href="about_with_darkmode.html">About</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction1()">
    <i class="fa fa-bars"></i>
  </a>
</div>

<!-- title logo -->
<div style="padding-left:12px">
 <center><h2 style = "font-family:verdana;">Phonify</h2></Center>
</div>

<!-- dark mode toggle -->
<div  style="margin:auto;max-width:700px" >
<label class="switch" style="float : right" >
   <input type="checkbox" onclick="darkmode()">
  <span class="slider"></span>
</label>
    
<!--filter dropdown button uisng span--> 
<div class="dropdown" style="float : right" >
  <button onclick="myFunctionb()" class="dropbtn">Filters</button>
  <div id="myDropdown" class="dropdown-content" >
      <a  id="HtL" name="HtL" onclick="filter_descending()">Sort High to Low</a>
      <a href="#LtH" id="LtH" onclick="searchbuttonpressed_filter_ascending()">Sort Low to High</a>
<!--    <a href="#Raw">Raw Results</a>-->
  </div> 
  <span  >&nbsp;</span>  
<!--give space after dropdown it was big prob solved-->
</div>

<!-- category button -->
<div class="dropdown" style="float : left;" >
  <button  class="dropbtn"  style="background-color:blue;">Mobiles</button>
  <span  >&nbsp;</span> 
</div>


</div>
<br><br>
<!-- end -->
<!-- end -->	
        
<!-- Center responsive search bar from w3 schools -->

<br>
<form class="example" action="javascript:void(0);" style="margin:auto;max-width:700px" autocomplete="off" method="post">
  <input type="text" placeholder="Search.." name="search_query" id="search_query" />
  <button  onclick="searchbuttonpressed_filter_ascending()" name="sub" id="sub">Search<i class="fa fa-search"></i></button>
</form>		

<!-- end -->	

<!-- show result and contents -->	
<div  style="margin:auto;max-width:700px; display:none;"  id="welcomeDiv" >
<br><p style = "font-family:verdana; font-size: 12.5px;">Results :</p><br>
<div id="div1"> </div>



</div>

<!-- end -->			

    </body>
</html>
