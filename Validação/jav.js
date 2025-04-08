document.getElementById("loginForm").addEventListener("submit", function(event){
      event.preventDefault();


   const Username = document.getElementById("username").value;
   const Password = document.getElementById("password").value;

 if(!Username || !Password){
    alert("Preencha todos os campos.");
    return;
}

 if(Password.legth <8){
    alert("A senha deve ter pelo menos 8 caracteres.");
    return;
}

 localStorage.setItem("username",Username);

  window.location.href = "painel.html";
  alert("Login bem sucedido!");
});
 