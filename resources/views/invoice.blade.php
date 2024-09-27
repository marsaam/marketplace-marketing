@extends('layout.navbar')
@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Invoice
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                            <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                                <path d="M7 13m0 2a2 2 0 0 1 2 -2h6a2 2 0 0 1 2 2v4a2 2 0 0 1 -2 2h-6a2 2 0 0 1 -2 -2z" />
                            </svg>
                            Print Invoice
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="card card-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                {{-- <p class="h3">Company</p>
                                <address>
                                    @foreach ($merchants as $merchant)
                                        {{ $merchant->company_name }} <br>
                                        {{ $merchant->company_address }} <br>
                                        {{ $merchant->company_contact }} <br>
                                        {{ $merchant->company_desc }}
                                    @endforeach
                                </address> --}}
                            </div>
                            <div class="col-6 text-end">
                                {{-- <p class="h3">Client</p>
                                <address>
                                    @foreach ($customers as $customer)
                                        {{ $customer->company_name }} <br>
                                        {{ $customer->company_address }} <br>
                                        {{ $customer->company_contact }} <br>
                                        {{ $customer->company_desc }}
                                    @endforeach
                                </address> --}}
                            </div>
                            <div class="col-12 my-5">
                                <h1>Invoice INV/001/15</h1>
                            </div>
                        </div>
                       <table class="table table-transparent table-responsive">
    <thead>
        <tr>
            <th class="text-center" style="width: 1%"></th>
            <th>Product</th>
            <th class="text-center" style="width: 1%">Qnt</th>
            <th class="text-end" style="width: 1%">Unit</th>
            <th class="text-end" style="width: 1%">Amount</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($menu_orders as $key => $menu_order)
            @php
                // Ambil menu yang sesuai dengan menu_id di menu_orders
                $menu = $menus->where('id', $menu_order->menu_id)->first();
            @endphp
            <tr>
                <td class="text-center">{{ $key + 1 }}</td>
                <td>
                    <p class="strong mb-1">{{ $menu->menu_name }}</p>
                    <div class="text-secondary">{{ $menu->menu_description }}</div>
                </td>
                <td class="text-center">{{ $menu_order->total_ordering }}</td>
                <td class="text-end">{{ $menu->menu_price }}</td>
                <td class="text-end">{{ $menu_order->total_ordering * $menu->menu_price }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

                        <p class="text-secondary text-center mt-5">Thank you very much for doing business with us. We look
                            forward to working with
                            you again!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
