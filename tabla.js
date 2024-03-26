for (let index = 0; index < 20; index++) {
    let saludo = document.createElement("div");
    saludo.innerHTML = "hola";
    saludo.className = "rifa";
    saludo.id = `rifa${index}`
    document.getElementById("tabla").appendChild(saludo);

console.log(saludo)

}