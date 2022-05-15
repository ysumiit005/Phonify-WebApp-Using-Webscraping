
function showDiv() {
   document.getElementById('welcomeDiv').style.display = "block";
}

/* <!-- script for import jquery and their functions --> */
/* <script src="js/jquery.js"> */
/* <!--script from w3 sxhool for loading results in result div without refreshing website AJAX --> */

$(document).ready(function(){
  $("#sub").click(function(){
	var city_name=$("#city").val();
	$.ajax({
      url:'scrapnshow33modified.php',
      data:{city:city_name},
      type:'GET',
	  success:function(data) {
        $("#div1").html(data);
      }
/*     $("#div1").load("scrapnshow.php"); */
  });
 });
});

/* <!-- end --> */

/* <!-- script for drop down filters button --> */
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */

function myFunctionb() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

/* <!-- pass variable to php from codespeedy.com --> */
/* <!-- 
$(document).ready(function(){
  
  $("#sub").click(function() {
    var city_name=$("#city").val();
    var country_name=$("#country").val();
    $.ajax({
      url:'ajax.php',
      data:{city:city_name, country:country_name},
      type:'POST',
      success:function(data) {
        $("#result").html(data);
      }
    });
    
  });
  
});
 --> */
 
 /* top nav responsive mobile js */
 function myFunction1() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

/* Script for dark mode from w3schools.com */
function darkmode() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
/* end */