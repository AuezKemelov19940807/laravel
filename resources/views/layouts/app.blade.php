<!DOCTYPE html>
<html class="h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

</head>
<body class="font-sans antialiased   h-full">
@php
    $isActive = false;
    $hasError = true;
@endphp
@include('layouts.navigation')

<div class="h-full grid grid-cols-[200px_minmax(900px,_1fr)]">
    <div class="py-4 bg-[#265078] text-white border-r">
        <div class="px-5 flex flex-col gap-y-5 ">
            <a  href="{{route('dashboard')}}" class="flex items-center gap-x-2 cursor-pointer ">

                <span>
                    <img src="{{asset('icons/home.svg')}}" alt="Home Icon">
                </span>
                <span >Главная</span>
            </a>
            <a href="{{route('catalog.index')}}"  class="flex items-center gap-x-2 cursor-pointer ">

                <span>
                    <img src="{{asset('icons/category.svg')}}" alt="Category Icon">
                </span>
                <span>Каталог</span>
            </a>
            <div class="flex items-center gap-x-2 cursor-pointer ">

                <div>
                    <img src="{{asset('icons/inventory.svg')}}" alt="Inventory Icon">
                </div>
                <div>Товары</div>
            </div>
            <div class="flex items-center gap-x-2 cursor-pointer ">

                <div>
                    <img src="{{asset('icons/call.svg')}}" alt="Call Icon">
                </div>
                <div>Заказы звонков</div>
            </div>
            <div class="flex items-center gap-x-2 cursor-pointer ">

                <div>
                    <img src="{{asset('icons/contacts.svg')}}" alt="Contacts Icon">
                </div>
                <div>Контакты</div>
            </div>
            <div class="flex items-center gap-x-2 cursor-pointer ">

                <div>
                    <img src="{{asset('icons/users.svg')}}" alt="Users Icon">
                </div>
                <div>Пользователи</div>
            </div>
            <div>
                <div class="flex items-center gap-x-2 cursor-pointer" onclick="toggle()" >
                    <div class="flex items-center gap-x-2">
                        <div>
                            <img src="{{asset('icons/window.svg')}}" alt="Window Icon">
                        </div>
                        <div>Страницы</div>
                    </div>
                    <div>
                        <img class="arrow" src="{{asset('icons/arrow.svg')}}" alt="Arrow Icon">
                    </div>
                </div>
                <div    class="pages mt-5 flex flex-col gap-y-5"  >
                    <div class="flex items-center gap-x-2 cursor-pointer ">

                        <div>
                            <img src="{{asset('icons/home.svg')}}" alt="Home Icon">
                        </div>
                        <div>Главная</div>
                    </div>
                    <div class="flex items-center gap-x-2 cursor-pointer ">

                        <div>
                            <img src="{{asset('icons/about-us.svg')}}" alt="About Icon">
                        </div>
                        <div>О компании</div>
                    </div>
                    <div class="flex items-center gap-x-2 cursor-pointer ">

                        <div>
                            <img  src="{{asset('icons/news.svg')}}" alt="News Icon">
                        </div>
                        <div>Новости</div>
                    </div>
                    <div class="flex items-center gap-x-2 cursor-pointer ">

                        <div>
                            <img src="{{asset('icons/photo-gallery.svg')}}" alt="Photo Gallery Icon">
                        </div>
                        <div>Фотогалерея</div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="flex flex-col">

                    <main class=" bg-gray-50 p-4  overflow-hidden h-full " >
                        {{ $slot }}
                    </main>
    </div>
</div>

{{--        <div class="min-h-screen flex bg-gray-100 dark:bg-gray-900">--}}
{{--            @include('layouts.navigation')--}}

{{--            <!-- Page Heading -->--}}
{{--            @isset($header)--}}
{{--                <header class="bg-white dark:bg-gray-800 shadow">--}}
{{--                    <div class="mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                        {{ $header }}--}}
{{--                    </div>--}}
{{--                </header>--}}
{{--            @endisset--}}

{{--            <!-- Page Content -->--}}
{{--            <main>--}}
{{--                {{ $slot }}--}}
{{--            </main>--}}
{{--        </div>--}}

<script>

    // import { ClassicEditor, Essentials, Bold, Italic, Font, Paragraph } from 'ckeditor5';
    //
    // import 'ckeditor5/ckeditor5.css';

    function toggle() {
        const pages = document.querySelector('.pages')
        const arrow = document.querySelector('.arrow')
        pages.classList.toggle('active');
        arrow.classList.toggle('active');
    }

    // ClassicEditor
    //     .create( document.querySelector( '#editor' ), {
    //         plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
    //         toolbar: [
    //             'undo', 'redo', '|', 'bold', 'italic', '|',
    //             'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
    //         ]
    //     } )
    //     .then( /* ... */ )
    //     .catch( /* ... */ );


</script>



<style>
    .pages {
        max-height: 0; /* Начальное значение */
        overflow: hidden; /* Скрыть переполнение */
        transition: max-height 0.3s ease; /* Плавный переход по высоте */
    }

    .pages.active {
        transition: max-height 0.3s ease;
        max-height: 500px; /* Достаточно большая высота для полного раскрытия */
    }
    .arrow {
        transition: all 0.3s ease;
    }

    .arrow.active {
        transition: all 0.3s ease;
        transform: rotate(-90deg);
    }



</style>
</body>
</html>
