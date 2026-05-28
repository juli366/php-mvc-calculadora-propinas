<?php
require_once __DIR__ . '/../models/PropinasModel.php';

class PropinasController {
    private PropinasModel $model;

    public function __construct() {
        $this->model = new PropinasModel();
    }

    public function index(): void {
        $pageTitle    = 'Calculadora de Propinas';
        $pageSubtitle = 'Calcula la propina y divide la cuenta entre varios';
        $resultado    = null;
        $error        = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $total      = floatval($_POST['total']     ?? 0);
            $porcentaje = floatval($_POST['porcentaje'] ?? 0);
            $personas   = max(1, intval($_POST['personas'] ?? 1));

            if ($total <= 0) {
                $error = 'El total de la cuenta debe ser mayor a 0.';
            } else {
                $resultado = $this->model->calcular($total, $porcentaje, $personas);
            }
        }

        require_once __DIR__ . '/../views/layout/header.php';
        require_once __DIR__ . '/../views/propinas/index.php';
        require_once __DIR__ . '/../views/layout/footer.php';
    }
}
