// Lire fichier importé 

function setImageEventListener(input, image){
    
    input.addEventListener('change', function() {
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
            image.style.backgroundImage = `url(${reader.result})`;
        });
      
        reader.readAsDataURL(file);

        console.log('File imported');
      });
}


const ThumbnailInput = document.getElementById("GetFileThumbnail");
const ThumbnailButton = document.getElementById("button-import-thumbnail");

ThumbnailButton.addEventListener('click', function(){
    ThumbnailInput.click();
});

setImageEventListener(ThumbnailInput, ThumbnailButton);

const BackgroundInput = document.getElementById("GetFileBackground");
const BackgroundButton = document.getElementById("button-import-background");

BackgroundButton.addEventListener('click', function(){
    BackgroundInput.click();
});

setImageEventListener(BackgroundInput, BackgroundButton);