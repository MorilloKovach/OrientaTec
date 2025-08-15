<?php

include "db/index.php";
$list = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list[] = [
            "name" => $row["nombre"],
            "lat" => $row["latitud"],
            "log" => $row["longitud"],
            "localidad" => $row["localidad"]
        ];
    }
}
$list2 = [];
if (mysqli_num_rows($result2) > 0) {
    while ($row = mysqli_fetch_assoc($result2)) {
        $list2[] = [
            "name" => $row["nombre"]
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrientaTec</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
</head>

<body>
    <header>
        <h1>Syxtem</h1>
        <ul>
            <li><a href="inicio.php">Inicio de Sesion</a></li>
            <li><a href="">Sobre Nosotros</a></li>
        </ul>
    </header>
    <div>
        <label for="localidad">Localidad:</label>
        <select id="localidad">
            <option value="todas">Todas</option>
        </select>
        <button id="filtrar">Filtrar</button>
    </div>
    <div id="map"></div>
    <script type="module">
        let circles = [];
        var map = L.map('map', { minZoom: 12, zoom: 1 });
        const list = <?php echo json_encode($list, JSON_UNESCAPED_UNICODE); ?>;
        const list2 = <?php echo json_encode($list2, JSON_UNESCAPED_UNICODE); ?>;
        const localidades = document.getElementById('localidad');
        list2.forEach(element => {
            const option = document.createElement('option');
            option.value = element.name;
            option.textContent = element.name;
            localidades.appendChild(option);
        });
        console.log("hola putos");
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        async function fetchMatanza() {
            const response = await fetch('./matanza.json');
            if (!response.ok) {
                throw new Error('Network response was not ok: ' + response.statusText);
            }
            return await response.json();
        }
        async function initMap() {
            try {
                const matanzaData = await fetchMatanza();
                const matanzaLayer = L.geoJSON(matanzaData, {
                    style: {
                        color: '#910000',
                        weight: 2,
                        fillColor: 'red'
                    }
                }).addTo(map);

                map.fitBounds(matanzaLayer.getBounds());
                map.setMaxBounds(matanzaLayer.getBounds());
                map.options.maxBoundsViscosity = 50.0;
                matanzaLayer.bringToFront();
                list.forEach(element => {
                    const tooltipHtml = `
        <div class="fade-tooltip" style="z-index: 1000; opacity:1;">
            <h2>${element.name}</h2>
            <p>Localidad: ${element.localidad}</p>
        </div>
    `;
                    const circle = L.circle([element.lat, element.log], { radius: 70 })
                        .addTo(map)
                        .bindTooltip(tooltipHtml, { permanent: true, direction: "top", opacity: 0, className: "" });

                    const tooltipEl = circle.getTooltip().getElement();
                    tooltipEl.style.opacity = "0";
                    tooltipEl.style.transition = "opacity 0.4s ease-in-out";
                    circle.on("mouseover", () => {
                        tooltipEl.style.opacity = "1";
                    });

                    circle.on("mouseout", () => {
                        tooltipEl.style.opacity = "0";
                    });

                    circle.on('click', () => {
                        map.setView([element.lat, element.log], 15);
                    });

                    circles.push(circle);
                });


            } catch (error) {
                console.error('Error fetching Matanza data:', error);

            }
        }
        document.getElementById('filtrar').addEventListener('click', () => {
            const localidadSeleccionada = document.getElementById('localidad').value;
            circles.forEach(c => map.removeLayer(c)); // quitamos todos los círculos
            list.forEach(element => {
                if (localidadSeleccionada === "todas" || element.localidad === localidadSeleccionada) {
                    const circle = L.circle([element.lat, element.log], { radius: 70 })
                        .addTo(map)
                        .bindPopup(`<h2>${element.name}</h2><p>Localidad: ${element.localidad}</p>`);
                    circle.on('click', () => {
                        map.setView([element.lat, element.log], 15);
                    });
                    circles.push(circle);
                }
            });
        });
        initMap();
    </script>
</body>

</html>