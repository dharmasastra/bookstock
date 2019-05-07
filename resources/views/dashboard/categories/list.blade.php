@extends('layouts.dashboard')

@section('content')
    <div class="app-title">
        <div>
            <h1>Category List</h1>
        </div>
    </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body table-responsive">
              <table class="table table-hover table-bordered" id="category_table" width="100%">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Category Name</th>
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
            $('#category_table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: '{{ url('dashboard/data-category')}}',
            columns: [
                    { data: 'DT_RowIndex', name: 'id' },
                    { data: 'category_name', name: 'category_name' },
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