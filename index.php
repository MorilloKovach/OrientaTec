<?php
include "db/index.php";
$list = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row["establecimiento_id"];
        $sql = "SELECT * FROM `establecimientos_especialidades` WHERE establecimiento_id = $id";
        $result_especialidades = mysqli_query($conexion, $sql);
        $especialidades = [];
        if (mysqli_num_rows($result_especialidades) > 0) {
            while ($esp = mysqli_fetch_assoc($result_especialidades)) {
                $sql2 = "SELECT * FROM especialidades WHERE especialidad_id = " . $esp['especialidades_id'];
                $result2 = mysqli_query($conexion, $sql2);
                if (mysqli_num_rows($result2) > 0) {
                    while ($esp_data = mysqli_fetch_assoc($result2)) {
                        $especialidades[] = [
                            "name" => $esp_data['nombre']
                        ];
                    }
                }
            }
        }
        $list[] = [
            "id" => $row["establecimiento_id"],
            "name" => $row["nombre"],
            "namec" => $row["nombrec"],
            "lat" => $row["latitud"],
            "log" => $row["longitud"],
            "img" => $row["ImagenEscuela"],
            "localidad" => $row["localidad"],
            "especialidades" => $especialidades
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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <header>
        <a href="./index.php"><img src="./assets/logo.jpg" class="logo" alt="OrientaTec"></a>
        <ul>
            <li><a href="inicio.php">Inicio de Sesion</a></li>
            <li><a href="">Sobre Nosotros</a></li>
        </ul>
    </header>

    <section class="filtros">
        <label for="localidad">Localidad:</label>
        <select id="localidad">
            <option value="todas">Todas</option>
        </select>

        <label for="especialidad">Especialidad:</label>
        <select id="especialidad">
            <option value="todas">Todas</option>
        </select>

        <button id="filtrar">Filtrar</button>
    </section>


    <div id="map"></div>

    <script type="module">
        let circles = [];
        var map = L.map('map', { minZoom: 12, zoom: 1 });
        const list = <?php echo json_encode($list, JSON_UNESCAPED_UNICODE); ?>;
        console.log(list);

        // llenar localidades
        const localidades = document.getElementById('localidad');
        list.forEach(element => {
            if (![...localidades.options].some(opt => opt.value === element.localidad)) {
                const option = document.createElement('option');
                option.value = element.localidad;
                option.textContent = element.localidad;
                localidades.appendChild(option);
            }
        });

        // llenar especialidades
        const especialidadesSelect = document.getElementById('especialidad');
        let allEspecialidades = new Set();
        list.forEach(element => {
            element.especialidades.forEach(esp => allEspecialidades.add(esp.name));
        });
        allEspecialidades.forEach(esp => {
            const option = document.createElement('option');
            option.value = esp;
            option.textContent = esp;
            especialidadesSelect.appendChild(option);
        });

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
                map.options.maxBoundsViscosity = 50.0;
                matanzaLayer.bringToFront();

                renderCircles("todas", "todas"); // inicio
            } catch (error) {
                console.error('Error fetching Matanza data:', error);
            }
        }

        function renderCircles(localidadSeleccionada, especialidadSeleccionada) {
            circles.forEach(c => map.removeLayer(c));
            circles = [];

            list.forEach(element => {
                const coincideLocalidad = (localidadSeleccionada === "todas" || element.localidad === localidadSeleccionada);
                const coincideEspecialidad = (especialidadSeleccionada === "todas" ||
                    element.especialidades.some(esp => esp.name === especialidadSeleccionada));

                if (coincideLocalidad && coincideEspecialidad) {

                    let especialidadesHtml = "<ul>";
                    element.especialidades.forEach(esp => {
                        especialidadesHtml += `<li>${esp.name}</li>`;
                    });
                    especialidadesHtml += "</ul>";
                    console.log(element.name);
                    const tooltipHtml = `
                        <div class="fade-tooltip" style="z-index: 1000; opacity:1; position:relative;">
                            <p>${element.namec}</p>
                            ${especialidadesHtml}
                        </div>
                    `;

                    const circle = L.circle([element.lat, element.log], { radius: 70 })
                        .addTo(map)
                        .bindTooltip(tooltipHtml, { permanent: true, direction: "bottom", opacity: 0, className: "" })
                        .bindPopup(`
<div class="max-w-md rounded overflow-hidden shadow-lg w-2xl background-white">
  <img class="w-full h-50 object-cover object-center" src="${element.img}" alt="Sunset in the mountains" style="object-position:center 30%;;>
  <div class="px-6 py-4 w-full">
    <div class="font-bold text-xl mb-2">${element.name}</div>
    <p class="text-gray-700 text-base">
    ${especialidadesHtml}
    </p>
  </div>
</div>
                        `);

                    const tooltipEl = circle.getTooltip().getElement();
                    tooltipEl.style.opacity = "0";
                    tooltipEl.style.transition = "opacity 0.4s ease-in-out";
                    circle.on("mouseover", () => tooltipEl.style.opacity = "1");
                    circle.on("mouseout", () => tooltipEl.style.opacity = "0");
                    circle.on('click', () => map.setView([element.lat, element.log], 15));

                    circles.push(circle);
                }
            });
        }

        document.getElementById('filtrar').addEventListener('click', () => {
            const localidadSeleccionada = document.getElementById('localidad').value;
            const especialidadSeleccionada = document.getElementById('especialidad').value;
            renderCircles(localidadSeleccionada, especialidadSeleccionada);
        });

        initMap();
    </script>
</body>

</html>