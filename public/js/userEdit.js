
const LeaveButton = document.getElementById("user-edit-leave");

LeaveButton.addEventListener('click', function CloseEditUser() {
  console.log('test');
  document.getElementById('profileEdit').style.display = 'none';
});