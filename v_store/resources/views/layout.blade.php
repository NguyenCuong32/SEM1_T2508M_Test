<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>V_Store Items</title>
    <!-- Bootstrap CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .header {
            background-color: #E06F50; /* Orange-ish color from mockup */
            color: white;
            padding: 15px;
            font-weight: bold;
            font-size: 24px;
        }
        .header .sub-text {
            font-size: 18px;
            font-weight: normal;
        }
        .page-title {
            text-align: center;
            color: #D98E2E; /* Golden color */
            margin: 20px 0;
            font-weight: bold;
        }
        .table-header {
            background-color: #C85C42; /* Darker orange */
            color: white;
        }
        .btn-add {
            background-color: #C85C42;
            color: white;
            border: none;
            margin-bottom: 20px;
        }
        .footer {
            background-color: #C85C42;
            color: white;
            padding: 10px;
            margin-top: 50px;
            text-align: left;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="header">
    V_Store <span class="sub-text">Items</span>
</div>

<div class="container">
    @yield('content')
</div>

<div class="footer">
    Số 8, Tôn Thất Thuyết, Cầu giấy, Hà Nội
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
