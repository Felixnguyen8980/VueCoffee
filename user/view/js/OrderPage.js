var Categories="";
var Products="";
var Selected="";
var ProductsObj;
var CategoriesObj;
var ArrayChoose;
loadcategory();
loadproducts();
function loadcategory(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			 CategoriesObj = JSON.parse(this.responseText);
			for (x in CategoriesObj) {
          		 Categories += "<div class='categoriesElement' onclick='OpenProduct("+CategoriesObj[x].id+")'>"
          		 +"<p>"+CategoriesObj[x].name +"</p>"
          		 +"<img src='admin/uploads/image/"+CategoriesObj[x].image+"' alt=''>"
          		 +"</div>";
        	}
        	document.getElementById("Categories").innerHTML = Categories;
		}
	};
	xmlhttp.open("GET", "index.php?action=resultCategories", true);
	xmlhttp.send();
}
function loadproducts(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			 ProductsObj = JSON.parse(this.responseText);
			for (x in ProductsObj) {
          		 Products += "<div class='ProductElement "+ProductsObj[x].categories_id+"' >"
          		 +"<p>"+ProductsObj[x].name +"</p>"
          		 +"<img src='admin/uploads/image/"+ProductsObj[x].image+"' alt=''>"
          		 +"<div>"+ProductsObj[x].prices+"</div>"
          		 +"<div>"+"<button class='btn' id='"+x+"' onclick='choose(this.id)'>Select</button>"+"</div>"
          		 +"</div>";
        	}
        	document.getElementById("Products").innerHTML = Products;
		}
	};
	xmlhttp.open("GET", "index.php?action=resultProducts", true);
	xmlhttp.send();
}
function OpenProduct(category){
	Product = document.getElementsByClassName("ProductElement");
	Choose = document.getElementsByClassName(category)
	for (i = 0; i < Product.length; i++) {
	  		Product[i].className = Product[i].className.replace(" active", "");
		 }

	for (i = 0; i < Choose.length; i++) {
	  		Choose[i].className +=" active" ;
		 }	 	
}
function choose(id){
	document.getElementById(id).disabled = true;
	Selected +=String(id)+",";
	ArrayChoose = Selected.split(",");
	writedownCart();

}
function showdetailCart(){
	detailCart.style.display = (detailCart.style.display=="none")? "block":"none";
}
function writedownCart(){
	var ResultCart="";
	for (i = 0; i < ArrayChoose.length-1; i++){
		x = parseInt(ArrayChoose[i]);
		ResultCart +="<div class='cartElement'>"
		+"<div>"
		+ProductsObj[x].name
		+"</div>"
		+"<div>"
		+ "quantity:<input type='text' class='quantity' style='width:20px'>"
		+"</div>"
		+"<div>"
		+ "<button class='btn_unSelected' onclick='UnSelected("+i+")'>UnSelected</button>"
		+"</div>"
		+"</div>";
	}
	document.getElementById("infoCart").innerHTML = ResultCart;
}
function UnSelected(i){
	document.getElementById(ArrayChoose[i]).disabled = false;
	unSelect =String(ArrayChoose[i])+",";
	Selected = Selected.replace(unSelect,"");
	ArrayChoose = Selected.split(",");
	 writedownCart();
}
function Order(){
	var Order = [];
	var Count = [];
	quantity = document.getElementsByClassName('quantity');

	for(i = 0; i<ArrayChoose.length-1;i++){
		Order[i]=ArrayChoose[i];
		Count[i]=quantity[i].value;
	}

	//tao Order 
	var data = new FormData();
	data.append("phone",phone.value);
	data.append("address",address.value);
	data.append('product',Order);
	data.append('quantity',Count);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("alertInfoOrder").innerHTML = this.responseText;
		}	
	};
    xmlhttp.open("POST", "index.php?action=Order");
	xmlhttp.send(data);
}