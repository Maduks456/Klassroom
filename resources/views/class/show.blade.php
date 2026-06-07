<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden rounded-lg border border-[#e3e3e0] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)]">

                {{-- Header --}}
                <div class="flex items-center justify-between px-4 py-3.5 bg-white border-b border-[#e3e3e0]">
                    <div class="flex items-center gap-2">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#706f6c]"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                        <span class="text-[13px] font-medium text-[#1b1b18]">{{ $class->class_name }}</span>
                    </div>
                    <span class="text-[11px] bg-[#f5f5f2] text-[#706f6c] border border-[#e3e3e0] rounded-md px-2.5 py-1">
                        {{ $class->homework->count() }} assignments
                    </span>
                </div>

                {{-- Column headers --}}
                <div class="grid grid-cols-[1fr_auto_auto] gap-4 px-4 py-1.5 bg-[#f9f9f7] border-b border-[#e3e3e0]">
                    <span class="text-[11px] uppercase tracking-wider text-[#706f6c]">Title</span>
                    <span class="text-[11px] uppercase tracking-wider text-[#706f6c]">File</span>
                    <span class="text-[11px] uppercase tracking-wider text-[#706f6c]">Actions</span>
                </div>

                {{-- Homework rows --}}
                @if(isset($class->homework))
                    @forelse ($class->homework as $homework)
                        <div class="grid grid-cols-[1fr_auto_auto] gap-4 items-center px-4 py-3.5 border-b border-[#e3e3e0] last:border-b-0 bg-[#fdfdfc]">

                            {{-- Title --}}
                            <div>
                                <p class="text-[13px] font-medium text-[#1b1b18]">{{ $homework->homework_name }}</p>
                            </div>

                            {{-- Download --}}
                            <a href="{{ asset('uploads/documents/' . basename($homework->homework_file)) }}" download
                               class="inline-flex items-center gap-1 text-[11px] bg-[#f0faf4] text-[#2a7a4e] border border-[#c0dd97] rounded-md px-2 py-1 hover:bg-[#e1f5ee] transition-colors">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                                Download
                            </a>

                            {{-- Actions --}}
                            <div class="flex items-center gap-2">

                                @if(Auth::user()->id == $class->user_id)
                                    {{-- Teacher actions --}}
                                    <a href="/answers/{{ $homework->id }}"
                                       class="text-[12px] text-[#1b1b18] underline underline-offset-2 hover:text-[#f53003] inline-flex items-center gap-1">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                        Answers
                                    </a>
                                    <a href="/homework/{{ $homework->id }}/edit"
                                       class="text-[12px] text-[#1b1b18] underline underline-offset-2 hover:text-[#f53003] inline-flex items-center gap-1">
                                        <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                        Edit
                                    </a>
                                    <form action="/class/{{ $homework->klass->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-1 text-[12px] bg-[#fff2f0] text-[#c0301a] border border-[#f5c4b3] rounded-md px-2.5 py-1 hover:bg-[#ffe4e0] transition-colors">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/></svg>
                                            Dzēst
                                        </button>
                                    </form>

                                @else
                                    {{-- Student actions --}}
                                    @php $answer = $homework->getAnswerFromUser(Auth::id()) @endphp

                                    @if($answer)
                                        @if($answer->raiting)
                                            <span class="inline-flex items-center gap-1 text-[11px] bg-[#f0faf4] text-[#2a7a4e] border border-[#c0dd97] rounded-md px-2 py-1">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><polyline points="20 6 9 17 4 12"/></svg>
                                                Score: {{ $answer->raiting }}/10
                                            </span>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-[11px] bg-[#fdf6e8] text-[#8a5c10] border border-[#fac775] rounded-md px-2 py-1">
                                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                                Waiting for score
                                            </span>
                                        @endif
                                        <a href="/edit-answers/{{ $answer->id }}"
                                           class="text-[12px] text-[#1b1b18] underline underline-offset-2 hover:text-[#f53003] inline-flex items-center gap-1">
                                            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg>
                                            Edit answer
                                        </a>
                                    @else
                                        <a href="/give-answers/{{ $homework->id }}"
                                           class="inline-flex items-center gap-1 text-[12px] bg-[#1b1b18] text-white border border-[#1b1b18] rounded-md px-2.5 py-1 hover:bg-black transition-colors">
                                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                                            Give an answer
                                        </a>
                                    @endif
                                @endif

                            </div>
                        </div>
                    @empty
                        <div class="px-4 py-8 text-center text-[13px] text-[#706f6c] bg-[#fdfdfc]">
                            No assignments yet.
                        </div>
                    @endforelse
                @endif

            </div>
        </div>
    </div>
</x-app-layout>