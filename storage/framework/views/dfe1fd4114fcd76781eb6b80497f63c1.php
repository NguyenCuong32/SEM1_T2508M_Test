<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sale Items</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary-color: #c06048;
            /* Burnt Orange/Terracotta */
            --secondary-color: #fcece8;
            /* Light background tint */
            --accent-color: #d9822b;
            /* Golden Orange */
            --text-dark: #2c3e50;
            --text-light: #ffffff;
            --card-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
            --radius: 12px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: var(--text-dark);
            min-height: 100vh;
            padding-bottom: 80px;
            /* Space for footer */
        }

        .page-header {
            color: var(--accent-color);
            text-align: center;
            font-weight: 700;
            margin-top: 30px;
            margin-bottom: 40px;
            text-transform: uppercase;
            letter-spacing: 1px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
        }

        /* Card Styling */
        .card {
            border: none;
            border-radius: var(--radius);
            box-shadow: var(--card-shadow);
            transition: transform 0.2s ease;
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), #a04030);
            color: var(--text-light);
            font-weight: 600;
            border-bottom: none;
            padding: 15px 20px;
        }

        /* Table Styling */
        .table-container {
            background: white;
            border-radius: var(--radius);
            box-shadow: var(--card-shadow);
            padding: 20px;
            overflow: hidden;
        }

        .table thead th {
            background-color: var(--primary-color);
            color: var(--text-light);
            border: none;
            font-weight: 500;
            text-transform: uppercase;
            font-size: 0.9rem;
            padding: 15px;
        }

        .table tbody td {
            padding: 15px;
            vertical-align: middle;
            color: #555;
            border-bottom: 1px solid #eee;
        }

        .table-hover tbody tr:hover {
            background-color: var(--secondary-color);
        }

        /* Buttons */
        .btn-add-new {
            background: linear-gradient(135deg, var(--primary-color), #d9822b);
            color: white;
            border: none;
            padding: 10px 25px;
            border-radius: 30px;
            font-weight: 500;
            box-shadow: 0 4px 6px rgba(192, 96, 72, 0.3);
            transition: all 0.3s ease;
        }

        .btn-add-new:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(192, 96, 72, 0.4);
            color: white;
        }

        .btn-action {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s;
        }

        .btn-action:hover {
            background-color: #f1f1f1;
        }

        /* Form Controls */
        .form-control {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
        }

        .form-control:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 0.2rem rgba(217, 130, 43, 0.25);
        }

        .form-label {
            font-weight: 500;
            color: var(--primary-color);
        }

        /* Footer */
        .footer {
            background: linear-gradient(90deg, var(--primary-color), #e37d5f);
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 90%;
            max-width: 800px;
            border-radius: 50px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            font-size: 0.9rem;
            z-index: 1000;
        }
    </style>
</head>

<body>

    <div class="container mt-4 mb-5">
        <h1 class="page-header">Sale Items</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert"
                style="border-radius: 10px;">
                <i class="fas fa-check-circle me-2"></i> <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <div class="footer">
        <i class="fas fa-map-marker-alt me-2"></i> Số 8, Tôn Thất Thuyết, Cầu Giấy, Hà Nội
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html><?php /**PATH E:\SQL_EXAM\SEM1_T2508M_Test\resources\views/layout/app.blade.php ENDPATH**/ ?>