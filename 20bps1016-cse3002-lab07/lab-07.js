// function to display the news fro the chosen date
function changeNews() {
    var hl = document.getElementById("headlines");
    var ct = document.getElementById("content");
    var ar = document.getElementById("author");
    var dropdown = document.getElementById("date-options");
    var selectedDate = dropdown.options[dropdown.selectedIndex].value;
    if (selectedDate == "date-1") {        
        hl.innerHTML = "<h1>Assam government begins eviction drive to clear 'encroachment' in sanctuary in Sonitpur</h1>";
        ct.innerHTML = "The Assam government on Tuesday commenced an eviction drive to clear encroachment in Burhachapori Wildlife Sanctuary in Sonitpur district. Sonitpur Deputy Commissioner Deba Kumar Mishra claimed that thousands of people illegally occupied the forest area for decades and the administration has decided to clear encroachment on 1,892 hectares of land during the ongoing exercise.";
        ar.innerHTML = "Bhagya, Author and Research Head";
    } else if (selectedDate == "date-2") {
        hl.innerHTML = "<h1>Rose boom on Valentine&#39;s Day in Kolkata</h1>";
        ct.innerHTML = "It is believed that the Goddess of Love, Venus, loved red roses. No surprises that roses are considered to be the best gift for your dear one on Valentine's Day. With red roses flooding the markets all through the week, city florists are doing a great buisness after two years of lull.";
        ar.innerHTML = "Bhagya, Author and Research Head";
    } else if (selectedDate == "date-3") {
        hl.innerHTML = "<h1>Windfall Tax On Crude Oil, Aviation Fuel Cut, New Rates To Come Into Effect From February 16</h1>";
        ct.innerHTML = "The levy on crude oil produced by companies such as Oil and Natural Gas Corporation (ONGC) has been cut to Rs 4,350 per tonne from Rs 5,050 per tonne, the order dated February 15 said.";
        ar.innerHTML = "Alan, Chief Author";
    } else {
        hl.innerHTML = "";
        ct.innerHTML = "";
        ar.innerHTML = "";
    }
  }

  // function to display the customised advertisement
  function displayAd() {
    var size = document.getElementById("size").value;
    var color = document.getElementById("color").value;
    var topic = document.getElementById("topic").value;
    
    var url = "https://example.com/ad.html" + "?size=" + size + "&color=" + color + "&topic=" + topic;
    document.getElementById("ad-iframe").src = url;
  }

// designing the advertisement
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
ctx.moveTo(0,0);
ctx.lineTo(200,100);
ctx.stroke();
