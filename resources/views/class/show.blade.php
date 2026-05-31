<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if(isset($class->homework))
                    @foreach ($class->homework as $homework)
                        <div>
                            <div>
                                {{$homework->homework_name}}
                            </div>
                            <div>
                                <a href="{{ asset('uploads/documents/' . basename($homework->homework_file)) }}" download>
                                    Download File
                                </a>
                            </div>
                            <div>
                                @if(Auth::user()->id == $class->user_id)
                                    <a href="/answers/{{ $homework->id }}">Check all student answers</a>
                                @else
                                    @php $answer = $homework->getAnswerFromUser(Auth::id()) @endphp
                                    
                                    @if($answer)
                                        @if($answer->raiting)
                                            <span>  Score: {{ $answer->raiting }}/10</span><br>
                                        @else
                                            <span>Waiting for the teacher to score</span><br>
                                        @endif

                                        <a href="/edit-answers/{{ $answer->id }}">Edit answer</a>
                                    @else
                                        <a href="/give-answers/{{ $homework->id }}">Give an answer</a>
                                    @endif
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            
            </div>
        </div>
    </div>
</x-app-layout>