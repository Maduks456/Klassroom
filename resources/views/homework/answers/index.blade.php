<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if($answers->isEmpty())
                        <h1 class=" text-gray-900 dark:text-gray-100">No one has sent an answer</h1>
                    @else
                    @foreach($answers as $answer)
                        <div class=" text-gray-900 dark:text-gray-100">
                            <h3>{{ $answer->user->name }}</h3>
                            <p>{{ $answer->comment }}</p>
                            <a href="{{ asset('storage/' . $answer->answer_file) }}" download>
                                {{ basename($answer->answer_file) }}
                            </a>
                            @if($answer->raiting)
                                <p>You scored this {{$answer->raiting}}/10 </p>
                            @endif
                            <form action="/rate-answer/{{ $answer->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="number" name="raiting" min="1" max="10" value="{{ $answer->raiting }}" placeholder="Score 1-10">
                                <button>Save Score</button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>