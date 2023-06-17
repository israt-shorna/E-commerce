@extends('master')

@section('content')

<table class="table permission-dt">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

  </tbody>
</table>





@endsection

@push('js')

    <script type="text/javascript">
        $(function () {

            var table = $('.permission-dt').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('permission.get.data') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name',searchable: false  },
                    {data: 'status', name: 'status'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>

@endpush
