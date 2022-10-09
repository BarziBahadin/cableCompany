

var search_input1 = document.querySelector("#search_input1");

search_input1.addEventListener("keyup", function(e){
  var span_items = document.querySelectorAll("h4");
  var table_body = document.querySelector(".card-box ");
  var search_item = e.target.value.toLowerCase();
 
 span_items.forEach(function(item){
   if(item.textContent.toLowerCase().indexOf(search_item) != -1){
      item.closest(".col-md-3").style.display = "";
   }
   else{
     item.closest(".col-md-3").style.display = "none";
     }
 })
  	
});