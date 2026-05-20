<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    <h1> {{$user->name}}</h1>
                </div>
                <div>
                    <a href="{{ $user->id }}/edit">
                        <button>
                            Edit
                        </button>
                    </a>
                    <form action="{{$user->id}}/delete"method="POST">
                        @csrf
                        @method("DELETE")
                        <button>
                            Dzēst
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>