@extends('layouts.dashboard')

@section('additional-styles')
    {{-- <style>
        table {
          width: 100% !important;
        }
    </style> --}}
@endsection

@section('content')
    <div class="app-title">
        <div>
            <h1>Book List</h1>
        </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body table-responsive">
              <table class="table table-hover table-bordered" id="datatable" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>ISBN</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Category</th>
                    <th>Language</th>
                    <th>Stock</th>
                    <th>User</th>
                    <th>Action</th>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('additional-scripts')
    {{-- datatables script --}}
    <script type="text/javascript" src="{{ asset('js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
            $('#datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{{ url('dashboard/data-buku') }}',
            columns: [
                    { data: 'DT_RowIndex', name: 'id' },
                    { data: 'isbn_no', name: 'isbn_no'},
                    { data: 'book_name', name: 'book_name' },
                    { data: 'author', name: 'author' },
                    { data: 'categories.category_name', name: 'categories.category_name'},
                    { data: 'language', name: 'language'},
                    { data: 'stock', name: 'stock'},
                    { data: 'user.username', name: 'user.username'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}

                  ],
            drawCallback: function ( setting ) {
              $('.delete').click(function(e){
                e.preventDefault();
                let url = $(this).attr('href');
                swal({
                  title: "Are you sure?",
                  text: "You will not be able to recover this file!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "No, cancel",
                  closeOnConfirm: false,
                  // closeOnCancel: false
                }, function(isConfirm) {
                  if (isConfirm) {
                    $.ajaxSetup({
                      headers: {
                        'X-CSRF-Token': '{{ csrf_token() }}'
                      }
                    });
                    $.ajax({
                      url: url,
                      method: 'DELETE',
                      success: function() {
                        swal("Deleted!", "Your file has been deleted.", "success");
                        location.reload()
                      }
                    });
                  }
                });
              });
            }
          });
    </script>
    {{-- sweetalert script --}}
    <script type="text/javascript" src="{{ asset('js/plugins/sweetalert.min.js') }}"></script>
@endsection