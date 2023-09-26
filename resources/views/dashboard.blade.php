<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     <x-auth-session-status class="mb-4" :status="session('message')" />
                      @if(count($users)>0)
                    <table class="min-w-full text-left text-sm font-light table-fixed"> 
                    <thead class="border-b border-neutral-700 bg-neutral-800 text-neutral-50 dark:border-neutral-600 dark:bg-neutral-700">
                        <tr class="whitespace-nowrap px-6 py-4 font-medium">
                        <td scope="col" class="px-6 py-4">ID</td>
                        <td scope="col" class="px-6 py-4">Nombre</td>
                        <td scope="col" class="px-6 py-4">Email</td>
                        <td scope="col" class="px-6 py-4">Roles</td>
                        <td scope="col" class="px-6 py-4">Editar</td>
                        <td scope="col" class="px-6 py-4">Eliminar</td>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4">{{$user->id}} </td>
                        <td class="whitespace-nowrap px-6 py-4">{{$user->name}} </td>
                        <td class="whitespace-nowrap px-6 py-4">{{$user->email}} </td>
                        <td class="whitespace-nowrap px-6 py-4">
                            
                            <a href="{{url('/add-user-role/'.$user->id)}}" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150"> {{ __('Show') }}</a>
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <a href="{{url('/edit-user/'.$user->id)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150"> {{ __('Edit') }}</a>
                           
                        </td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <form action="{{url('/delete-user/'.$user->id)}}" method="POST">  
                                @csrf
                                @method('DELETE')
                            @if(count($users) === 1)
                        
                              <x-danger-button class="ml-3" type="submit" disabled>
                                {{ __('Delete Account') }}
                            </x-danger-button>
                            @else
                            

                              <x-danger-button class="ml-3" type="submit">
                                {{ __('Delete Account') }}
                            </x-danger-button>
                             @endif
                            </form>
                        
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    @else
                    <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">No hay Usuarios registrados</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
