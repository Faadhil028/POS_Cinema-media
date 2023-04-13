<div class="py-12 w-full">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <div class="pb-4 bg-white dark:bg-gray-900 flex justify-between">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative px-2 pt-2">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none pt-2">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Search for items">
                    </div>
                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Invoice Code
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Unit Price
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Cash
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Return
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Total
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Method
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $transaction->invoice_code }}
                                </th>
                                <th class="px-6 py-4">
                                    {{ $transaction->date }}
                                </th>
                                <th class="px-6 py-4">
                                    {{ $transaction->quantity }}
                                </th>
                                <th class="px-6 py-4">
                                    {{ $transaction->unit_price }}
                                </th>
                                <th class="px-6 py-4">
                                    {{ $transaction->cash }}
                                </th>
                                <th class="px-6 py-4">
                                    {{ $transaction->return }}
                                </th>
                                <th class="px-6 py-4">
                                    {{ $transaction->total }}
                                </th>
                                <th class="px-6 py-4">
                                    {{ $transaction->payment_method }}
                                </th>
                                <td class="px-6 py-4">
                                    <div class="flex">
                                        <button wire:click.prevent='showDetail({{ $transaction->id }})'
                                            class="px-1 font-medium text-sky-500 hover:underline" type="button">
                                            Detail
                                        </button>
                                        {{-- /
                                            <button type="submit"
                                                class="px-1 font-medium text-sky-500 hover:underline">
                                                Print Ticket
                                            </button> --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<livewire:transaction.modal-detail>
