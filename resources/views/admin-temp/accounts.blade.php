<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
               <ul>
                    @foreach ($users as $user)
                        @if($user->role !== "Admin")
                            <li class=" text-gray-900 dark:text-gray-100"><a href="accounts/{{ $user->id }}">{{$user->name}}</a></li>
                        @endif
                    @endforeach
                <ul>
            </div>
        </div>
    </div>
</x-app-layout>