@extends('lcms.layouts.master')
@section('page_title')
    시스템 공통관리 <i class="fa fa-angle-right"></i> <span class="blue">공통코드관리</span>
@stop

@section('content')
    <div class="x_panel">
        <div class="x_content">
            <table id="list_paging_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Idx</th>
                    <th>Title</th>
                    <th>Name</th>
                    <th>RegDate</th>
                </tr>
                </thead>
                <tbody>
                @foreach($paging['data'] as $row)
                    <tr>
                        <td>{{ $paging['rownum'] }}</td>
                        <td>{{ $row['idx'] }}</td>
                        <td>{{ $row['title'] }}</td>
                        <td>{{ $row['name'] }}</td>
                        <td>{{ $row['regi_date'] }}</td>
                    </tr>
                    @php $paging['rownum']-- @endphp
                @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="col-xs-12">
                    {!! $paging['pagination'] !!}
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
        });
    </script>
@stop
