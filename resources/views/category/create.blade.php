<x-app-layout>
    <div>
        <div class="text-2xl mb-5">
            Создание категорий
        </div>
        <x-block>
            <form class="flex flex-col gap-y-5"  action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-3 gap-x-5 items-center">
                    <label for="Name" class="flex flex-col gap-y-2" >
                        <span class="text-xl" >Название категорий</span>
                        <input class="border-[#265078] rounded-md" placeholder="Введите название категорий" type="text" name="title">
                    </label>
                    <label for="Name" class="flex flex-col gap-y-2" >
                        <span class="text-xl" >Описание категорий</span>
                        <input class="border-[#265078] rounded-md" placeholder="Введите описание категорий" type="text" name="text">
                    </label>

                    <label class="flex flex-col gap-y-2">
                        <span class="text-xl">Бюджетный раздел:</span>
                        <input type="checkbox" value="1" name="budget" class="sr-only peer cursor-pointer">
                        <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600 cursor-pointer"></div>
                    </label>


                </div>
                <div>
                    <label for="Image" class="flex flex-col gap-y-2" >
                        <span class="text-xl" >Выберите картинку</span>
                        <input type="file" name="image" >
                    </label>

                </div>
                <div class="grid grid-cols-2 gap-x-5 " >
                    <label for="top_description" class="flex flex-col gap-y-2">
                        <span class="text-xl text-center">Верхнее описание</span>
                        <textarea class="top_description border-[#265078] h-[500px] rounded-md resize-none" name="top_description" placeholder="Введите верхнее описание" ></textarea>

                    </label>
                    <label for="bottom_description" class="flex flex-col gap-y-2">
                        <span class="text-xl text-center">Нижнее описание</span>
                        <textarea class="bottom_description border-[#265078] h-[500px] rounded-md resize-none" name="bottom_description" placeholder="Введите нижнее описание" ></textarea>

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

<script>



    ClassicEditor
        .create(document.querySelector('.top_description'), {

            toolbar: [
                'heading', '|',
                'bold', 'italic', 'link', '|',
                'bulletedList', 'numberedList', '|',
                'blockQuote', '|',
                'insertTable', '|',
                'codeBlock', '|',
                'alignment', '|',
                'undo', 'redo'
            ],


            language: 'ru', // Устанавливаем русский язык для интерфейса
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            },
            // Включаем плагин выравнивания текста
            alignment: {
                options: ['left', 'center', 'right', 'justify'] // Доступные опции выравнивания
            }
        })
        .then(editor => {
            console.log('Editor was initialized', editor);
        })
        .catch(error => {
            console.error('Error during initialization of the editor', error);
        });

    ClassicEditor
        .create(document.querySelector('.bottom_description'), {

            toolbar: [
                'heading', '|',
                'bold', 'italic', 'link', '|',
                'bulletedList', 'numberedList', '|',
                'blockQuote', '|',
                'insertTable', '|',
                'codeBlock', '|',
                'alignment', '|',
                'undo', 'redo',
                'accessibilityHelp'
            ],


            language: 'ru', // Устанавливаем русский язык для интерфейса
            ckfinder: {
                uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
            },
            // Включаем плагин выравнивания текста
            alignment: {
                options: ['left', 'center', 'right', 'justify'] // Доступные опции выравнивания
            }
        })
        .then(editor => {
            console.log('Editor was initialized', editor);
        })
        .catch(error => {
            console.error('Error during initialization of the editor', error);
        });




</script>


</x-app-layout>
