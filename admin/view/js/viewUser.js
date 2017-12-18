function showUsers(page){
	select_btn = document.getElementsByClassName("btn-tini");
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
	xmlhttp.open("GET", "index.php?action=resultUsers&start="+(page-1)*10, true);
	xmlhttp.send();
}
function showAddUser(){
	AddUser.style.display = (AddUser.style.display =="none")? "block":"none";
}
function SaveUser(){
	getUsername = username.value;
	getPassword = password.value;
	getRoles_id = roles_id.value;
	param = "username="+getUsername+"&"+"password="+getPassword+"&"+"roles_id="+getRoles_id;
	if ( getUsername.match(/^[A-Za-z0-9_\.]{8,32}$/) && getPassword.match(/^([A-Z]){1}([\w_\.!@#$%^&*()]+){8,31}$/) ){
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
			document.getElementById("alertSaveUser").innerHTML = this.responseText;
			showUsers(1);
			}
		};
		xmlhttp.open("POST", "index.php?action=SaveUser");
		xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		xmlhttp.send(param);
	} else {
		document.getElementById("alertSaveUser").innerHTML = "Error! Check input username/password ";
	}
}