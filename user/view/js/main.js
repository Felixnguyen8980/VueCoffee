function openCategory(category){
	highLight(category);
	viewProducts(category);
}
function highLight(category){
	categories=document.getElementsByClassName('category');
	for(i=0;i<categories.length;i++) {
		categories[i].className=
		categories[i].className.replace(" active","");
	}
	document.getElementById(category).className+=" active";
}
function viewProducts(category){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("info").innerHTML =
             this.responseText;
           	showProducts(1,category);
        }
    };
	xmlhttp.open("GET", "index.php?action=viewProductsPage&category="+category, true);
    xmlhttp.send();
}
function showProducts(page,category){
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result").innerHTML =
             this.responseText;
        }
    };
	xmlhttp.open("GET", "index.php?action=products&category="+category+"&start="+(page-1)*6, true);
    xmlhttp.send();

}