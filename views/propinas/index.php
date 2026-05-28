<div class="row justify-content-center">
    <div class="col-lg-6 col-md-8">

        <div class="card card-primary card-outline mb-4">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="bi bi-calculator me-2"></i>Ingresa los datos</h5>
            </div>
            <div class="card-body">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i><?= htmlspecialchars($error) ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                <?php endif; ?>

                <form method="POST" action="index.php">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Total de la cuenta</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                            <input type="number" name="total" class="form-control form-control-lg"
                                   placeholder="0.00" step="0.01" min="0"
                                   value="<?= htmlspecialchars($_POST['total'] ?? '') ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Porcentaje de propina</label>
                        <div class="d-flex gap-2 flex-wrap mb-2">
                            <?php foreach ([10, 15, 18, 20, 25] as $pct): ?>
                                <button type="button"
                                        class="btn btn-outline-primary btn-sm pct-btn"
                                        data-value="<?= $pct ?>"><?= $pct ?>%</button>
                            <?php endforeach; ?>
                        </div>
                        <div class="input-group">
                            <input type="number" name="porcentaje" id="porcentaje"
                                   class="form-control" placeholder="%" step="0.5" min="0" max="100"
                                   value="<?= htmlspecialchars($_POST['porcentaje'] ?? '15') ?>" required>
                            <span class="input-group-text">%</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Número de personas</label>
                        <input type="number" name="personas" class="form-control"
                               min="1" max="50"
                               value="<?= htmlspecialchars($_POST['personas'] ?? '1') ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-lg">
                        <i class="bi bi-calculator-fill me-2"></i>Calcular propina
                    </button>
                </form>
            </div>
        </div>

        <?php if ($resultado): ?>
        <div class="card card-success card-outline">
            <div class="card-header">
                <h5 class="card-title mb-0"><i class="bi bi-check-circle me-2 text-success"></i>Resultado</h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <tbody>
                        <tr>
                            <td class="ps-3 text-muted">Subtotal</td>
                            <td class="text-end pe-3 fw-semibold">
                                $<?= number_format($resultado['subtotal'], 2) ?>
                            </td>
                        </tr>
                        <tr>
                            <td class="ps-3 text-muted">
                                Propina (<?= $resultado['porcentaje'] ?>%)
                            </td>
                            <td class="text-end pe-3 fw-semibold text-success">
                                $<?= number_format($resultado['propina'], 2) ?>
                            </td>
                        </tr>
                        <tr class="table-primary">
                            <td class="ps-3 fw-bold fs-5">Total</td>
                            <td class="text-end pe-3 fw-bold fs-5">
                                $<?= number_format($resultado['total'], 2) ?>
                            </td>
                        </tr>
                        <?php if ($resultado['personas'] > 1): ?>
                        <tr class="table-light">
                            <td class="ps-3 text-muted">
                                Por persona (<?= $resultado['personas'] ?>)
                            </td>
                            <td class="text-end pe-3 fw-semibold text-info">
                                $<?= number_format($resultado['porPersona'], 2) ?>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php endif; ?>

    </div>
</div>

<script>
document.querySelectorAll('.pct-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.getElementById('porcentaje').value = btn.dataset.value;
        document.querySelectorAll('.pct-btn').forEach(b => {
            b.classList.remove('btn-primary');
            b.classList.add('btn-outline-primary');
        });
        btn.classList.add('btn-primary');
        btn.classList.remove('btn-outline-primary');
    });
});
</script>
