<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V_Store Items</title>
    <!-- Google Fonts: Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #e0f2f1 0%, #a7ffeb 100%); /* Light Jade/Mint Background */
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            color: #333;
        }

        /* Glassmorphism Card */
        .card {
            border: none;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            box-shadow: 0 8px 32px 0 rgba(0, 150, 136, 0.1); /* Teal/Jade shadow */
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            overflow: hidden;
        }
        
        .card:hover {
            box-shadow: 0 12px 40px 0 rgba(0, 150, 136, 0.15);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            padding: 1.25rem 1.5rem;
        }

        /* Premium Navbar */
        .navbar {
            background: linear-gradient(90deg, #02AAB0 0%, #00CDAC 100%) !important; /* Jade Gradient: Blue-Green Mix */
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding-top: 1rem;
            padding-bottom: 1rem;
        }

        .navbar-brand {
            font-weight: 700;
            letter-spacing: 0.5px;
            font-size: 1.35rem;
        }

        /* Text Colors */
        .text-primary {
            color: #009688 !important; /* Material Teal */
        }

        /* Background Colors */
        .bg-primary {
            background: linear-gradient(135deg, #02AAB0 0%, #00CDAC 100%) !important;
        }

        /* Buttons */
        .btn {
            border-radius: 8px;
            font-weight: 500;
            padding: 0.5rem 1.2rem;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(50, 50, 93, 0.11), 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .btn:hover {
            box-shadow: 0 7px 14px rgba(50, 50, 93, 0.1), 0 3px 6px rgba(0, 0, 0, 0.08);
        }

        .btn-primary { background: linear-gradient(135deg, #02AAB0 0%, #00CDAC 100%); }
        .btn-success { background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%); }
        .btn-warning { background: linear-gradient(135deg, #ff9966 0%, #ff5e62 100%); color: #fff !important; }
        .btn-danger { background: linear-gradient(135deg, #ff416c 0%, #ff4b2b 100%); color: #fff; }
        .btn-secondary { background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); border: none; color: #555; }

        /* Form Controls */
        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #e1e5eb;
            padding: 0.5rem 1rem;
            background-color: rgba(255,255,255,0.9);
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 3px rgba(118, 75, 162, 0.15);
            border-color: #764ba2;
        }

        /* Strict Alignment */
        input.form-control, .btn {
            height: 40px !important;
            display: inline-flex;
            align-items: center;
        }

        /* Fix Select Alignment & Overlap */
        select.form-select {
            height: 40px !important;
            padding-right: 2.5rem !important; /* Ensure space for chevron */
            padding-left: 1rem;
            background-position: right 0.75rem center; /* Center chevron */
            line-height: normal; /* Let browser handle vertical centering */
        }

        /* Table Styling */
        .table thead th {
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
            color: #ffffff !important; /* White text */
            border-bottom: none;
            background: #00897b !important; /* Solid Darker Jade */
            padding-top: 1rem;
            padding-bottom: 1rem; /* Increased height */
            vertical-align: middle;
        }
        
        .table-striped > tbody > tr:nth-of-type(odd) > * {
            --bs-table-accent-bg: rgba(0, 0, 0, 0.01) !important; /* Extremely Light Gray for Striped Rows */
            background-color: rgba(0, 0, 0, 0.01) !important;
        }

        /* Column Dividers */
        .table td, .table th {
            border-right: 1px solid rgba(0,0,0,0.05); /* Subtle vertical divider */
            vertical-align: middle; /* Ensure vertical centering */
        }
        .table td:last-child, .table th:last-child {
            border-right: none;
        }

        .table-hover tbody tr:hover > * {
            background-color: rgba(76, 175, 80, 0.1) !important; /* Force Light Pastel Green */
            --bs-table-accent-bg: rgba(76, 175, 80, 0.1) !important; /* Bootstrap 5 Override */
            transition: background-color 0.2s ease-in-out;
        }

        /* Badge */
        .badge {
            font-weight: 500;
            padding: 0.5em 0.8em;
            border-radius: 6px;
        }

        /* Footer */
        footer {
            background: linear-gradient(to right, #ffffff, #f8f9fa);
        }

        /* Pagination Customization */
        .page-link {
            color: #11998e;
            border-color: #e0f7fa;
        }
        .page-link:hover {
            color: #0e7d74;
            background-color: #e0f7fa;
            border-color: #e0f7fa;
        }
        .page-item.active .page-link {
            background: linear-gradient(135deg, #02AAB0 0%, #00CDAC 100%); /* Jade Gradient */
            border-color: transparent;
            color: white;
            box-shadow: 0 2px 5px rgba(2, 170, 176, 0.3);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-5">
        <div class="container">
            <a class="navbar-brand" href="{{ route('item_sale.index') }}">
                <i class="fa-solid fa-store me-2"></i>V_Store Premium
            </a>
        </div>
    </nav>

    <div class="container mb-5">
        @if(session('success'))
            <div class="alert alert-success shadow-sm rounded-4 border-0 mb-4 d-flex align-items-center">
                <i class="fa-solid fa-check-circle me-2 fs-4 text-success"></i>
                <div class="fw-medium">{{ session('success') }}</div>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="text-center text-muted py-4 mt-auto shadow-sm border-top">
        <div class="container">
             <div class="mb-1"><i class="fa-solid fa-building-columns me-2"></i><strong>FPT Academy International</strong></div>
             <div class="mb-1 fw-bold text-success">&copy; Dokhacgiakhoa 2026</div>
             <small class="text-secondary">Address: 13 Trịnh Văn Bô, Phường Xuân Phương, Hà Nội.</small>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
