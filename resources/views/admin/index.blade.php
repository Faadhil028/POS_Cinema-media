@push('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush
<x-admin-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __('Admin Content') }} --}}
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


                    <div class="clearfix"></div>
                    <br />

                    <div class="col-div-3">
                        <div class="box">
                            <p>67<br /><span>Customers</span></p>

                        </div>
                    </div>
                    <div class="col-div-3">
                        <div class="box">
                            <p>88<br /><span>Projects</span></p>

                        </div>
                    </div>
                    <div class="col-div-3">
                        <div class="box">
                            <p>99<br /><span>Orders</span></p>

                        </div>
                    </div>
                    <div class="col-div-3">
                        <div class="box">
                            <p>78<br /><span>Tasks</span></p>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <br /><br />
                    <div class="col-div-8">
                        <div class="box-8">
                            <div class="content-box">
                                <p>Top Selling Projects </p>
                                <br />
                                <table>
                                    <tr>
                                        <th>Company</th>
                                        <th>Contact</th>
                                        <th>Country</th>
                                    </tr>
                                    <tr>
                                        <td>Alfreds Futterkiste</td>
                                        <td>Maria Anders</td>
                                        <td>Germany</td>
                                    </tr>
                                    <tr>
                                        <td>Centro comercial Moctezuma</td>
                                        <td>Francisco Chang</td>
                                        <td>Mexico</td>
                                    </tr>
                                    <tr>
                                        <td>Ernst Handel</td>
                                        <td>Roland Mendel</td>
                                        <td>Austria</td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-div-4">
                        <div class="box-4">
                            <div class="content-box">
                                <p>Total Sale </p>

                                <div class="circle-wrap">
                                    <div class="circle">
                                        <div class="mask full">
                                            <div class="fill"></div>
                                        </div>
                                        <div class="mask half">
                                            <div class="fill"></div>
                                        </div>
                                        <div class="inside-circle"> 99% </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>


                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
