@section('title', 'Editiraj Korisnika - Filipov Oglasnik')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Ažuriraj Korisnika
        </h2>
    </x-slot>

    <div class="py-12 px-20">

        <form method="post" action="{{route('users.update', [$user->id])}}">
            @csrf
            @method('PUT')

            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div class="grid grid-cols-3 gap-6">
                        <div class="col-span-3 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Ime
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="name" value="{{$user->name}}"
                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 @error('title') border-red-500 @enderror"
                                       placeholder="Ime">
                            </div>
                            @error('name')
                            <div class="text-red-600">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="col-span-3 sm:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">
                                Email
                            </label>
                            <div class="mt-1 flex rounded-md shadow-sm">
                                <input type="text" name="email" value="{{$user->email}}"
                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 @error('title') border-red-500 @enderror"
                                       placeholder="Ime">
                            </div>
                            @error('email')
                            <div class="text-red-600">{{$message}}</div>
                            @enderror
                        </div>

                        
                            <div class="col-span-3 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Status
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <select name="status"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 @error('status') border-red-500 @enderror">
                                        <option value="1" {{$user->status == '1' ? 'selected':''}}>Aktivan
                                        </option>
                                        <option value="0" {{$user->status == '0' ? 'selected':''}}>
                                            Neaktivan
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                <div class="text-red-600">{{$message}}</div>
                                @enderror
                            </div>
                            
                            <div class="col-span-3 sm:col-span-2">
                                <label class="block text-sm font-medium text-gray-700">
                                    Rola
                                </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <select name="role"
                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 @error('role') border-red-500 @enderror">
                                        <option value="administrator" {{$user->role == 'administrator' ? 'selected':''}}>Administrator
                                        </option>
                                        <option value="autor" {{$user->role == 'autor' ? 'selected':''}}>Autor</option>
                                    </select>
                                </div>
                                @error('role')
                                <div class="text-red-600">{{$message}}</div>
                                @enderror
                            </div>
                

                    </div>

                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Ažuriraj Korisnika
                    </button>
                </div>
            </div>

        </form>

    </div>
</x-app-layout>
