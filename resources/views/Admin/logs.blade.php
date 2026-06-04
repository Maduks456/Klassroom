<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 ">
                    Action Logs
                </div>
                <div>
                    @if(isset($users))
                    <h1>User logs</h1>
                        @foreach($users as $user)
                            <p>User: {{$user->name}} was created at {{$user->created_at}} and last edited on {{$user->updated_at}}</p>
                        @endforeach
                    @endif
                </div>
                <div>
                    @if(isset($klass))
                    <h1>Class logs</h1>
                        @foreach($klass as $class)
                            <p>Class: {{$class->klass_name}} was created at {{$class->created_at}} by {{$class->user->name}} and last edited on {{$class->updated_at}}</p>
                        @endforeach
                    @endif
                </div>
                <div>
                    @if(isset($joined))
                    <h1>Joined Class logs</h1>
                        @foreach($joined as $join)
                            <p>Joined class: {{$join->user->name}} joined {{$join->klass->klass_name}} at {{$join->created_at}} 
                        @endforeach
                    @endif
                </div>
                <div>
                    @if(isset($homework))
                    <h1>Homework logs</h1>
                        @foreach($homework as $work)
                            <p>Homework: {{$work->homework_name}} was created at {{$work->created_at}} in {{$work->klass->klass_name}} class by {{$work->klass->user->name}} and last edited on {{$work->updated_at}}</p>
                        @endforeach
                    @endif
                </div>
                <div>
                    @if(isset($answers))
                    <h1>Homwork answers logs</h1>
                        @foreach($answers as $answer)
                            <p>Homework answer: {{$answer->user->name}} created an answer on homework {{$answer->homework->homework_name}} at {{$class->created_at}} and last edited on {{$class->updated_at}}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>