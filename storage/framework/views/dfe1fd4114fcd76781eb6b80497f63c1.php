<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Items - V_Store</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        .main-container {
            margin-top: 50px;
            margin-bottom: 100px;
            max-width: 1200px;
        }

        .page-title {
            color: #d35400;
            /* Pumpkin / Burnt Orange */
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .custom-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            overflow: hidden;
            background: white;
        }

        .btn-custom {
            background-color: #d35400;
            color: white;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-custom:hover {
            background-color: #a04000;
            color: white;
            transform: translateY(-2px);
        }

        .table-custom thead th {
            background-color: #d35400;
            color: white;
            border: none;
            padding: 15px;
            font-weight: 500;
        }

        .table-custom tbody td {
            padding: 15px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f1f1;
        }

        .table-custom tbody tr:hover {
            background-color: #fff8f0;
        }

        .footer {
            background-color: #d35400;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
            font-size: 0.9rem;
            box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #d35400;
            box-shadow: 0 0 0 0.2rem rgba(211, 84, 0, 0.25);
        }
    </style>
</head>

<body>

    <div class="container main-container">
        <h1 class="page-title">Sale Items Management</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <div class="footer">
        <i class="fas fa-map-marker-alt me-2"></i> Số 8, Tôn Thất Thuyết, Cầu giấy, Hà Nội
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH E:\SQL_EXAM\SEM1_T2508M_Test\resources\views/layout/app.blade.php ENDPATH**/ ?>