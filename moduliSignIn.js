function validaForm() {
    if (document.registr.name.value=="") {
    alert("Insert Username");
    return false;
    }
    if (document.registr.email.value=="") {
    alert("Insert e-mail");
    return false;
    }
    if (document.registr.password.value=="") {
    alert("Insert password");
    return false;
    }
    if(document.registr.password2.value==""){
    alert("Insert Confirm Password");
    return false;
    }
    return true;
}