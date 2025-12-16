<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Elemento</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .card-elemento {
            background: white;
            width: 100%;
            max-width: 700px;
            border-radius: 20px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease;
        }

        .card-elemento:hover {
            transform: translateY(-5px);
        }

        .card-header {
            background: linear-gradient(135deg, #ab91ff 0%, #764ba2 100%);
            color: white;
            padding: 30px;
            text-align: center;
            position: relative;
        }

        .simbolo-grande {
            font-family: 'Montserrat', sans-serif;
            font-size: 80px;
            font-weight: 700;
            margin: 0;
            line-height: 1;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .nombre-elemento {
            font-family: 'Montserrat', sans-serif;
            font-size: 24px;
            margin-top: 5px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .card-body {
            padding: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr; 
            gap: 20px;
            align-items: center;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .info-item {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 10px;
            border-left: 5px solid #ab91ff;
        }

        .info-label {
            display: block;
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            font-weight: bold;
        }

        .info-value {
            font-size: 18px;
            color: #333;
            font-weight: 600;
        }

        .descripcion-container {
            grid-column: 1 / -1; 
            margin-top: 10px;
        }

        .desc-text {
            line-height: 1.6;
            color: #555;
            text-align: justify;
        }

        .img-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .img-elemento {
            max-width: 100%;
            max-height: 200px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
        }

        .btn-volver {
            display: block;
            text-align: center;
            margin: 20px auto;
            padding: 10px 20px;
            background: #333;
            color: white;
            text-decoration: none;
            border-radius: 25px;
            width: fit-content;
            font-size: 14px;
        }

        .btn-volver:hover {
            background: #555;
        }

        .error-msg {
            background: #ffc5c5;
            color: #a80000;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            .card-body {
                grid-template-columns: 1fr;
            }
            .img-container {
                order: -1; 
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

<?php
$opcion = isset($_GET['Letra']) ? $_GET['Letra'] : '';

$tabla_periodica = [
    "H" => [
        "nombre" => "Hidrógeno",
        "numero" => 1,
        "masa" => "1.008",
        "estado" => "Gas",
        "desc" => "El hidrógeno es el elemento más ligero y abundante del universo. Se usa en combustibles y en la producción de amoníaco.",
        "img" => "Hidrogeno.webp"
    ],
    "He" => [
        "nombre" => "Helio",
        "numero" => 2,
        "masa" => "4.0026",
        "estado" => "Gas noble",
        "desc" => "El helio es un gas incoloro, inodoro y no inflamable. Se usa en globos, criogenia y como gas protector en soldaduras.",
        "img" => "Helio.webp" 
    ],
    "Li" => [
        "nombre" => "Litio",
        "numero" => 3,
        "masa" => "6.94",
        "estado" => "Sólido",
        "desc" => "El litio es un metal blando, de color blanco plata, que se oxida rápidamente en aire o agua. Se usa en baterías recargables.",
        "img" => "Litio.webp" 
    ]
];

if (array_key_exists($opcion, $tabla_periodica)) {
    $dato = $tabla_periodica[$opcion];
?>

    <div class="card-elemento">
        <div class="card-header">
            <h1 class="simbolo-grande"><?php echo $opcion; ?></h1>
            <div class="nombre-elemento"><?php echo $dato['nombre']; ?></div>
        </div>

        <div class="card-body">
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Número Atómico</span>
                    <span class="info-value"><?php echo $dato['numero']; ?></span>
                </div>
                <div class="info-item">
                    <span class="info-label">Masa Atómica</span>
                    <span class="info-value"><?php echo $dato['masa']; ?> u</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Estado</span>
                    <span class="info-value"><?php echo $dato['estado']; ?></span>
                </div>
            </div>

            <?php if (!empty($dato['img'])): ?>
            <div class="img-container">
                <img src="<?php echo $dato['img']; ?>" alt="<?php echo $dato['nombre']; ?>" class="img-elemento" onerror="this.style.display='none'">
            </div>
            <?php endif; ?>

            <div class="descripcion-container">
                <h3>Descripción</h3>
                <p class="desc-text"><?php echo $dato['desc']; ?></p>
            </div>
        </div>
        
        <a href="index.html" class="btn-volver">← Volver a la Tabla</a>
    </div>

<?php
} elseif ($opcion != "") {
    echo "<div class='error-msg'>⚠️ El elemento '$opcion' aún no está registrado en el sistema.</div>";
} else {
    echo "<div class='card-elemento' style='padding:40px; text-align:center;'><h3>Selecciona un elemento de la tabla para ver su información.</h3></div>";
}
?>

</body>
</html>