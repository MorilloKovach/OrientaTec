var map = L.map('map', {minZoom:12,zoom:1});

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

const list = [ 
    {name:"COLEGIO PARROQUIAL SAN JUSTO", lat:-34.6786219168678, log:-58.5617602057687},
    {name:"MUNICIPAL Nº14 PUERTO ARGENTINO", lat:-34.6962728877197, log:-58.5564612975543},
    {name:"MUNICIPAL Nº16 PETETE", lat:-34.7064732561661, log:-58.5963787783293},
    {name:"MUNICIPAL Nº17 DESPERTAR", lat:-34.6878781781802, log:-58.601503720826},
    {name:"MUNICIPAL Nº18 DUMBO", lat:-34.6609083540288, log:-58.5682319429789}
]

async function initMap() {
    try {
        const matanzaData = await fetchMatanza();
        const matanzaLayer = L.geoJSON(matanzaData, {
            style: {
                color: '#910000',
                weight: 2,
                fillColor:'red'
            }
        }).addTo(map);

        map.fitBounds(matanzaLayer.getBounds());
        map.setMaxBounds(matanzaLayer.getBounds());
        map.options.maxBoundsViscosity = 50.0;
        matanzaLayer.bringToFront();

        list.forEach(element =>    {
            L.circle([element.lat, element.log], {radius: 70}).addTo(map).bindPopup(`<h2>${element.name}</h2>`);
        })
        
    } catch (error) {
        console.error('Error fetching Matanza data:', error);

    }
}





initMap();