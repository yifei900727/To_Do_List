<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <title>To Do List</title>

</head>

<body>
    
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
            <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">登入</a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}"
                class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">註冊</a>
            @endif
            @endauth
        </div>
        @endif
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col col-lg-9 col-xl-7">
                    <div class="card rounded-3">
                        <div class="card-body p-4">
                            <h1 class="text-center my-3 pb-3">To Do List</h1>

                            <main >
                                @if (session()->has('notuice'))
                                <div class="bg-info bg-gradient">
                                    {{session()->get('notuice')}}
                                </div>
                                @endif
                                @yield('main')
                            </main>
                            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



</body>

</html>
