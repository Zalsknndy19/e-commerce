var beepIndex = $("#index")[0];$(".tables td, tr, a").mouseover(function() { beepIndex.play();});

function myFunction() {
    // Declare variables
    var input, filter, ol, li, a, i;
    input = document.getElementById('myInput');
    filter = input.value.toUpperCase();
    ol = document.getElementById("myUL");
    li = ol.getElementsByTagName('li');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  h = checkTime(h);
  m = checkTime(m);
  s = checkTime(s);
  var taun= today.getFullYear ();

var dinten= today.getDay ();

var sasih= today.getMonth ();

var kaping= today.getDate ();

var dintenarray=new Array("Ahad,","Senin,","Selasa,","Rabu,","Kamis,","Jum'at,","Sabtu,");

var sasiharray=new Array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

  document.getElementById('kapingwaktu').innerHTML = " <br> "+dintenarray[dinten]+" "+kaping+" "+sasiharray[sasih]+" "+taun+" <br> " + 
  h + ":" + m + ":" + s;
  setTimeout(startTime, 500);
}
function checkTime(i) {
  if (i < 10) {i = "0" + i;};  // add zero in front of numbers < 10
  return i;
}
$(document).ready(function(){
$(".loader2").fadeOut();
});

var inPut = $("#inputt")[0];$("input").mouseenter(function() { inPut.play();});
var bIp= $("#bipp")[0];$("input").mouseout(function() { bIp.play();});
	
	
	$("#myUL a, li")
  .each(function(i) {
    if (i != 0) { 
      $("#klik")
        .clone()
        .attr("id", "klik" + i)
        .appendTo($(this).parent()); 
    }
    $(this).data("beeper", i);
  })
  .mouseenter(function() {
    $("#klik" + $(this).data("beeper"))[0].play();
  });
$("#klik").attr("id", "klik0");

$("td")
  .each(function(i) {
    if (i != 0) { 
      $("#tdhvr")
        .clone()
        .attr("id", "tdhvr" + i)
        .appendTo($(this).parent()); 
    }
    $(this).data("beeper", i);
  })
  .mouseenter(function() {
    $("#tdhvr" + $(this).data("beeper"))[0].play();
  });
$("#tdhvr").attr("id", "tdhvr0");

var juduL = $('#h3hvr')[0]; $("h3").mouseenter(function() { juduL.play()});
var gariS = $('#hrhvr')[0]; $("hr").mouseenter(function() { gariS.play()});

