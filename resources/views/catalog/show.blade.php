<x-app-layout>
    <div>
        <a  class="bg-blue-400 mb-5 block p-2 rounded-md w-fit " href="{{route('catalog.index')}}" >
                 <span>
                    <img src="{{asset('icons/back.svg')}}" alt="back Icon">
                </span>
        </a>


        <x-block>
            <div>
                <h2 class="text-2xl mb-5">
                <span>
                    Название каталога:
                </span>    {{$catalog->name}}
                </h2>
            </div>
            <div>
                <h2 class="text-xl mb-5 " >Список категорий:</h2>
                <ul class="flex flex-col gap-y-4 " >
                    @foreach($categories as $category)
                        <li>
                            {{$category->title}}
                        </li>

                    @endforeach
                </ul>

            </div>


        </x-block>
    </div>
</x-app-layout>
