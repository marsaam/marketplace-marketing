@extends('layout.navbar')
@section('content')
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Overview
                        </div>
                        <h2 class="page-title">
                            Dashboard
                        </h2>
                    </div>
                    <div class="col-auto ms-auto d-print-none"></div>
                    <div class="page-body">
                        <div class="container-xl">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-4">
                                        @can('merchant')
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title">Add New Menu</h3>
                                                    <form id="menuForm"
                                                        action="{{ isset($menu_id) ? route('update-menu', $menu_id) : route('menu-store') }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method(isset($menu_id) ? 'PUT' : 'POST')
                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                        <div class="mb-3">
                                                            <label class="form-label">Menu Name</label>
                                                            <input type="text" class="form-control" id="menu_name"
                                                                placeholder="Enter menu name" name="menu_name" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Menu Type</label>
                                                            <input type="text" class="form-control" id="menu_type"
                                                                placeholder="Enter menu type" name="menu_type" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Menu Price</label>
                                                            <input type="text" class="form-control" id="menu_price"
                                                                placeholder="Enter menu price" name="menu_price" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Menu Description</label>
                                                            <input type="text" class="form-control" id="menu_description"
                                                                placeholder="Enter menu description" name="menu_description"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Menu Photo</label>
                                                            <input type="file" class="form-control" name="menu_photo">
                                                        </div>
                                                        <button class="btn btn-primary">
                                                            {{ isset($menu_id) ? 'Update' : 'Add New Menu' }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endcan

                                        {{-- @can('customer')
                                            <div class="card">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h3 class="card-title">Book Menu</h3>
                                                        <form action="{{ route('order-store') }}" method="POST">
                                                            @csrf <!-- Add CSRF token -->
                                                            <div class="col-12">
                                                                <div id="form-container"> <!-- Container for dynamic forms -->
                                                                    <div class="row mb-3"> <!-- Initial form row -->
                                                                        <div class="col-6"> <!-- For Menu Name -->
                                                                            <input type="hidden" name="user_id"
                                                                                value="{{ auth()->user()->id }}">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Menu Name</label>
                                                                                <select name="menu_id[]" class="form-control">
                                                                                    <!-- Use array notation -->
                                                                                    <option value="">Select a Menu
                                                                                    </option>
                                                                                    @foreach ($menus as $menu)
                                                                                        <option value="{{ $menu->id }}">
                                                                                            {{ $menu->menu_name }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-6"> <!-- For Total -->
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Total</label>
                                                                                <input type="number" name="total_ordering[]"
                                                                                    class="form-control"
                                                                                    placeholder="Enter total">
                                                                                <!-- Use array notation -->
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="mb-3"> <!-- Date of Delivering -->
                                                                    <label class="form-label">Date of Delivering</label>
                                                                    <input type="date" class="form-control"
                                                                        name="date_ordering">
                                                                </div>
                                                                <button type="button" class="btn btn-primary"
                                                                    id="add-button">Add</button>
                                                                <!-- Button to add more forms -->
                                                                <button type="submit" class="btn btn-success">Process</button>
                                                                <!-- Submit button -->
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endcan --}}
                                        @can('customer')
                                            <div class="card">
                                                <div class="card-body">
                                                    <h3 class="card-title">Book Menu</h3>
                                                    {{-- <form action="{{ route('order-store') }}" method="POST">
                                                        @csrf <!-- Add CSRF token -->
                                                        <div class="col-12">
                                                            <div id="form-container"> <!-- Container for dynamic forms -->
                                                                <div class="row mb-3"> <!-- Initial form row -->
                                                                    <div class="col-6"> <!-- For Menu Name -->
                                                                        <input type="hidden" name="user_id"
                                                                            value="{{ auth()->user()->id }}">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Menu Name</label>
                                                                            <select name="menu_id[]" class="form-control">
                                                                                <!-- Use array notation -->
                                                                                <option value="">Select a Menu</option>
                                                                                @foreach ($menus as $menu)
                                                                                    <option value="{{ $menu->id }}">
                                                                                        {{ $menu->menu_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6"> <!-- For Total -->
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Total</label>
                                                                            <input type="number" name="total_ordering[]"
                                                                                class="form-control" placeholder="Enter total">
                                                                            <!-- Use array notation -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3"> <!-- Date of Delivering -->
                                                                <label class="form-label">Date of Delivering</label>
                                                                <input type="date" class="form-control" name="date_ordering">
                                                            </div>
                                                            <button type="button" class="btn btn-primary"
                                                                id="add-button">Add</button> <!-- Button to add more forms -->
                                                            <button type="submit" class="btn btn-success">Process</button>
                                                            <!-- Submit button -->
                                                        </div>
                                                    </form> --}}
                                                    <form action="{{ route('order-store') }}" method="POST">
                                                        @csrf
                                                        <div class="col-12">
                                                            <div id="form-container">
                                                                <div class="row mb-3">
                                                                    <div class="col-6">
                                                                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Menu Name</label>
                                                                            <select name="menu_id[]" class="form-control">
                                                                                <option value="">Select a Menu</option>
                                                                                @foreach ($menus as $menu)
                                                                                    <option value="{{ $menu->id }}">{{ $menu->menu_name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <div class="mb-3">
                                                                            <label class="form-label">Total</label>
                                                                            <input type="number" name="total_ordering[]" class="form-control" placeholder="Enter total">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Date of Delivering</label>
                                                                <input type="date" class="form-control" name="date_ordering">
                                                            </div>
                                                            <button type="button" class="btn btn-primary" id="add-button">Add</button>
                                                            <button type="submit" class="btn btn-primary">Proses</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>

                                            <!-- Optional: Template for new rows -->
                                            <div id="template" style="display:none;">
                                                <div class="row mb-3">
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Menu Name</label>
                                                            <select name="menu_id[]" class="form-control">
                                                                <option value="">Select a Menu</option>
                                                                @foreach ($menus as $menu)
                                                                    <option value="{{ $menu->id }}">{{ $menu->menu_name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Total</label>
                                                            <input type="number" name="total_ordering[]"
                                                                class="form-control" placeholder="Enter total">
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <button type="button"
                                                            class="btn btn-danger remove-button">Remove</button>
                                                        <!-- Button to remove the row -->
                                                    </div>
                                                </div>
                                            </div>
                                        @endcan

                                    </div>
                                    <div class="col-8">
                                        <div class="row row-deck row-cards">
                                            @foreach ($menus as $menu)
                                                <div class="col-md-6 col-lg-3">
                                                    <div class="card">
                                                        <div class="img-responsive img-responsive-21x9 card-img-top"
                                                            style="background-image: url(./static/photos/home-office-desk-with-macbook-iphone-calendar-watch-and-organizer.jpg)">
                                                        </div>
                                                        <div class="card-body">
                                                            <h3 class="card-title">{{ $menu->menu_name }} |
                                                                {{ $menu->menu_type }}| {{ $menu->id }}</h3>
                                                            <p class="text-secondary">{{ $menu->menu_description }}</p>
                                                            <p class="text-secondary">{{ $menu->menu_price }}</p>
                                                            <p class="text-secondary">User ID: {{ $menu->user_id }}</p>
                                                        </div>
                                                        @can('merchant')
                                                            <div class="card-footer">
                                                                <button type="button" class="btn btn-link p-0 edit-button"
                                                                    data-id="{{ $menu->id }}"
                                                                    data-name="{{ $menu->menu_name }}"
                                                                    data-type="{{ $menu->menu_type }}"
                                                                    data-price="{{ $menu->menu_price }}"
                                                                    data-description="{{ $menu->menu_description }}"
                                                                    style="border: none; background: none; cursor: pointer;">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="icon icon-tabler icons-tabler-outline icon-tabler-pencil">
                                                                        <path stroke="none" d="M0 0h24v24H0z"
                                                                            fill="none" />
                                                                        <path
                                                                            d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                                        <path d="M13.5 6.5l4 4" />
                                                                    </svg>
                                                                </button>
                                                                <form action="{{ route('delete-menu', $menu->id) }}"
                                                                    method="POST"
                                                                    onsubmit="return confirm('Are you sure you want to delete this menu?');"
                                                                    style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-link p-0"
                                                                        style="border: none; background: none; cursor: pointer;">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                                                            <path stroke="none" d="M0 0h24v24H0z"
                                                                                fill="none" />
                                                                            <path d="M4 7l16 0" />
                                                                            <path d="M10 11l0 6" />
                                                                            <path d="M14 11l0 6" />
                                                                            <path
                                                                                d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                            <path
                                                                                d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        @endcan
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                // Ambil data dari button
                const menuId = this.getAttribute('data-id');
                const menuName = this.getAttribute('data-name');
                const menuType = this.getAttribute('data-type');
                const menuPrice = this.getAttribute('data-price');
                const menuDescription = this.getAttribute('data-description');

                // Isi form dengan data yang diambil
                document.getElementById('menu_id').value = menuId;
                document.getElementById('menu_name').value = menuName;
                document.getElementById('menu_type').value = menuType;
                document.getElementById('menu_price').value = menuPrice;
                document.getElementById('menu_description').value = menuDescription;

                // Ubah action form untuk mengupdate menu
                const form = document.getElementById('menuForm');
                form.action = `{{ url('update') }}/${menuId}`;

                // Tambahkan method PUT dalam input tersembunyi
                form.querySelector('input[name="_method"]').value = 'PUT';

                form.querySelector('button[type="submit"]').innerText = 'Update';
            });
        });
    </script>
    {{-- <script>
        document.getElementById('add-button').addEventListener('click', function() {
            const template = document.getElementById('template').innerHTML;
            document.getElementById('form-container').insertAdjacentHTML('beforeend', template);
        });

        // Event delegation to handle remove button click
        document.getElementById('form-container').addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-button')) {
                event.target.closest('.row').remove(); // Remove the closest row
            }
        });
    </script> --}}
    <script>
        document.getElementById('add-button').addEventListener('click', function() {
            let formContainer = document.getElementById('form-container');
            let template = document.getElementById('template').innerHTML;
            formContainer.insertAdjacentHTML('beforeend', template);
        });

        document.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-button')) {
                e.target.closest('.row').remove();
            }
        });
    </script>
@endsection
