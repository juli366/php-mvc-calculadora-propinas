<?php
class PropinasModel {
    public function calcular(float $total, float $porcentaje, int $personas): array {
        $propina  = $total * ($porcentaje / 100);
        $totalFin = $total + $propina;

        return [
            'subtotal'   => $total,
            'porcentaje' => $porcentaje,
            'propina'    => $propina,
            'total'      => $totalFin,
            'personas'   => $personas,
            'porPersona' => $personas > 0 ? $totalFin / $personas : $totalFin,
        ];
    }
}
