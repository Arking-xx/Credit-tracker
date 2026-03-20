<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <title>@yield('title', 'default title')</title>
    @vite('resources/css/app.css')
</head>

<body>

    <nav class="bg-orange-100 ">
        <ul class="flex justify-between items-center min-h-20 gap-2 px-6">
            <div>
                <li><a class="text-lg font-medium" href="{{route('customers.index')}}">Credit-Tracker</a></li>
            </div>
            <div class="flex gap-4 ">
                <li><a class="hover:underline" href="{{route('customers.index')}}">Dashboard</a></li>
                <li><a class="hover:underline" href="{{route('customers.customer')}}">Customers</a></li>
            </div>
        </ul>
    </nav>



    @yield('main')
</body>

</html>