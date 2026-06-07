<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="overflow-hidden rounded-lg border border-[#e3e3e0] shadow-[0px_0px_1px_0px_rgba(0,0,0,0.03),0px_1px_2px_0px_rgba(0,0,0,0.06)]">

                {{-- Header --}}
                <div class="flex items-center gap-2 px-4 py-3.5 bg-white border-b border-[#e3e3e0]">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="text-[#706f6c]"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                    <span class="text-[13px] font-medium text-[#1b1b18]">Make a class</span>
                </div>

                {{-- Form --}}
                <form method="POST" action="/dashboard" class="p-5 bg-[#fdfdfc]">
                    @csrf

                    {{-- Class name --}}
                    <div class="flex flex-col gap-1.5 mb-5">
                        <label for="class_name" class="text-[11px] uppercase tracking-wider text-[#706f6c]">
                            Class name
                        </label>
                        <input
                            id="class_name"
                            type="text"
                            name="class_name"
                            value="{{ old('class_name') }}"
                            placeholder="e.g. Mathematics 101"
                            class="text-[13px] text-[#1b1b18] bg-[#fdfdfc] border border-[#e3e3e0] rounded-md px-2.5 py-2 outline-none focus:border-[#b0b0aa] focus:ring-2 focus:ring-black/5 transition-colors w-full"
                        >
                        @error('class_name')
                            <p class="text-[12px] text-[#f53003]">{{$message }}</p>
                    @enderror
                    </label>
                    <button>Saglabāt</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>