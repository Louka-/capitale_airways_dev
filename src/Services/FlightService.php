<?php

namespace App\Services;

class FlightService {

    /**
     * Undocumented function
     *
     * @return string
     */
    public function getFlightNumber(): string
    {
        $deuxlettres = "";
        $lettres = range('A', 'Z');
        shuffle($lettres);
        $deuxlettres = array_shift($lettres);
        $deuxlettres .= array_shift($lettres);

        $nombre = mt_rand(1000,9999);

        return $deuxlettres.$nombre;
    }

}