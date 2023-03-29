
document.addEventListener('click', function CloseNotification() {
    const box = document.getElementById('editProfilBTN');
  
    if (box) {
        console.log("test");
      document.getElementById('profileEdit').style.display = 'block';
    }
  });
