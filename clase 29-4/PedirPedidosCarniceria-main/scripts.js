function agregarAlCarrito(nombre, precio) {
    // Crear un objeto producto con el nombre y precio
    var producto = {
        nombre: nombre,
        precio: precio
    };
    
    // Obtener el carrito actual del localStorage o inicializarlo si no existe
    var carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    
    // Agregar el producto al carrito
    carrito.push(producto);
    
    // Guardar el carrito actualizado en el localStorage
    localStorage.setItem('carrito', JSON.stringify(carrito));
    
    // Actualizar la visualización del carrito
    actualizarCarrito();
}

    // Función para actualizar la visualización del carrito
function actualizarCarrito() {
    // Obtener el carrito actual del localStorage
    var carrito = JSON.parse(localStorage.getItem('carrito')) || [];

    // Obtener el elemento de la lista del carrito
    var listaCarrito = document.getElementById('lista-carrito');

    // Limpiar el contenido previo del carrito
    listaCarrito.innerHTML = '';

    // Calcular el total
    var total = 0;

    // Iterar sobre los productos en el carrito
    carrito.forEach(function(producto) {
        // Crear un elemento de lista para cada producto
        var elementoProducto = document.createElement('li');
        elementoProducto.textContent = producto.nombre + ' - $' + producto.precio;
        
        // Agregar el producto a la lista del carrito
        listaCarrito.appendChild(elementoProducto);
        
        // Sumar el precio del producto al total
        total += parseFloat(producto.precio);
    });

    // Actualizar el total en la página
    document.getElementById('total').textContent = total.toFixed(2);
}

    // Función para realizar el pedido
function realizarPedido() {
    // Implementa la lógica para procesar el pedido aquí, por ejemplo, enviar los datos al servidor
    // Luego, limpiar el carrito y actualizar la visualización del mismo
    localStorage.removeItem('carrito');
    actualizarCarrito();
}
function mostrarContacto() {
    var contacto = document.getElementById("contacto");
    if (contacto.style.display === "none") {
        contacto.style.display = "block";
    } else {
        contacto.style.display = "none";
    }
}
function mostrarProductos() {
    // Oculta otros elementos y muestra solo los productos
    document.getElementById("productos").style.display = "block";
    // Oculta otros elementos si es necesario
}

    // Llama a la función para actualizar el carrito cuando la página se carga
    window.onload = actualizarCarrito;