<?php
$pageTitle    = 'Calculadora de Propinas';
$pageSubtitle = 'Calcula propina y divide la cuenta entre varios';
?>

<div class="row justify-content-center g-4">

    <!-- Formulario -->
    <div class="col-lg-5 col-md-7">
        <div class="card app-card">
            <div class="card-header">
                <i class="bi bi-pencil-square me-2 text-primary"></i>Datos de la cuenta
            </div>
            <div class="card-body">

                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger d-flex align-items-center gap-2" role="alert">
                        <i class="bi bi-exclamation-triangle-fill"></i>
                        <?= htmlspecialchars($error) ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="index.php">

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary small text-uppercase tracking-wide">
                            Total de la cuenta
                        </label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-text bg-white fw-bold">$</span>
                            <input type="number" name="total" class="form-control form-control-lg"
                                   placeholder="0.00" step="0.01" min="0"
                                   value="<?= htmlspecialchars($_POST['total'] ?? '') ?>" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary small text-uppercase">
                            Porcentaje de propina
                        </label>
                        <div class="d-flex gap-2 flex-wrap mb-3">
                            <?php foreach ([10, 15, 18, 20, 25] as $pct): ?>
                                <button type="button" class="btn btn-outline-primary btn-sm pct-btn"
                                        data-value="<?= $pct ?>"><?= $pct ?>%</button>
                            <?php endforeach; ?>
                        </div>
                        <div class="input-group">
                            <input type="number" name="porcentaje" id="porcentaje"
                                   class="form-control" step="0.5" min="0" max="100"
                                   value="<?= htmlspecialchars($_POST['porcentaje'] ?? '15') ?>" required>
                            <span class="input-group-text">%</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary small text-uppercase">
                            Número de personas
                        </label>
                        <input type="number" name="personas" class="form-control"
                               min="1" max="50"
                               value="<?= htmlspecialchars($_POST['personas'] ?? '1') ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 rounded-pill fs-6">
                        <i class="bi bi-calculator-fill me-2"></i>Calcular propina
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Resultado -->
    <?php if ($resultado): ?>
    <div class="col-lg-5 col-md-7">
        <div class="card app-card result-card">
            <div class="card-header">
                <i class="bi bi-check-circle-fill me-2 text-success"></i>Resultado
            </div>
            <div class="card-body">

                <div class="text-center mb-4 py-3 bg-light rounded-3">
                    <div class="text-muted small text-uppercase fw-semibold mb-1">Total a pagar</div>
                    <div class="total-amount">$<?= number_format($resultado['total'], 2) ?></div>
                    <?php if ($resultado['personas'] > 1): ?>
                        <div class="badge bg-primary mt-2 px-3 py-2 rounded-pill">
                            $<?= number_format($resultado['porPersona'], 2) ?> por persona
                        </div>
                    <?php endif; ?>
                </div>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between px-0">
                        <span class="text-muted">Subtotal</span>
                        <span class="fw-semibold">$<?= number_format($resultado['subtotal'], 2) ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-0">
                        <span class="text-muted">Propina (<?= $resultado['porcentaje'] ?>%)</span>
                        <span class="fw-semibold text-success">
                            + $<?= number_format($resultado['propina'], 2) ?>
                        </span>
                    </li>
                    <?php if ($resultado['personas'] > 1): ?>
                    <li class="list-group-item d-flex justify-content-between px-0">
                        <span class="text-muted">Personas</span>
                        <span class="fw-semibold"><?= $resultado['personas'] ?></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between px-0">
                        <span class="text-muted">Por persona</span>
                        <span class="fw-semibold text-primary">
                            $<?= number_format($resultado['porPersona'], 2) ?>
                        </span>
                    </li>
                    <?php endif; ?>
                </ul>

            </div>
        </div>
    </div>
    <?php endif; ?>

</div>

<script>
document.querySelectorAll('.pct-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('porcentaje').value = btn.dataset.value;
        document.querySelectorAll('.pct-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
    });
});
</script>
