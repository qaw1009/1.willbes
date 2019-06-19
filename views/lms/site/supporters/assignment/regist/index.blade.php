@extends('lcms.layouts.master')

@section('content')
    <h5>- 서포터즈 과제 등록 및 관리하는 메뉴입니다.</h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        <div class="x_panel">
            <div class="x_content">
                <table class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>운영사이트</th>
                        <th>연도</th>
                        <th>기수</th>
                        <th>서포터즈명</th>
                        <th>운영기간</th>
                        <th>사용여부</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$supporters_data['SiteName']}}</td>
                        <td>{{$supporters_data['SupportersYear']}}</td>
                        <td>{{$supporters_data['SupportersNumber']}}</td>
                        <td>{{$supporters_data['Title']}}</td>
                        <td>{{$supporters_data['StartDate']}} ~ {{$supporters_data['EndDate']}}</td>
                        <td>{!! ($supporters_data['IsUse'] == 'Y') ? '사용' : '<span class="red">미사용</span>' !!}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-xs-12 text-right form-inline">
                    <button type="button" class="btn btn-sm btn-primary ml-10 btn-main-list">목록</button>
                </div>
            </div>
        </div>
    </form>

    <script type="text/javascript">
        var $datatable;
        var $search_form = $('#search_form');
        var $list_table = $('#list_ajax_table');

        $(document).ready(function() {
            //목록
            $('.btn-main-list').click(function() {
                location.href = '{{ site_url("/site/supporters/assignment/") }}' + getQueryString();
            });
        });
    </script>
@stop