
const LeaveButton = document.getElementById("user-edit-leave");

LeaveButton.addEventListener('click', function CloseEditUser() {
  console.log('test');
  document.getElementById('profileEdit').style.display = 'none';
});


// Lire fichier importé 

function setImageEventListener($input, $image){
    
  const inputFile = document.getElementById($input);
  const monBouton = document.getElementById($image);
  
  inputFile.addEventListener('change', function() {
      const file = this.files[0];
      const reader = new FileReader();
    
      // Liste de types de fichiers acceptés
      const typesAcceptes = ['image/jpeg', 'image/jpg'];
    
      // Vérifie si le type du fichier est dans la liste des types acceptés
      if (typesAcceptes.indexOf(file.type) === -1) {
        // Si le type du fichier n'est pas dans la liste, affiche un message d'erreur
        console.error('Type de fichier non accepté');
        return;
      }
    
      reader.addEventListener('load', function() {
        monBouton.style.backgroundImage = `url(${reader.result})`;
      });
    
      reader.readAsDataURL(file);

      console.error('File imported');
    });
}

setImageEventListener('GetFileAvatar', 'button-import-avatar');
setImageEventListener('GetFileBackground', 'button-import-background');