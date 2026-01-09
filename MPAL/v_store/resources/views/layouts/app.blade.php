<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>V Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('items.index') }}">V Store</a>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>
<body>
<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
