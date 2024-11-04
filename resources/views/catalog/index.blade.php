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
               <div class="text-left">1</div>
               <div class="text-left">Флагштоки</div>
               <div class="underline text-blue-400 text-left">Список подкатегорий (16)</div>
               <div class="text-center">
                   <div class="flex justify-end gap-x-2">
                       <a class="bg-blue-400 mb-5 rounded-md p-2" href="">
                <span>
                    <img src="{{asset('icons/edit.svg')}}" alt="Edit Icon">
                </span>
                       </a>
                       <form class="bg-red-400 mb-5 rounded-md p-2" action="" method="POST">
                <span>
                    <img src="{{asset('icons/delete.svg')}}" alt="Delete Icon">
                </span>
                       </form>
                   </div>
               </div>
           </div>
       </x-block>
   </div>
</x-app-layout>
