formulario = new FormData();

document.getElementById('submit').onclick = function() {
    let name = document.getElementById('name')
    let cpf = document.getElementById('cpf')
    let email = document.getElementById('email')
    let password = document.getElementById('password')
    let cpsw = document.getElementById('cpsw')

if(cpsw.value === null || cpsw.value != password.value){
    document.getElementById('cpsw').style.borderColor = 'red'
    document.getElementById('error').innerHTML = 'As senhas não conferem!'
    document.getElementById('error').style.backgroundColor = 'red'
    }else{
        if(name.value != "" || cpf.value != "" || email.value != "" || password.value != ""){
            formulario.append("name", name.value)
            formulario.append("cpf", cpf.value)
            formulario.append("email", email.value)
            formulario.append("password", password.value)

            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if(xmlhttp.readyState === 4 && xmlhttp.status === 200)
                alert(xmlhttp.responseText)
            }
            xmlhttp.open("POST","store", true)
            xmlhttp.send(formulario);

        }else{
            alert("Por favor preencha todos os dados!")
        }
        ajax_redirect("/index.blade.php")
    }
}
