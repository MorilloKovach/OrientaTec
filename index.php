<?php

include "db/index.php";
$list = [];
//leeme todo lo que llega de $result, teniendo en cuenta que es la consulta a la base de datos
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OrientaTec</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div></div>
        <h1>Syxtem</h1>
    </header>
    <div id="map"></div>
    <script type="module">
        var map = L.map('map', { minZoom: 12, zoom: 1 });
        const list = <?php echo json_encode($list, JSON_UNESCAPED_UNICODE); ?>;
        console.log(list);
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
        //ahora hace que los datos lleguen a js 
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
                    L.circle([element.lat, element.log], { radius: 70 }).addTo(map).bindPopup(`<h2>${element.name}</h2><p>Localidad: ${element.localidad}</p>`);
                })

            } catch (error) {
                console.error('Error fetching Matanza data:', error);

            }
        }

        initMap();

    </script>
</body>

</html>