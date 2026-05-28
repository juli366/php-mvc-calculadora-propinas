<div class="row justify-content-center">
    <div class="col-md-6">

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <i class="bi bi-calculator"></i> Ingresa los datos
            </div>
            <div class="card-body">
                <?php if (!empty($error)): ?>
                    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>

                <form method="POST" action="index.php">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Total de la cuenta ($)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-currency-dollar"></i></span>
                            <input type="number" name="total" class="form-control" placeholder="0.00"
                                   step="0.01" min="0"
                                   value="<?= htmlspecialchars($_POST['total'] ?? '') ?>" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Porcentaje de propina</label>
                        <div class="d-flex gap-2 flex-wrap mb-2">
                            <?php foreach ([10, 15, 18, 20, 25] as $pct): ?>
                                <button type="button" class="btn btn-outline-primary btn-sm pct-btn"
                                        data-value="<?= $pct ?>"><?= $pct ?>%</button>
                            <?php endforeach; ?>
                        </div>
                        <div class="input-group">
                            <input type="number" name="porcentaje" id="porcentaje" class="form-control"
                                   placeholder="%" step="0.5" min="0" max="100"
                                   value="<?= htmlspecialchars($_POST['porcentaje'] ?? '15') ?>" required>
                            <span class="input-group-text">%</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Número de personas</label>
                        <input type="number" name="personas" class="form-control"
                               min="1" max="50"
                               value="<?= htmlspecialchars($_POST['personas'] ?? '1') ?>" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-calculator-fill"></i> Calcular
                    </button>
                </form>
            </div>
        </div>

        <?php if ($resultado): ?>
        <div class="card shadow-sm result-card">
            <div class="card-header bg-success text-white">
                <i class="bi bi-check-circle"></i> Resultado
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <td class="text-muted">Subtotal</td>
                        <td class="text-end fw-semibold">$<?= number_format($resultado['subtotal'], 2) ?></td>
                    </tr>
                    <tr>
                        <td class="text-muted">Propina (<?= $resultado['porcentaje'] ?>%)</td>
                        <td class="text-end fw-semibold text-success">$<?= number_format($resultado['propina'], 2) ?></td>
                    </tr>
                    <tr class="border-top">
                        <td class="fw-bold fs-5">Total</td>
                        <td class="text-end fw-bold fs-5 text-primary">$<?= number_format($resultado['total'], 2) ?></td>
                    </tr>
                    <?php if ($resultado['personas'] > 1): ?>
                    <tr class="bg-light rounded">
                        <td class="text-muted">Por persona (<?= $resultado['personas'] ?>)</td>
                        <td class="text-end fw-semibold text-info">$<?= number_format($resultado['porPersona'], 2) ?></td>
                    </tr>
                    <?php endif; ?>
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
        document.querySelectorAll('.pct-btn').forEach(b => b.classList.remove('active', 'btn-primary'));
        btn.classList.add('active', 'btn-primary');
        btn.classList.remove('btn-outline-primary');
    });
});
</script>
