<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'App' ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --brand-from: #1a1a2e;
            --brand-to:   #16213e;
            --accent:     #0f3460;
            --highlight:  #e94560;
        }

        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', system-ui, sans-serif;
            min-height: 100vh;
        }

        /* ── Navbar ── */
        .app-navbar {
            background: linear-gradient(135deg, var(--brand-from), var(--accent));
            box-shadow: 0 2px 20px rgba(0,0,0,.3);
            padding: 0.75rem 0;
        }
        .app-navbar .navbar-brand {
            font-weight: 700;
            font-size: 1.2rem;
            color: #fff !important;
            letter-spacing: .5px;
        }
        .app-navbar .navbar-brand i {
            color: var(--highlight);
        }
        .app-navbar .badge-course {
            background: rgba(255,255,255,.15);
            color: #fff;
            font-size: .75rem;
            padding: .35em .75em;
            border-radius: 20px;
            border: 1px solid rgba(255,255,255,.25);
        }

        /* ── Page header ── */
        .page-header {
            background: linear-gradient(135deg, var(--brand-from), var(--accent));
            color: #fff;
            padding: 2.5rem 0 3.5rem;
            margin-bottom: -2rem;
        }
        .page-header h1 { font-weight: 700; font-size: 1.8rem; }
        .page-header p  { opacity: .75; font-size: .95rem; }

        /* ── Cards ── */
        .app-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 24px rgba(0,0,0,.08);
            overflow: hidden;
        }
        .app-card .card-header {
            background: #fff;
            border-bottom: 1px solid #f0f0f0;
            padding: 1.25rem 1.5rem;
            font-weight: 600;
            font-size: 1rem;
            color: #333;
        }
        .app-card .card-body { padding: 1.75rem; }

        /* ── Result card accent ── */
        .result-card { border-top: 4px solid #198754; }

        /* ── Buttons ── */
        .btn-primary {
            background: linear-gradient(135deg, var(--accent), var(--highlight));
            border: none;
            font-weight: 600;
            letter-spacing: .3px;
        }
        .btn-primary:hover { opacity: .9; transform: translateY(-1px); transition: .2s; }

        .pct-btn.active {
            background: var(--highlight) !important;
            border-color: var(--highlight) !important;
            color: #fff !important;
        }

        /* ── Result table ── */
        .result-row-total { background: #f8f9ff; }
        .total-amount { font-size: 2rem; font-weight: 800; color: var(--accent); }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="app-navbar navbar navbar-expand">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <i class="bi bi-receipt-cutoff me-2"></i><?= $pageTitle ?? 'App' ?>
        </a>
        <span class="badge-course ms-auto">PROWEB02-3</span>
    </div>
</nav>

<!-- Page header -->
<div class="page-header">
    <div class="container">
        <h1><i class="bi bi-calculator me-2"></i><?= $pageTitle ?? 'App' ?></h1>
        <p class="mb-0"><?= $pageSubtitle ?? '' ?></p>
    </div>
</div>

<div class="container py-4">
