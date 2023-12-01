@extends('back.layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="iq-header-title">
                    <h4 class="card-title">Paket</h4>
                </div>
                <span class="table-add float-right mb-3 mr-2">
                    <button type="button" class="btn btn-sm bg-primary" data-toggle="modal" data-target=".add_package"
                        id="btnAddPackage">
                        <i class="ri-add-fill"></i>
                        <span class="pl-1">Add New</span>
                    </button>
                </span>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="tablePackage" class="table data-table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Paket</th>
                                <th>Harga</th>
                                <th>Status Best</th>
                                <th>Isi Paket</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade add_package" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form action="{{ route('save-package') }}" method="POST" id="formPackage">
                <div class="modal-content">
                @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Form Paket</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="photo">Judul Paket<span
                                        class="text-danger">*</span></label>
                                <input type="text" name="title" class="form-control" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <label class="col-form-label" for="price">Price<span class="text-danger">*</span></label>
                                <input type="number" name="price" class="form-control" required>
                            </div>
                            <div class="col-md-12 mt-2">
                                <div
                                    class="custom-control custom-checkbox custom-checkbox-color-check custom-control-inline">
                                    <input type="checkbox" class="custom-control-input bg-success" name="best" id="best">
                                    <label class="custom-control-label" for="best">Best Seller</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('back/assets/js/response.js') }}"></script>
    <script src="{{ asset('back/assets/js/chart-custom.js') }}"></script>

    <script>
        var table_package;

        let column_datatables_package = [{
                data: 'DT_RowIndex',
                name: 'id',
                orderable: false,
                searchable: false
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'price',
                name: 'price'
            },
            {
                data: 'best',
                name: 'best'
            },
            {
                data: 'sub',
                name: 'sub'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        table_package = $('#tablePackage').DataTable({
            stateSave: true,
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('list-package') }}",
                method: "post",
                data: function(d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                }
            },
            columns: column_datatables_package,
            'columnDefs': [{
                'target': column_datatables_package.length - 1,
                'createdCell': function(td, cellData, rowData, row, col) {
                    $(td).attr('nowrap', true);
                }
            }]
        });

        $('#btnAddPackage').click(function() {
            $("#formPackage")[0].reset();
            $("#formPackage").attr("action", "{{ route('save-package') }}");
        });

        $('#formPackage').submit(function(e) {
            e.preventDefault();

            const url = $(this).attr("action");
            const formData = new FormData(this);

            $.ajax({
                type: "post",
                url: url,
                data: formData,
                contentType: false,
                processData: false,
                dataType: "JSON",
                success: function(response) {
                    var title = "";
                    var icon = "";

                    if (response.alert == '1') {
                        title = "Berhasil";
                        icon = "success";

                        $('.add_package').modal('hide');
                        $('#formPackage')[0].reset();
                    } else {
                        title = "Error !";
                        icon = "error";
                    }

                    getresponse(icon, response.message, title);
                    table_package.ajax.reload(null, false);
                },
                error: function(response) {
                    getresponse("error", response.message, "Error !");
                }
            });
        });

        function deletePackage(url) {
            Swal.fire({
                title: "Warning!",
                html: "Are you sure to delete this data?",
                icon: "warning",
                showCancelButton: true,
                showLoaderOnConfirm: true,
                preConfirm: () => {
                    return fetch(url)
                        .then(response => {
                            if (!response.ok) {
                                throw new Error(response.statusText);
                            }
                            return response.json()
                        })
                        .then(data => {
                            if (data.result == "error") {
                                Swal.showValidationMessage(data.title);
                            }
                        })
                        .catch(error => {
                            console.error(error);
                            Swal.showValidationMessage("An error occurred in delete data");
                        })
                },
                allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: "Success!",
                        text: "Delete data successfully",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false,
                        showCancelButton: false,
                        willOpen: () => {
                            Swal.showLoading()
                        }
                    }).then((result) => {
                        table_package.ajax.reload(null, false);
                    });
                }
            })
        }
    </script>
@endsection
