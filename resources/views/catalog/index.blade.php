<x-app-layout>
    <div>
        <div class="text-2xl mb-5">
            Католог
        </div>


        <a class="bg-blue-400 block w-fit mb-5 rounded-md p-2" href="{{route('catalog.create')}}">
            <span>
                    <img src="{{asset('icons/add.svg')}}" alt="Add Icon">
            </span>
        </a>

        <x-block>
            <div class="grid grid-cols-4 gap-4 border-b pb-2 mb-2  ">
                <div class="font-bold">#ID</div>
                <div class="font-bold">Заголовок</div>
                <div class="font-bold">Подкатегории</div>
                <div class="font-bold text-right">Управление</div>
            </div>
            <div class="grid grid-cols-4 gap-4 py-2 items-center">
                @foreach($catalogs as $catalog)
                    <div class="text-left"> {{$catalog->id}} </div>
                    <div class="text-left"> {{$catalog->name}} </div>
                    <a  class="underline text-blue-400 text-left" href="{{route('catalog.show', $catalog->slug )}}" >Список категорий ({{ $catalog->categories->count()}})</a>
                    <div class="text-center">
                        <div class="flex justify-end gap-x-2">
                            <a class="bg-blue-400 mb-5 rounded-md p-2" href="{{route('catalog.edit', $catalog->id)}}">
                               <span>
                                  <img src="{{asset('icons/edit.svg')}}" alt="Edit Icon">
                               </span>
                            </a>
                            <form action="{{route('catalog.destroy', $catalog->id )}}" method="POST" id="delete-form-{{ $catalog->id }}" >
                                @csrf
                                @method('DELETE')
                                <button type="button" class="bg-red-400 mb-5 flex items-center justify-center rounded-md p-2" onclick="confirmDelete({{ $catalog->id }})" >
                                  <img src="{{asset('icons/delete.svg')}}" alt="Delete Icon">
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </x-block>
    </div>
    <script>
        'use strict';
        // Confirm delete action
        function confirmDelete(catalogId) {
            let confirmation = confirm("Вы действительно хотите удалить этот каталог?");

            if (confirmation) {
                // If confirmed, submit the form
                document.getElementById('delete-form-' + catalogId).submit();
            }
        }
    </script>
</x-app-layout>
