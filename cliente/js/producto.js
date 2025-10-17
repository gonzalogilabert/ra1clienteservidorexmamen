document.addEventListener('DOMContentLoaded', async () => {
  const params = new URLSearchParams(window.location.search);
  const id = params.get('id');
  const producto = await obtenerProducto(id);
  const contenedor = document.getElementById('producto');

  contenedor.innerHTML = `
    <div class="card mx-auto shadow" style="max-width: 500px;">
      <img src="${producto.img}" class="card-img-top" alt="${producto.nombre}">
      <div class="card-body">
        <h3 class="card-title">${producto.nombre}</h3>
        <p class="card-text">${producto.descripcion}</p>
        <p class="text-muted">Categoría: ${producto.categoria}</p>
        <h4 class="text-success">${producto.precio.toFixed(2)} €</h4>
        <button id="agregar" class="btn btn-success mt-3">Añadir al carrito</button>
      </div>
    </div>
  `;

  const card = contenedor.querySelector('.card');
  const title = contenedor.querySelector('.card-title');
  const text = contenedor.querySelector('.card-text');

  card.style.backgroundColor = 'yellow'; 
  card.style.borderRadius = '15px';       
  card.style.border = '2px solid black'; 

  title.style.color = 'black';           
  title.style.fontSize = '1.8rem';

  document.getElementById('agregar').addEventListener('click', () => {
    let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    carrito.push(producto);
    localStorage.setItem('carrito', JSON.stringify(carrito));
    alert('Producto añadido al carrito ');
  });
});
