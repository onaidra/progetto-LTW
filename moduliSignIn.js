function validaForm() {
    if (document.registr.username.value=="") {
    alert("Insert Username");
    return false;
    }
    if (document.registr.email.value=="") {
    alert("Insert e-mail");
    return false;
    }
    if (document.registr.password_1.value=="") {
    alert("Insert password");
    return false;
    }
    if(document.registr.password_2.value==""){
    alert("Insert Confirm Password");
    return false;
    }
    if(document.registr.password_2.value!=document.registr.password_1.value){
        alert("the two password doesn't match");
    }
    return true;
}