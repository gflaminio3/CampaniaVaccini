<?php

function getLatestPlatea() {
    $data = json_decode(file_get_contents('https://raw.githubusercontent.com/italia/covid19-opendata-vaccini/master/dati/platea.json'), TRUE)['data'];

    foreach ($data as $platea) {
        if($platea['reg'] == 'Campania') {
            $notVaccinated[] = [
                'fascia' => $platea['eta'],
                'platea' => $platea['totale_popolazione']
            ];
        }
    }
    file_put_contents("data/notVaccinated.json", json_encode($notVaccinated));
}

function getDailyDeliveredVaccines() {
    $data = json_decode(file_get_contents('https://raw.githubusercontent.com/italia/covid19-opendata-vaccini/master/dati/consegne-vaccini-latest.json'), TRUE)["data"];
    
    foreach ($data as $platea) {
        if($platea['reg'] == 'Campania') {
            $vaccines[] = [
                'data_consegna' => date("d-m-Y H:i", strtotime($platea["data_consegna"])),
                'fornitore' => $platea["forn"],
                'dosi' => $platea["numero_dosi"]
            ];
        }
    }
    file_put_contents("data/dailyDelivered.json", json_encode($vaccines));
}

function getAvailableHospitals() {
    $data = json_decode(file_get_contents('https://raw.githubusercontent.com/italia/covid19-opendata-vaccini/master/dati/punti-somministrazione-latest.json'), TRUE)["data"];

    foreach ($data as $hospital) {
        if($hospital['area'] == 'CAM') {        
            $hospitals[] = [
                'comune' => $hospital["comune"],
                'luogo' => $hospital["presidio_ospedaliero"],
                'link' => '<a href="https://www.google.com/search?q=' . $hospital["presidio_ospedaliero"] . '" class="btn btn-primary">Informazioni</a>'
            ];
        }
    }
    
    file_put_contents("data/availableHospitals.json", json_encode($hospitals));

}

function getTotalStats() {
    $data = json_decode(file_get_contents('https://raw.githubusercontent.com/italia/covid19-opendata-vaccini/master/dati/anagrafica-vaccini-summary-latest.json'), TRUE)["data"];

    foreach ($data as $stats) {
        $today[] = [
            'fascia' => $stats["eta"],
            'maschi' => $stats["m"],
            'femmine' => $stats["f"],
            'prime_dosi' => $stats["d1"],
            'seconda_dose' => $stats["d2"],
            'terza_dose' => $stats["dpi"]
        ];
    }
    
    file_put_contents("data/todayStats.json", json_encode($today));
}


//Get today vaccinations
getLatestPlatea();
getDailyDeliveredVaccines();
getAvailableHospitals();
getTotalStats();