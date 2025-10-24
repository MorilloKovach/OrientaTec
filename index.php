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
            "sitio_web" => $row["sitio_web"],
            "google_map" => $row["google_map"],
            "municipio" => $row["municipio"],
            "especialidades" => $especialidades
        ];
    }

    $list_municipios = [];
    if (mysqli_num_rows($result4) > 0) {
        while ($row = mysqli_fetch_assoc($result4)) {
            $list_municipios[] = [
                "id" => $row["municipio_id"],
                "nombre" => $row["nombre"]
            ];
        }
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
    <link rel="icon" href="./assets/logo.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3634009231241518"
        crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <a href="./index.php"><img src="./assets/logo.png" class="logo" alt="OrientaTec"></a>
        <h2 class="h2-header text-xs z-[1020] text-white"><i>Tu mapa para encontrar tu escuela técnica ideal</i></h2>

        <ul id="menu-navegacion">
            <li><a href="inicio.php">Inicio de Sesion</a></li>
            <li><a href="sobren.php">Sobre Nosotros</a></li>
        </ul>
        <div class="hamburguesa-grande" id="menu-hamburguesa">
            <div class="linea"></div>
            <div class="linea"></div>
            <div class="linea"></div>
        </div>
    </header>
    <ul id="menu-navegacion-celu">
        <li><a href="inicio.php">Inicio de Sesion</a></li>
        <li><a href="sobren.php">Sobre Nosotros</a></li>
    </ul>
    <div class="contenedor">
        <div id="map"></div>

        <div class="barra">
            <section class="filtros">
                <section class="relative mt-6 mx-2 inline">
                    <input type="text" id="search" placeholder="Buscar escuela..." class="border p-1 rounded text-xl">
                    <div id="search-results"
                        class="absolute bg-white border rounded shadow max-h-60 overflow-y-auto hidden w-full z-1010 text-xl">
                    </div>
                </section>
                <div>
                    <label for="municipio">Municipio: </label>
                    <select id="municipio">
                        <option value="todos">Todos</option>
                    </select>
                </div>
                <div>
                    <label for="localidad">Localidad:</label>
                    <select id="localidad">
                        <option value="todas">Todas</option>
                    </select>
                </div>
                <div>
                    <label for="especialidad">Especialidad:</label>
                    <select id="especialidad">
                        <option value="todas">Todas</option>
                    </select>
                </div>
                <button id="filtrar">Filtrar</button>
            </section>
        </div>
    </div>
    <footer class="footer">
        <h2>OrientaTec © - Todos los derechos reservados</h2>
        <div class="div-footer">
            <a href="https://x.com/orientatec2025?s=11" target="_blank"><i class="fa-brands fa-x-twitter"></i></a>
            <a href="https://www.instagram.com/orientatec2025?igsh=YmR2M2IwcjF6Z3Fm&utm_source=qr" target="_blank"><i
                    class="fa-brands fa-instagram"></i></a>
            <a href="https://www.facebook.com/share/1B2zvvDgUD/?mibextid=wwXIfr" target="_blank"><i
                    class="fa-brands fa-facebook"></i></a>
        </div>
    </footer>
    <button id="btnTop">↑</button>
    <script type="module">
        let circles = [];
        var map = L.map('map', { minZoom: 9});
        const list = <?php echo json_encode($list, JSON_UNESCAPED_UNICODE); ?>;

        const municipiosSelect = document.getElementById('municipio');
        const localidadesSelect = document.getElementById('localidad');
        const especialidadesSelect = document.getElementById('especialidad');

        // Cargar municipios
        list.forEach(element => {
            if (![...municipiosSelect.options].some(opt => opt.value === element.municipio)) {
                const option = document.createElement('option');
                option.value = element.municipio;
                option.textContent = element.municipio;
                municipiosSelect.appendChild(option);
            }
        });

        // Cargar especialidades
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

        // Función para actualizar localidades según municipio
        function actualizarLocalidades(municipioSeleccionado) {
            localidadesSelect.innerHTML = "";
            const optionTodas = document.createElement("option");
            optionTodas.value = "todas";
            optionTodas.textContent = "Todas";
            localidadesSelect.appendChild(optionTodas);

            let localidadesUnicas = new Set();
            list.forEach(element => {
                if (municipioSeleccionado === "todos" || element.municipio === municipioSeleccionado) {
                    localidadesUnicas.add(element.localidad);
                }
            });

            localidadesUnicas.forEach(loc => {
                const option = document.createElement("option");
                option.value = loc;
                option.textContent = loc;
                localidadesSelect.appendChild(option);
            });
        }

        municipiosSelect.addEventListener("change", () => {
            actualizarLocalidades(municipiosSelect.value);
        });

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        async function fetchMatanza() {
            const response = await fetch('./matanza.json');
            if (!response.ok) throw new Error('Network response was not ok: ' + response.statusText);
            return await response.json();
        }
        async function initMap() {
            try {
                const matanzaData = await fetchMatanza();
        let allBounds = L.latLngBounds();
                matanzaData.forEach((data) => {
                    const matanzaLayer = L.geoJSON(data, {
                        style: {
                            color: '#910000',
                            weight: 2,
                            fillColor: `${data.color}`
                        }
                    }).addTo(map);
            allBounds.extend(matanzaLayer.getBounds());

                })
                    map.fitBounds(allBounds);
                actualizarLocalidades("todos");
                renderCircles("todos", "todas", "todas"); // inicio
            } catch (error) {
                console.error('Error fetching Matanza data:', error);
            }
        }

        let markerIcon = L.icon({
            iconUrl: './assets/icon1.png',
            iconSize: [40, 40],
            iconAnchor: [17, 34],
            popupAnchor: [0, -30],
            shadowUrl: 'https://unpkg.com/leaflet@1.9.4/dist/images/marker-shadow.png',
            shadowSize: [41, 41],
            shadowAnchor: [13, 41]
        });

        function renderCircles(municipioSeleccionado, localidadSeleccionada, especialidadSeleccionada) {
            circles.forEach(c => map.removeLayer(c));
            circles = [];

            list.forEach(element => {
                const coincideMunicipio = (municipioSeleccionado === "todos" || element.municipio === municipioSeleccionado);
                const coincideLocalidad = (localidadSeleccionada === "todas" || element.localidad === localidadSeleccionada);
                const coincideEspecialidad = (especialidadSeleccionada === "todas" ||
                    element.especialidades.some(esp => esp.name === especialidadSeleccionada));

                if (coincideMunicipio && coincideLocalidad && coincideEspecialidad) {
                    let especialidadesHtml = "<div class='flex flex-col justify-center'>";
                    element.especialidades.forEach(esp => {
                        especialidadesHtml += `<a class="py-2 px-2" href="./estudio.php?especialidad=${esp.nombreCorto}">${esp.name}</a>`;
                    });
                    especialidadesHtml += "</div>";
                    let tooltipHtml = `
                        <div class="fade-tooltip" style="z-index: 1000; opacity:1; position:relative;">
                            <p>${element.namec}</p>
                            ${especialidadesHtml}
                        </div>
                    `;
                    let tamanio = window.innerWidth < 600 ? "300px" : "448px";
                    let tamanio2Tail = window.innerWidth < 600 ? "w-72" : "w-96";
                   if(window.innerWidth < 768){
                    const circle = L.marker([element.lat, element.log], { radius: 70, icon: markerIcon })
                        .addTo(map)
                        .bindPopup(`
<div class=" rounded overflow-hidden shadow-lg max-w-2xl ${tamanio2Tail} background-white">
  <img class="w-full h-50 object-cover object-center" src="${element.img}" alt="Escuela">
  <div class="px-1 py-4 w-full">
    <div class="font-bold text-xl mb-2 text-center">${element.name}</div>
    <p class="px-2">Municipio: ${element.municipio}</p>
    <p class="px-2">Localidad: ${element.localidad}</p>
    ${especialidadesHtml}
    <a href="${element.sitio_web}" target="_blank" class="px-2 text-blue-500">Sitio Web</a>
    <a href="${element.google_map}" target="_blank" class="px-2 text-blue-500">¿Cómo llego?</a>
  </div>
</div>
                        `, { maxWidth: tamanio, width: "100%", offset: L.point(0, 40) });

                    circle.escuelaId = element.id;
                    circles.push(circle);
                    circle.on("mouseover", () => tooltipEl.style.opacity = "1");
                    circle.on("mouseout", () => tooltipEl.style.opacity = "0");
                    circle.on('click', () => map.setView([element.lat, element.log]));
}
                   else{
                    const circle = L.marker([element.lat, element.log], { radius: 70, icon: markerIcon })
                        .addTo(map)
                        .bindTooltip(tooltipHtml, { permanent: true, direction: "bottom", opacity: 0, className: "" })
                        .bindPopup(`
<div class=" rounded overflow-hidden shadow-lg max-w-2xl ${tamanio2Tail} background-white">
  <img class="w-full h-50 object-cover object-center" src="${element.img}" alt="Escuela">
  <div class="px-1 py-4 w-full">
    <div class="font-bold text-xl mb-2 text-center">${element.name}</div>
    <p class="px-2">Municipio: ${element.municipio}</p>
    <p class="px-2">Localidad: ${element.localidad}</p>
    ${especialidadesHtml}
    <a href="${element.sitio_web}" target="_blank" class="px-2 text-blue-500">Sitio Web</a>
    <a href="${element.google_map}" target="_blank" class="px-2 text-blue-500">¿Cómo llego?</a>
  </div>
</div>
                        `, { maxWidth: tamanio, width: "100%", offset: L.point(0, 40) });

                    circle.escuelaId = element.id;
                    circles.push(circle);
                    const tooltipEl = circle.getTooltip().getElement();
                    tooltipEl.style.opacity = "0";
                    tooltipEl.style.transition = "opacity 0.4s ease-in-out";
                    circle.on("mouseover", () => tooltipEl.style.opacity = "1");
                    circle.on("mouseout", () => tooltipEl.style.opacity = "0");
                    circle.on('click', () => map.setView([element.lat, element.log]));
                }
              }
            });
        }


        document.getElementById('filtrar').addEventListener('click', () => {
            const municipioSeleccionado = document.getElementById('municipio').value;
            const localidadSeleccionada = document.getElementById('localidad').value;
            const especialidadSeleccionada = document.getElementById('especialidad').value;
            renderCircles(municipioSeleccionado, localidadSeleccionada, especialidadSeleccionada);
        });

        initMap();
        const searchInput = document.getElementById("search");
        const searchResults = document.getElementById("search-results");
        function createResultItem(escuela, circle) {
            const div = document.createElement("div");
            div.className = "p-2 hover:bg-gray-200 cursor-pointer";
            div.textContent = escuela.name;
            div.addEventListener("click", () => {
                map.setView([escuela.lat, escuela.log], 15);
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

        const btnTop = document.getElementById("btnTop");
        function normalize(str) {
            return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
        }
        function matchesSubsequence(name, query) {
            const regex = new RegExp(query.split("").map(c => c.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')).join(".*"), "i");
            return regex.test(name);
        }

        searchInput.addEventListener("input", () => {
            const query = normalize(searchInput.value.trim());
            searchResults.innerHTML = "";

            if (!query) {
                searchResults.classList.add("hidden");
                return;
            }

            const coincidencias = list.filter(e => {
                const name = normalize(e.name);
                const namec = normalize(e.namec);
                return matchesSubsequence(name, query) || matchesSubsequence(namec, query);
            });

            coincidencias.forEach(escuela => {
                const circle = circles.find(c => c.escuelaId === escuela.id);
                if (circle) {
                    searchResults.appendChild(createResultItem(escuela, circle));
                }
            });

            searchResults.classList.toggle("hidden", coincidencias.length === 0);
        });
        window.addEventListener("scroll", () => {
            if (window.scrollY > 100 && window.innerWidth < 768) { // aparece después de bajar 400px
                btnTop.classList.add("show");
            } else {
                btnTop.classList.remove("show");
            }
        });

        btnTop.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });
    </script>
    <script src="./header.js"></script>

</body>

</html>