<x-app-layout>
    <div>
        <div class="text-2xl mb-5">
            Создание категорий
        </div>
        <x-block>
            <form class="flex flex-col gap-y-5"  action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-x-5 items-center " >
                    <label for="Name" class="flex flex-col gap-y-2" >
                        <span class="text-xl" >Название категорий</span>
                        <input class="border-[#265078] rounded-md" placeholder="Введите название категорий" type="text" name="name">
                    </label>
                    <label for="Name" class="flex flex-col gap-y-2" >
                        <span class="text-xl" >Описание категорий</span>
                        <input class="border-[#265078] rounded-md" placeholder="Введите описание категорий" type="text" name="name">
                    </label>

                        <label class="flex flex-col gap-y-2">
                            <span class="text-xl" >Бюджетный раздел:</span>

                            <span class="h-[42px] items-center flex pl-1    " >
                                                            <input type="checkbox" value="" class="sr-only peer cursor-pointer ">

                                                         <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 cursor-pointer"></div>


                            </span>

                        </label>


                </div>
                <div class="grid grid-cols-2 gap-x-5 " >
                    <label for="top_description" class="flex flex-col gap-y-2">
                        <span class="text-xl text-center">Верхнее описание</span>
                        <textarea class="border-[#265078] h-[500px] rounded-md resize-none" placeholder="Введите верхнее описание" name="top_description"></textarea>
                    </label>
                    <label for="bottom_description" class="flex flex-col gap-y-2">
                        <span class="text-xl text-center">Нижнее описание</span>
                        <textarea class="border-[#265078] h-[500px] rounded-md resize-none " placeholder="Введите нижнее описание" name="bottom_description" ></textarea>
                    </label>
                </div>
                <button class="bg-blue-400 mb-5 block p-2 rounded-md w-fit" type="submit">
                <span>
                  <img src="{{asset('icons/save.svg')}}" alt="Home Icon">
                </span>
                </button>
            </form>

        </x-block>
    </div>
</x-app-layout>
