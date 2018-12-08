

function validapass(){
    pass= document.form.pass.value;
    reppass= document.form.rep_pass.value;

    if(pass != reppass){
        document.getElementById("advertpass").innerHTML="La contraseña no coincide";

    }else{
        document.getElementById("advertpass").innerHTML="La contraseña coincide";

    }
}
