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
        <a href="{{route('category.create')}}" class="bg-blue-400 mb-5  w-fit flex p-2 rounded-md gap-x-2 items-center">
            <span class="text-white">
                Добавить категорию
            </span>
            <span>
                    <img src="{{asset('icons/add.svg')}}" alt="Add Icon">
            </span>
        </a>
        <x-block>
            <div class="grid grid-cols-4 gap-4 border-b pb-2 mb-2">
                <div class="font-bold">#ID</div>
                <div class="font-bold">Заголовок</div>
                <div class="font-bold">Подкатегории</div>
                <div class="font-bold text-right">Управление</div>
            </div>

            <!-- Проверка, есть ли категории -->
            @if($catalog->categories->isEmpty())
                <div class="grid grid-cols-4 gap-4 py-2 items-center">
                    <div class="col-span-4 text-center text-gray-500">
                        Нет подкатегорий для данного каталога.
                    </div>
                </div>
            @else
                <div class="grid grid-cols-4 gap-4 py-2 items-center">
                    @foreach($categories as $category)
                        <div class="text-left"> {{$category->id}} </div>
                        <div class="text-left"> {{$category->title}} </div>
                        <a class="underline text-blue-400 text-left" href="{{route('catalog.show', $category->slug )}}">Список категорий ({{ $catalog->categories->count()}})</a>
                        <div class="text-center">
                            <div class="flex justify-end gap-x-2">
                                <a class="bg-blue-400 mb-5 rounded-md p-2" href="{{route('catalog.edit', $catalog->id)}}">
                                   <span>
                                      <img src="{{asset('icons/edit.svg')}}" alt="Edit Icon">
                                   </span>
                                </a>
                                <form action="{{route('catalog.destroy', $catalog->id )}}" method="POST" id="delete-form-{{ $catalog->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="bg-red-400 mb-5 flex items-center justify-center rounded-md p-2" onclick="confirmDelete({{ $catalog->id }})">
                                        <img src="{{asset('icons/delete.svg')}}" alt="Delete Icon">
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </x-block>
    </div>
</x-app-layout>
