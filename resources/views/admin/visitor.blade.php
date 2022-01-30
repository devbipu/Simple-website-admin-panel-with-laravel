@extends('admin.layout.app')

@section('admin-area-title', 'All Visitor')


{{-- content start --}}

@section('adminBodyContent')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">All Visitor</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
            </button>
        </div>
    </div>

    {{-- Table start --}}
    <div class="table-responsive mt-5">
        <table id="visitorTable" class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Sl. No</th>
                <th>IP</th>
                <th>Visit Time</th>
            </tr>
            </thead>
            <tbody>
                @php $vistorTableRow = 1; @endphp
                @foreach ($visitors as $item)
                    <tr>
                        <td>{{$vistorTableRow}}</td>
                        <td>{{$item->ip}}</td>
                        <td>{{$item->visitTime}}</td>
                    </tr>
                    @php $vistorTableRow++; @endphp
                @endforeach
                
            </tbody>
        </table>
    </div>
@endsection




{{-- script --}}

@section('admin-js')
  <script>
    
    $(document).ready( function () {
        $('#visitorTable').DataTable();
    });
  </script>    
@endsection