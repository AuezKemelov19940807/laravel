<x-app-layout>
    <div>
        <a  class="bg-blue-400 mb-5 block p-2 rounded-md w-fit " href="{{route('catalog.index')}}" >
                 <span>
                    <img src="{{asset('icons/back.svg')}}" alt="back Icon">
                </span>
        </a>
        <div class="text-2xl mb-5">
            {{$catalog->name}}
        </div>
        <a href="{{route('category.create')}}" class="bg-blue-400  w-fit flex p-2 rounded-md gap-x-2 items-center">
            <span class="text-white">
                Добавить категорию
            </span>
            <span>
                    <img src="{{asset('icons/add.svg')}}" alt="Add Icon">
            </span>
        </a>
    </div>
</x-app-layout>
