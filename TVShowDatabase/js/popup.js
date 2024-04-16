function openPopup(id) {
	var modal = document.getElementById(id);
  	modal.style.display = "block";
}

function closePopup(id) {
	var modal = document.getElementById(id);
  	modal.style.display = "none";
}
function statusCheck() {
	var checkBox = document.getElementById("status");
	var end_date = document.getElementById("end_date");
	if (checkBox.checked == true){
		end_date.style.display = "block";
	} else {
		end_date.style.display = "none";
	}
}