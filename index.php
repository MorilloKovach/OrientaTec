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
                            "name" => $esp_data['nombre'],
                            "nombreCorto" => $esp_data['NombreCorto']
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
        <a href="./index.php"><img src="./assets/logo.png" class="logo" alt="OrientaTec"></a>
        <ul>
            <li><a href="inicio.php">Inicio de Sesion</a></li>
            <li><a href="sobren.php">Sobre Nosotros</a></li>
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

        <section class="relative mt-6 mx-2 inline">
        <input type="text" id="search" placeholder="Buscar escuela..." class="border p-1 rounded text-xl">
        <div id="search-results" class="absolute bg-white border rounded shadow max-h-60 overflow-y-auto hidden w-full z-1010 text-xl"></div>
       </section>

        
    </section>

    <div id="map"></div>

    <footer>
        <h2>hola</h2>
    </footer>

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

                    let especialidadesHtml = "<div class='flex flex-col justify-center'>";
                    element.especialidades.forEach(esp => {
                        especialidadesHtml += `<a class="py-2 px-2" href="./estudio.php?especialidad=${esp.nombreCorto}">${esp.name}</a>`;
                    });
                    especialidadesHtml += "</div>";
                    console.log(element.name);
                    const tooltipHtml = `
                        <div class="fade-tooltip" style="z-index: 1000; opacity:1; position:relative;">
                            <p>${element.namec}</p>
                            ${especialidadesHtml}
                        </div>
                    `;
                    let tamanio = window.innerWidth < 600 ? "300px" : "448px";
                    let tamanio2Tail = window.innerWidth < 600 ? "w-72" : "w-96";
                    const circle = L.circle([element.lat, element.log], { radius: 70 })
                        .addTo(map)
                        .bindTooltip(tooltipHtml, { permanent: true, direction: "bottom", opacity: 0, className: "" })
                        .bindPopup(`
<div class=" rounded overflow-hidden shadow-lg max-w-2xl ${tamanio2Tail} background-white">
  <img class="w-full h-50 object-cover object-center" src="${element.img}" alt="Escuela" style="object-position:center 30%;">
  <div class="px-1 py-4 w-full">
    <div class="font-bold text-xl mb-2 text-center">${element.name}</div>
    <p class="px-2">Localidad: ${element.localidad}</p>
    ${especialidadesHtml}
  </div>
</div>
                        `, { maxWidth: tamanio, width: "100%" });

                    circle.escuelaId = element.id;
                    circles.push(circle);

                    const tooltipEl = circle.getTooltip().getElement();
                    tooltipEl.style.opacity = "0";
                    tooltipEl.style.transition = "opacity 0.4s ease-in-out";
                    circle.on("mouseover", () => tooltipEl.style.opacity = "1");
                    circle.on("mouseout", () => tooltipEl.style.opacity = "0");
                    circle.on('click', () => map.setView([element.lat, element.log], 15));
                }
            });
        }

        document.getElementById('filtrar').addEventListener('click', () => {
            const localidadSeleccionada = document.getElementById('localidad').value;
            const especialidadSeleccionada = document.getElementById('especialidad').value;
            renderCircles(localidadSeleccionada, especialidadSeleccionada);
        });

        initMap();
        const searchInput = document.getElementById("search");
        const searchResults = document.getElementById("search-results");
        function createResultItem(escuela, circle) {
            const div = document.createElement("div");
            div.className = "p-2 hover:bg-gray-200 cursor-pointer";
            div.textContent = escuela.name;
            div.addEventListener("click", () => {
                map.setView([escuela.lat, escuela.log], 16);
                circle.openPopup();
                searchResults.classList.add("hidden");
                searchInput.value = escuela.name;
            });
            return div;
        }
        searchInput.addEventListener("input", () => {
            const query = searchInput.value.toLowerCase();
            searchResults.innerHTML = "";
            if (!query) {
                searchResults.classList.add("hidden");
                return;
            }
            const coincidencias = list.filter(e =>
                e.name.toLowerCase().includes(query) || e.namec.toLowerCase().includes(query)
            );
            coincidencias.forEach(escuela => {
                const circle = circles.find(c => c.escuelaId === escuela.id);
                if (circle) {
                    searchResults.appendChild(createResultItem(escuela, circle));
                }
            });
            if (coincidencias.length > 0) {
                searchResults.classList.remove("hidden");
            } else {
                searchResults.classList.add("hidden");
            }
        });
    </script>
</body>

</html>
