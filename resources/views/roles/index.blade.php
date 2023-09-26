<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     <x-auth-session-status class="mb-4" :status="session('message')" />
                    @if(count($roles)>0)
                    <table class="min-w-full text-left text-sm font-light"> 
                    <thead class="border-b border-neutral-700 bg-neutral-800 text-neutral-50 dark:border-neutral-600 dark:bg-neutral-700">
                        <tr class="whitespace-nowrap px-6 py-4 font-medium">
                        <td scope="col" class="px-6 py-4">ID</td>
                        <td scope="col" class="px-6 py-4">Nombre</td>
                        <td scope="col" class="px-6 py-4">Editar</td>
                        <td scope="col" class="px-6 py-4">Eliminar</td>


                            
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($roles as $key=> $role)
                        <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4">{{$key+1}} </td>
                        <td class="whitespace-nowrap px-6 py-4">{{$role->name}} </td>

                        <td class="whitespace-nowrap px-6 py-4">
                            <a href="{{url('/edit-role/'.$role->id)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"> {{ __('Edit') }}</a>
                           
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <form action="{{url('/delete-role/'.$role->id)}}" method="POST">  
                                @csrf
                                @method('DELETE')
                            <x-danger-button type="submit">
                            {{ __('Delete') }}
                             </x-danger-button>
                            </form>
                        
                        </td>
                        </tr>

                        @endforeach

                    </tbody>
                    </table>
                    @else

                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">No hay Roles registrados</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
