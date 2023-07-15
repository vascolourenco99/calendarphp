function openForm(dayOfMonth) {
  document.getElementsByClassName("modal")[0].style.display = "block";
  document.getElementById("modalDay").value = dayOfMonth;
}

function closeForm() {
  document.getElementsByClassName("modal")[0].style.display = "none";
}
