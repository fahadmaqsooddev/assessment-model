@extends('admin.layouts.app')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">ExtraQuestions</h3>
            <div class="row">
              <div class="col-md-9 col-sm-8 col-4"></div>
              <div class="col-md-3 col-sm-4 col-8 text-end">
                  <a href="{{ route('add-extra-question') }}" class="btn btn-primary">Add Extra Question</a>
              </div>
          </div>


            </div>
            @if(Session::has('msg'))
              <div class="alert alert-success mt-3">{{ Session::get('msg') }}</div>
            @endif
            <!-- /.card-header -->
            <div class="card-body">
              <div class="table-responsive">
                <table id="example2" class="table table-bordered table-hover w-100">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Question Name</th>
                      <th>Question Type</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($extraquestions)
                      @foreach($extraquestions as $key => $extraquestion)
                        <tr>
                           <td>{{ $extraquestions->currentPage() * $extraquestions->perPage() - $extraquestions->perPage() + $key + 1 }}</td>
                          <td>{{ $extraquestion->question }}</td>
                          <td>{{ $extraquestion->question_type }}</td>
                          <td><a href="{{ route('edit-extra-question',$extraquestion->id)}}" class="btn btn-sm btn-primary">Edit</a></td>
                          <td><a href="{{ route('delete-extra-question',$extraquestion->id)}}" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>    
                      @endforeach
                    @endif
                  </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {{ $extraquestions->links('pagination::bootstrap-4') }} <!-- Use Bootstrap 4 pagination -->
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
  </section>

<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- DataTables  & Plugins -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
      "pageLength": 10, // Number of entries per page
      "language": {
        "paginate": {
          "previous": "<", // Previous button
          "next": ">" // Next button
        }
      }
    });
  });
</script>
@endsection
