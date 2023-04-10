// Real time updating user card 
const register_description = document.getElementById("Register-description");
const register_card_description = document.getElementById("Register-card-description");
const register_firstname = document.getElementById("Register-firstname");
const register_card_firstname = document.getElementById("Register-card-firstname");
const register_name = document.getElementById("Register-name");
const register_card_name = document.getElementById("Register-card-name");

register_description.addEventListener("input", function() {
    if(register_description && register_card_description){
        if(register_description.value == ""){
            register_card_description.textContent = "       Votre description s'affichera ici";
        }else{
            register_card_description.textContent = register_description.value;
        }
        
    }
  });

  register_firstname.addEventListener("input", function() {
    if(register_firstname && register_card_firstname){
        register_firstname.value  = register_firstname.value.replace(' ', ''); 
        if(register_firstname.value == ""){
            register_card_firstname.textContent = "Nom ";
        }else{
            register_card_firstname.textContent = register_firstname.value;
        }
        
    }
  });

  register_name.addEventListener("input", function() {
    if(register_name && register_card_name){
        if(register_name.value == ""){
            register_card_name.textContent = "Prénom ";
        }else{
            register_card_name.textContent = register_name.value;
        }
        
    }
  });


