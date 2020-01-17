var search_btn = document.getElementById("search-btn");
var search_box = document.getElementById("search-box");
var awayFrmSearch = document.getElementById("awayFrmSearch");
var idea = document.getElementById("idea");


function togleSrchBox() {

    if(search_box.style.left == "0px")
    {
        search_btn.style.left = "0px";
        search_box.style.left = "-300px";
        idea.style.marginLeft = "0px";
    }
    else 
    {
        search_btn.style.left = "300px";
        search_box.style.left = "0";
        idea.style.marginLeft = "100px";
    }

}

search_btn.addEventListener("click", togleSrchBox)

// in search form

var inpt = document.getElementById("srch");
var lbl = document.getElementById("srch-lbl");

inpt.addEventListener("input", function() {
   
    lbl.style.top = "-60px";
    lbl.style.left = "50px";
    lbl.style.fontSize = "14px";
    lbl.style.zIndex = "3";
    lbl.style.backgroundColor = "rgb(7,34,138)";
    inpt.style.border = "1px solid white";

})

