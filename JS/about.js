
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}

var n = 2;

/* Script for dark mode from w3schools.com */
function darkmode() {
   var element = document.body;
   element.classList.toggle("dark-mode");
   
   if(n%2 === 0)
   {
   document.getElementById('mode').innerHTML
                = 'Light Mode';
        n++;
    }
    else
    {
       document.getElementById('mode').innerHTML
                = 'Dark Mode'; 
        n++;
    }

}
/* end */