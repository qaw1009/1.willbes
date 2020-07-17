@extends('lcms.layouts.master')

@section('content')
    <h5 class="mt-20">- 설문을 등록하는 메뉴입니다.</h5>
    <h5 class="mt-20 red">- 설문링크 와 프로모션페이지 내 그래프를 willbes/pc/survey/index+spidx 와 willbes/pc/survey/graph+spidx 경로에 생성해주세요.</h5>
    <h5 class="mt-20 red">- 프로모션 블레이드에 &#64;include('willbes.pc.survey.show_graph_partial') </h5>
    <form class="form-horizontal" id="search_form" name="search_form" method="POST" onsubmit="return false;">
        {!! csrf_field() !!}

        <div class="x_panel">
            <div class="x_content">
                <div class="form-group form-inline">

                </div>
            </div>
    </form>
    <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
        {!! csrf_field() !!}
        <input type="hidden" id="MgIdx" name="MgIdx" value="">
    </form>

    <div style="text-align:right;">
        <a class="btn btn-default btn-sm btn-primary border-radius-reset" tabindex="0" aria-controls="list_ajax_table" href="{{ site_url('/site/survey/surveyCreate') }}">
            <span><i class="fa fa-pencil mr-5"></i> 등록</span>
        </a>
    </div>
    <div class="x_panel mt-10" style="overflow-x: auto; overflow-y: hidden;">
        <div class="x_content">
            <form class="form-horizontal" id="list_form" name="list_form" method="POST" onsubmit="return false;">
                {!! csrf_field() !!}
                <table id="list_table" class="table table-bordered table-striped table-head-row2 form-table">
                    <colgroup>
                        <col style="width:5%">
                        <col style="">
                        <col style="width:18%">
                        <col style="width:18%">
                        <col style="width:18%">
                        <col style="width:8%">
                    </colgroup>
                    <thead class="bg-white-gray">
                        <tr>
                            <th class="text-center">NO</th>
                            <th class="text-center">제목</th>
                            <th class="text-center">설문팝업링크</th>
                            <th class="text-center">그래프추가시</th>
                            <th class="text-center">시작일 / 종료일</th>
                            <th class="text-center">결과</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>[2020 국가직 9급 풀케어] 시험 난이도 설문조사</td>
                            <td>https://www.local.willbes.net/survey/index/11</td>
                            <td>프로모션 페이지 URL + /spidx/11</td>
                            <td>2020-07-01 00:00:00 / 2020-07-15 00:00:00</td>
                            <td>5</td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
    <script type="text/javascript">


    </script>
@stop
