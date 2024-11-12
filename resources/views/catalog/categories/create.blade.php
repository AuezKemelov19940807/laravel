<x-app-layout>
    <div>
        <div class="text-2xl mb-5">
            Добавение категорий
        </div>
        <a  class="bg-blue-400 mb-5 block p-2 rounded-md w-fit " href="{{route('catalog.index')}}" >
                 <span>
                    <img src="{{asset('icons/back.svg')}}" alt="back Icon">
                </span>
        </a>
        <x-block>
            <form class="flex flex-col gap-y-5"  action="{{route('catalog.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="Name" class="flex flex-col gap-y-2">
                    <span class="text-xl">Название каталога</span>
                    <input
                        class="name  rounded-md @error('name') border-red-400 @enderror"
                        placeholder="Введите название каталога"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        onfocus="removeError()"
                    >
                    @error('name')
                    <div class="error text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </label>
                <button class="bg-blue-400 mb-5 block p-2 rounded-md w-fit" type="submit">
                <span>
                  <img src="{{asset('icons/save.svg')}}" alt="Home Icon">
                </span>
                </button>
            </form>

        </x-block>
    </div>

    <script>
        const name = document.querySelector('.name');
        const error =  document.querySelector('.error');

        function removeError() {
            if(name.value === '') {
                error.classList.add('active')
                name.classList.add('active')
            } else {
                error.classList.remove('active')
                name.classList.add('active')
            }
        }


    </script>
    <style>

        .name.active {
            border: 1px solid #2563eb;
        }
        .error.active {
            display: none;
        }

    </style>
</x-app-layout>
