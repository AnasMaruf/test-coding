<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>Voucher Dashboard</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-gray-100 min-h-screen flex flex-col">
        <!-- Header -->
        @include('layout.dashboardLayouts.headerLayout')
        <!-- Layout Wrapper -->
        <div class="flex flex-1">
            <!-- Sidebar -->
            @include('layout.dashboardLayouts.sidebarLayout')
            <!-- Main Content -->
            @yield('content')
        </div>
        <script
            src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
            crossorigin="anonymous"
        ></script>
        <script src="/js/filterKategori.js"></script>
        <script src="/js/addClaim.js"></script>
    </body>
</html>
