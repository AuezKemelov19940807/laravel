<x-app-layout>
    <div>
        <div class="text-2xl mb-5">
            Добавить
        </div>
        <a  class="bg-blue-400 mb-5 block p-2 rounded-md w-fit " href="{{route('catalog.index')}}" >
                 <span>
                    <img src="{{asset('icons/back.svg')}}" alt="back Icon">
                </span>
        </a>
        <x-block>
            <form class="flex flex-col gap-y-5"  action="{{route('catalog.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="Name" class="flex flex-col gap-y-2" >
                    <span class="text-xl" >Название каталога</span>
                    <input class="border-[#265078] rounded-md" placeholder="Введите название каталога" type="text" name="name">
                </label>
                <button class="bg-blue-400 mb-5 block p-2 rounded-md w-fit" type="submit">
                <span>
                  <img src="{{asset('icons/save.svg')}}" alt="Home Icon">
                </span>
                </button>
            </form>

        </x-block>
    </div>
</x-app-layout>
