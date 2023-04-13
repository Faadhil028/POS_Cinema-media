<div id="myModal" tabindex="-1" aria-hidden="true"
    class="fixed z-50 inset-0 overflow-y-auto {{ $show ? 'block' : 'hidden' }}">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-900 opacity-75"></div>
        </div>
        <div class="dark:bg-gray-700 rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full"
            role="dialog" aria-modal="true" aria-labelledby="modal-headline">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b dark:border-gray-600">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white" id="modal-headline">
                    Detail
                </h3>
                <button type="button" wire:click.prevent="doClose()"
                    class="text-gray-500 hover:text-gray-600 focus:outline-none ml-3">
                    <span class="sr-only">Close</span>
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4">
                <table class="tw-0.5 text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                        <tr>
                            <th class="w-1/3 px-4 py-2">
                                Film
                            </th>
                            <th class="w-1/6 px-4 py-2">
                                :
                            </th>
                            <th class="w-1/2 px-4 py-2">
                                {{ $tdetail['film'] }}
                            </th>
                        </tr>
                        <tr>
                            <th class="w-1/3 px-4 py-2">
                                Date
                            </th>
                            <th class="w-1/6 px-4 py-2">
                                :
                            </th>
                            <th class="w-1/2 px-4 py-2">
                                {{ $date }}
                            </th>
                        </tr>
                        <tr>
                            <th class="w-1/3 px-4 py-2">
                                Row
                            </th>
                            <th class="w-1/6 px-4 py-2">
                                :
                            </th>
                            <th class="w-1/2 px-4 py-2">
                                {{ $tdetail['seat'] }}
                            </th>
                        </tr>
                        <tr>
                            <th class="w-1/3 px-4 py-2">
                                Quantity
                            </th>
                            <th class="w-1/6 px-4 py-2">
                                :
                            </th>
                            <th class="w-1/2 px-4 py-2">
                                {{ $tdetail['transaction']['quantity'] }}
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <a href="{{ route('pos.ticket', $tdetail['id']) }}"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Print
                    Ticket</a>
                <button data-modal-hide="myModal" type="button" wire:click.prevent="doClose()"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Cancel</button>
            </div>
        </div>
    </div>
</div>
