<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V_Store System</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f0f2f5; /* Màu nền xám nhẹ dịu mắt */
            font-family: 'Inter', sans-serif;
            color: #344767;
        }

        /* Card Style - Bo góc và đổ bóng nhẹ */
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            background: #fff;
            transition: transform 0.2s;
        }

        .main-card {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        /* Header của bảng */
        .table thead th {
            background-color: #f8f9fa;
            color: #8392ab;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #edf2f7;
            padding: 12px 16px;
        }

        .table tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid #edf2f7;
        }

        /* Form Controls */
        .form-control {
            border-radius: 8px;
            border: 1px solid #d2d6da;
            padding: 10px 15px;
        }
        .form-control:focus {
            box-shadow: 0 0 0 3px rgba(66, 153, 225, 0.15);
            border-color: #4e73df;
        }

        /* Custom Button */
        .btn {
            border-radius: 8px;
            padding: 8px 16px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-primary { background-color: #4e73df; border-color: #4e73df; }
        .btn-primary:hover { background-color: #2e59d9; transform: translateY(-1px); }
        
        .btn-success { background-color: #1cc88a; border-color: #1cc88a; }
        .btn-danger { background-color: #e74a3b; border-color: #e74a3b; }

        /* Tiêu đề */
        h3 { font-weight: 700; color: #2d3748; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 main-card">
                
                <div class="text-center mb-4">
                    <h2 class="fw-bold text-primary"><i class="fa-solid fa-store me-2"></i>V_Store Management</h2>
                    <p class="text-muted">Professional Sales Item Control Panel</p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show rounded-3 border-0 shadow-sm" role="alert">
                        <i class="fa-solid fa-circle-check me-2"></i> {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger rounded-3 border-0 shadow-sm">
                        <ul class="mb-0 ps-3">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @yield('content')

                <div class="text-center mt-4 text-muted small">
                    &copy; {{ date('Y') }} V_Store. Developed by FAI-Xuan Cuong.
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>