<x-app-layout>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div class="page-heading">
            <h3>Product Master</h3>
        </div>
        <div class="page-content">
            <div class="card">
                <div class="card-header">
                    <button class="btn btn-outline-primary btn-sm rounded" type="button" data-bs-toggle="modal"
                        data-bs-target="#modalAddProduct">
                        Add Product
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="productTable" class="table table-striped table-bordered table-sm nowrap"
                            style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width:5%; text-align: center">No</th>
                                    <th style="width:20%; text-align: center">Code</th>
                                    <th style="width:20%; text-align: center">Name</th>
                                    <th style="text-align: center">Description</th>
                                    <th style="width:20%; text-align: center">Measurement</th>
                                    <th style="width:5%; text-align: center">Action</th>
                                    {{-- <th>Product</th> --}}
                                    {{-- <th>Status</th> --}}
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->code }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->measurement->name }}</td>
                                        <td style="text-align: center">
                                            <button type="button" class="btn btn-sm btn-info rounded"
                                                onclick="window.location.href='{{ route('EditPrdMeasurement', $product->id) }}'">
                                                <i class="bi bi-folder"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    ini footer
                </div>
            </div>
        </div>
    </div>

    {{-- modal add user --}}
    <form action="{{ route('ProductMstr.store') }}" method="POST">
        @csrf
        <div class="modal fade" id="modalAddProduct" tabindex="-1" aria-labelledby="modalAddProductLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalAddProductLabel">Product Master</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="height: 400px; overflow-y: scroll;">
                        <div id="dynamicProductsInputs">
                            <div class="product-row">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="code" class="form-label">Code</label>
                                        <input type="text" class="form-control form-control-sm" name="codes[]"
                                            placeholder="Contoh: CAT001" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="product" class="form-label">Product</label>
                                        <input type="text" class="form-control form-control-sm" name="products[]"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="form-label">Description</label>
                                        <input type="text" class="form-control form-control-sm" name="descriptions[]"
                                            required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="satuan" class="form-label">Satuan</label>
                                        <select name="satuans[]" class="form-control form-control-sm">
                                            @foreach ($satuans as $satuan)
                                                <option value="{{ $satuan->id }}">{{ $satuan->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-1">
                                        <label for="" class="form-label">Remove</label>
                                        <button type="button"
                                            class="btn btn-danger btn-sm rounded removeRow">❌</button>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">
                                            <input type="checkbox" checked name="is_stockables[]" value="1">
                                            Apakah termasuk dalam stok?
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-info" id="addRow"
                            data-satuans="{{ json_encode($satuans) }}">Add Row</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @push('scripts')
        <script src="{{ 'assets/js/ProductMstr/getData.js' }}"></script>
        <script src="{{ 'assets/js/alert.js' }}"></script>
    @endpush
</x-app-layout>
