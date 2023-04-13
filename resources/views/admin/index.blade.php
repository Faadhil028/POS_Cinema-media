<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __('Admin Content') }}
                    {{-- @php
                        $start_date = \Carbon\Carbon::parse('2023-04-01');
                        $end_date = \Carbon\Carbon::parse('2023-04-10');
                    @endphp

                    @while ($start_date->lte($end_date))
                        <p>{{ $start_date->toDateString() }}</p>
                        @php
                            $start_date->addDay();
                        @endphp
                    @endwhile --}}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
