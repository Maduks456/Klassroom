<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in Pupil!") }}
                </div>
                @if(isset(Auth::user()->joinedKlasses))
                <ul>
                    @foreach (Auth::user()->joinedKlasses as $class)
                        <li><a href="class/{{$class->klass->id}}">{{$class->klass->klass_name}}</a>
                            {{$class->klass->user->name}}
                        </li>
                    @endforeach
                </ul> 
                @endif
            </div>
        </div>
    </div>
</x-app-layout>