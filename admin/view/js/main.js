onOpenLoad();
function onOpenLoad(){
	var url = location.href;
    var pos_key = url.lastIndexOf('#');
    if(pos_key > 0){
     var key = url.substr(pos_key+1);
	 switch (key){
	 	case 'Users':
	 		OpenSelector('Users');
	 	break;
	 	case 'Categories':
	 		OpenSelector('Categories');
	 	break;
	 	case 'Products':
	 		OpenSelector('Products');
	 	break;
	 }
    }
}
function OpenOption(evt,choose){
	dropdown = document.getElementsByClassName('dropdown');
	for (i = 0; i < dropdown.length; i++) {
  		dropdown[i].style.display = "none";
	 }

	if (evt.currentTarget.className.includes(" active")){
		evt.currentTarget.className = evt.currentTarget.className.replace(" active", "");
	} else {
		CloseOption();
		evt.currentTarget.className += " active";
	}
	switch (choose){
		case 'Account':
			if (evt.currentTarget.className.includes(" active")){
				Account.style.display="block";
			} else{
				Account.style.display="none";
			}
		break;

	}
}
function CloseOption(){
	option = document.getElementsByClassName("option");
	for (i = 0; i < option.length; i++) {
  		option[i].className = option[i].className.replace(" active", "");
	}
}
function OpenSelector(choose){
	Selector = document.getElementsByClassName("Selector");
	for (i = 0; i < Selector.length; i++) {
  		Selector[i].className = Selector[i].className.replace(" active", "");
	 }
	document.getElementById(choose).className += " active";
	switch (choose){
		case 'Users':
			viewUser();
		break;
		case 'Categories':
			viewCategories();
		break;
		case 'Products':
			viewProducts();
		break;
		case 'News':
			showNews();
		break;

	}
}
function viewUser(){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("mainContent").innerHTML = this.responseText;
           	showUsers(1);
        }
    };
	xmlhttp.open("GET", "index.php?action=viewUser", true);
    xmlhttp.send();
}
function viewCategories(){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("mainContent").innerHTML = this.responseText;
            showCategories(1);
        }
    };
	xmlhttp.open("GET", "index.php?action=viewCategories", true);
    xmlhttp.send();
}
function viewProducts(){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("mainContent").innerHTML = this.responseText;
            showProductsGroup(1);
        }
    };
	xmlhttp.open("GET", "index.php?action=viewProducts", true);
    xmlhttp.send();
}
