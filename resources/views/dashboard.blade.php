<x-app-layout>
    <x-slot name="header">
        {{-- class="font-semibold text-xl text-gray-800 leading-tight" --}}
        <h2 >
            {{ __('To Do List') }}
        </h2>
    </x-slot>
    <section class="vh-100" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center">
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
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
