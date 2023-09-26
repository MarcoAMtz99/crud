<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
         {{$user->name }}    {{ __('Roles') }}
        </h2>

    

    </x-slot>

    <div class="py-3">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Add Role') }}
                    </h2>
                     <x-auth-session-status class="mb-4" :status="session('message')" />
                    <form action="{{url('/add-user-role/'.$user->id)}} " method="POST">
                        @csrf
                         <div>
                            <x-input-label for="role" :value="__('Name')" />
                          
                            <select data-te-select-init name="role" id="role">
                                @foreach($roles as $role)
                                 <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>     

                    <div class="flex items-center justify-end mt-4">

                        <x-primary-button class="ml-4">
                            {{ __('Add Rol') }}
                        </x-primary-button>
                    </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

        


    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-5">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                     <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('Roles') }}
                    </h2>
                     
                  @if(count($user->roles)>0)
                    <table class="min-w-full text-left text-sm font-light"> 
                    <thead class="border-b border-neutral-700 bg-neutral-800 text-neutral-50 dark:border-neutral-600 dark:bg-neutral-700">
                        <tr class="whitespace-nowrap px-6 py-4 font-medium">
                        <td scope="col" class="px-6 py-4">ID</td>
                        <td scope="col" class="px-6 py-4">Nombre</td>
                        <td scope="col" class="px-6 py-4">Eliminar</td>


                            
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach($user->roles as $key=> $role)
                        <tr class="border-b dark:border-neutral-500">
                        <td class="whitespace-nowrap px-6 py-4">{{$key+1}} </td>
                        <td class="whitespace-nowrap px-6 py-4">{{$role->name}} </td>
                        <td class="whitespace-nowrap px-6 py-4">
                            <form action="{{url('/delete-user-role/'.$user->id)}}" method="POST">  
                                @csrf
                                
                            <input type="hidden" name="role_id" value="{{$role->id}}">
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

                        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">No hay roles asociados a este usuario.</h1>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
