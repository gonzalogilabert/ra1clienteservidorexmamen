<?php

header('Access-Control-Allow-Origin: *');


$productos = [
    [
        "id" => 1,
        "nombre" => "Camiseta básica",
        "descripcion" => "Camiseta de algodón 100% en varios colores.",
        "precio" => 12.99,
        "img" => "https://www.markamania.es/1127148-large_default/camiseta-blanca-stanleystella-rocker.jpg",
        "categoria" => "ropa"
    ],
    [
        "id" => 2,
        "nombre" => "Pantalón vaquero",
        "descripcion" => "Pantalón de mezclilla azul clásico.",
        "precio" => 29.95,
        "img" => "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT93K_eCYhC0fPWn7OCme2HtWUMFo-yetoTfA&s",
        "categoria" => "ropa"
    ],
    [
        "id" => 3,
        "nombre" => "Zapatillas deportivas",
        "descripcion" => "Zapatillas ligeras y cómodas para el día a día.",
        "precio" => 49.50,
        "img" => "https://www.caminandodescalzos.com/wp-content/uploads/2023/03/PRW-DEB_Prio_Delphinium-Blue_Pair1_466_WEB.jpg",
        "categoria" => "calzado"
    ],
    [
        "id" => 4,
        "nombre" => "Zapatillas running",
        "descripcion" => "Zapatillas de running ligeras y cómodas para el día a día.",
        "precio" => 25.50,
        "img" => "https://www.caminandodescalzos.com/wp-content/uploads/2023/03/PRW-DEB_Prio_Delphinium-Blue_Pair1_466_WEB.jpg",
        "categoria" => "calzado"
    ],
    [
        "id" => 5,
        "nombre" => "gorro",
        "descripcion" => "gorro muy comodo para el día a día.",
        "precio" => 95.50,
        "img" => "https://i.pinimg.com/236x/e1/06/20/e106206190c67989b174cb6bd6aa5ac3.jpg",
        "categoria" => "Sombreros"
    ],
    [
        "id" => 6,
        "nombre" => "chanclas",
        "descripcion" => "chanclas ligeras y cómodas para el día a día.",
        "precio" => 15.50,
        "img" => "https://img.freepik.com/foto-gratis/chancletas-amarillas-aisladas-sobre-fondo-blanco_1101-1996.jpg?semt=ais_hybrid&w=740&q=80",
        "categoria" => "calzado"
    ],
];


if (isset($_GET['id'])) {
    header('Content-Type: application/json');
    $id = intval($_GET['id']);
    foreach ($productos as $p) {
        if ($p['id'] === $id) {
            echo json_encode($p, JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
    echo json_encode(["error" => "Producto no encontrado"], JSON_UNESCAPED_UNICODE);

}

else if (isset($_GET['modo']) && $_GET['modo'] === 'texto') {
    header('Content-Type: text/html; charset=UTF-8');
    mostrarProductosJSON($productos);
}

else {
    header('Content-Type: application/json');
    echo json_encode($productos, JSON_UNESCAPED_UNICODE);
}

function mostrarProductosJSON($productos) {
    echo "- Lista de productos -<br><br>";

    $json = json_encode($productos, JSON_UNESCAPED_UNICODE);
    $array = json_decode($json, true);

    foreach ($array as $p) {
        echo $p['nombre'] . " - " . number_format($p['precio'], 2) . " €<br>";
    }
}
?>
