function showCategories(page){
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
	xmlhttp.open("GET", "index.php?action=resultCategories&start="+(page-1)*10, true);
	xmlhttp.send();
}
function showAddCategories(){
	AddCategories.style.display = (AddCategories.style.display == "none")? "block":"none";
	progressBar.value = 0;
	_file.value ="";
	nameCategories.value="";
}

function SaveCategories(){
	nameCategories = document.getElementById('nameCategories').value; 
	_file = document.getElementById('_file'); 
	if(_file.files.length === 0 || nameCategories=="") {
    	return;
	}
	var data = new FormData();
	data.append("nameCategories",nameCategories);
	data.append('SelectedFile', _file.files[0]);
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("alertSaveCategories").innerHTML = this.responseText;
			showCategories(1);
		}	
	};
	xmlhttp.upload.addEventListener('progress', function(event){
       var percent = (event.loaded / event.total) * 100;
       progressBar.value = Math.round(percent);
    }, false);
    xmlhttp.open("POST", "index.php?action=SaveCategories");
	xmlhttp.send(data);
}