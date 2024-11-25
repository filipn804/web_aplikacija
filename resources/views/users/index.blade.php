
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Korisnici
        </h2>
    </x-slot>

    <div class="py-12 px-20">

        @if(Session::has('message'))
            <div class="bg-green-300 text-green-700 rounded px-2 py-3">
                {{Session::get('message')}}
            </div>
        @endif

        
        <div>
            <a href="{{route('users.create')}}">Napravi korisnika</a> 
         </div>
         

        @if ($users)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">#</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ime
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Status
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Rola
                    </th>
                    <th class="relative px-6 py-3"></th>
                    <th class="relative px-6 py-3"></th>
                    <th class="relative px-6 py-3"></th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                @forelse($users as $user)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{$user->id}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{$user->name}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{$user->email}}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->status == '1' ? 'Aktivan' : 'Neaktivan' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $user->role == "administrator" ? 'Administrator': 'Autor' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                           {{--  @if($user->id !== auth()->user()->id)
                                @if($user->status === 'Blokiran')
                                    <a href="{{route('users.unblock', [$user->id])}}"
                                       class="text-blue-500">Deblokiraj</a>
                                @else
                                    <a href="{{route('users.block', [$user->id])}}" class="text-blue-500">Blokiraj</a>
                                @endif
                            @else
                                -
                            @endif  --}}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{route('users.edit', [$user->id])}}" class="text-blue-500">Uredi</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $showDeleteButton = false;

                                // Show the delete button if the user is an author
                            
                                if ($user->role === 'autor') {
                                    $showDeleteButton = true;
                                }

                                // For administrators
                                if ($user->role === 'administrator') {
                                    // If the user is not the current authenticated user and their status is '0', show the delete button
                                    if ($user->id !== auth()->user()->id && $user->status == '0') {
                                        $showDeleteButton = true;
                                    }
                                    // If the user is the current authenticated user, ensure the delete button is not shown
                                    else if ($user->id === auth()->user()->id) {
                                        $showDeleteButton = false;
                                    }
                                }
                            @endphp
                            @if($showDeleteButton)
                                <form method="post" action="{{route('users.destroy', [$user->id])}}"
                                      id="deleteForm{{$user->id}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500"
                                            onclick="event.preventDefault(); if(confirm('Jeste li sigurni da želite obrisati korisnika?')) {document.getElementById('deleteForm{{$user->id}}').submit();} else {return false;} ">
                                        Obriši
                                    </button>
                                </form>
                            @else
                                -
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="px-6 py-4 whitespace-nowrap">Trenutno nema korisnika</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="my-3">
                {{$users->links()}}
            </div>
        @else
            <h2>Trenutno nema korisnika.</h2>
        @endif
    </div>
</x-app-layout>
