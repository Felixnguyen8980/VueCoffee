function showProductsGroup(page){
	select_btn = document.getElementsByClassName("btn-tini");
	if (select_btn.length == 0){
		return;	
	}
	for (i = 0; i < select_btn.length; i++) {
  		select_btn[i].className = select_btn[i].className.replace(" active", "");
	 }
	 select_btn[page-1].className += " active";

	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("result").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "index.php?action=resultProductsGroup&start="+(page-1)*5, true);
	xmlhttp.send();
}
function showGroupDetail(index,group){
	select_group = document.getElementsByClassName("group");
	if (!select_group[index].className.includes(" active")){
		for (i = 0; i < select_group.length; i++) {
  			select_group[i].className = select_group[i].className.replace(" active", "");
	 	}
		select_group[index].className += " active";
		GroupDetail.className ="";
		btn_addProduct.style.display="none";
  			setTimeout(function(){
  				GroupDetail.className +="active";
  				btn_addProduct.style.display="block";
  				productPage(group);
  		}, 200)
	}
	AddProduct.style.display ="none";
	SaveProduct.value= group;
}
function ShowAddProduct(){
	document.getElementById('alertSaveProduct').innerHTML="";
	document.getElementById('name').value="";
	document.getElementById('description').value="";
	document.getElementById('prices').value="";
	document.getElementById('image').value="";
	AddProduct.style.display= (AddProduct.style.display=="none")? "block":"none";
}
function FunctionSaveProduct(group){
	name = document.getElementById('name').value; 
	description = document.getElementById('description').value; 
	prices = parseInt(document.getElementById('prices').value); 
	_file = document.getElementById('image'); 
	if(_file.files.length === 0 || name=="" || isNaN(prices) ) {
		alertSaveProduct.innerHTML = "Something wrong";
    	return;
	}
	if(!document.getElementById('prices').value.match(/^[0-9]{5,6}$/)){
		alertSaveProduct.innerHTML = "check price";
		return;
	}
	var data = new FormData();
	data.append("group",group);
	data.append("name",name);
	data.append('description',description);
	data.append('prices',prices);
	data.append('SelectedFile', _file.files[0]);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("alertSaveProduct").innerHTML = this.responseText;
			resultProduct(group,1);
		}	
	};
	xmlhttp.upload.addEventListener('progress', function(event){
       var percent = (event.loaded / event.total) * 100;
       progressBar.value = Math.round(percent);
    }, false);
    xmlhttp.open("POST", "index.php?action=SaveProduct");
	xmlhttp.send(data);
}

function resultProduct(group,page){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("resultProduct").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", "index.php?action=resultProduct&category="+group+"&start="+(page-1)*6, true);
	xmlhttp.send();
}
function productPage(group){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
		document.getElementById("ProductList").innerHTML = this.responseText;
		resultProduct(group,1);
		}
	};
	xmlhttp.open("GET", "index.php?action=productPage&category="+group, true);
	xmlhttp.send();
}
