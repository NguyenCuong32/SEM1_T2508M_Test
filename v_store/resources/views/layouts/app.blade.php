<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>V_Store - @yield('title')</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#f97316', // Orange-500 equivalent for Aptech style if needed
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <nav class="bg-white shadow-sm p-4 mb-6">
        <div class="container mx-auto flex justify-between items-center">
            <!-- Home Icon instead of Text to avoid redundancy -->
            <a href="{{ route('items.index') }}" class="text-orange-500 hover:text-orange-700 transition duration-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                </svg>
            </a>
            
            <div class="flex items-center space-x-4">
                <div class="text-sm">
                    <span class="text-gray-500">{{ __('messages.language') }}:</span>
                    @if(app()->getLocale() == 'en')
                        <span class="font-bold text-blue-600">English</span> | 
                        <a href="{{ route('lang.switch', 'vi') }}" class="hover:text-blue-600">Tiếng Việt</a>
                    @else
                        <a href="{{ route('lang.switch', 'en') }}" class="hover:text-blue-600">English</a> | 
                        <span class="font-bold text-blue-600">Tiếng Việt</span>
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-4">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="text-center py-6 text-gray-500 text-sm">
        &copy; {{ date('Y') }} V_Store. All rights reserved.
    </footer>
</body>
</html>
