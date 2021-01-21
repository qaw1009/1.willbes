@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
            </form>
            <div class="willbes-AcadInfo c_both">
                <div class="Acad_info">
                    <!-- List -->
                    <div class="willbes-Leclist c_both">
                        <div class="willbes-Lec-Selected tx-gray c_both mt-zero mb-zero">
                        <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left" >
                            <select id="search_subject" name="search_subject" title="과목" class="seleAcad">
                                <option value="">과목</option>
                                @foreach($arr_base['subject'] as $row)
                                    <option value="{{$row['SubjectIdx']}}" @if($arr_base['search_subject']===$row['SubjectIdx']) selected="selected" @endif>{{$row['SubjectName']}}</option>
                                @endforeach
                            </select>
                            <select id="search_prof" name="search_prof" title="교수">
                                <option value="">교수</option>
                                @foreach($arr_base['professor'] as $row)
                                    <option value="{{$row['ProfIdx']}}" @if($arr_base['search_prof']===$row['ProfIdx']) selected="selected" @endif>{{$row['ProfNickName']}}</option>
                                @endforeach
                            </select>
                        </span>
                            <span class="willbes-Lec-Search willbes-SelectBox mb20 GM">
                            <div class="inputBox p_re">
                                <input type="text" id="search_value" name="search_value" class="labelSearch" placeholder="강의명을 입력해주세요." value="{{$arr_base['search_value']}}" maxlength="50">
                                <button type="button" id="btn_search" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </span>
                        </div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                <colgroup>
                                    <col style="width: 60px;">
                                    <col style="width: 110px;">
                                    <col style="width: 100px;">
                                    <col>
                                    <col style="width: 250px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>No<span class="row-line">|</span></th>
                                    <th>과목<span class="row-line">|</span></th>
                                    <th>교수<span class="row-line">|</span></th>
                                    <th>강좌명<span class="row-line">|</span></th>
                                    <th>강의 회차</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $row)
                                    <tr>
                                        <td class="w-no">{{$paging['rownum']}}</td>
                                        <td class="w-campus">{{$row['SubjectName']}}</td>
                                        <td>{{$row['ProfNickName']}}</td>
                                        <td class="w-list tx-left pl20"><a href="{{front_url('/lecture/show/cate/'.$row['CateCode'].'/pattern/only/prod-code/'.$row['ProdCode'])}}">{{$row['ProdName']}}</a></td>
                                        <td class="w-date">{{date("m월 d일", strtotime($row['unit_regdate']))}} 총 {{$row['unit_cnt']}}강 업로드</td>
                                    </tr>
                                    @php $paging['rownum']-- @endphp
                                @endforeach
                                </tbody>
                            </table>
                            {!! $paging['pagination'] !!}
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-AcadInfo -->
        </div>
    </div>

    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $('#search_value').on('keyup', function() {
                if (window.event.keyCode === 13) {
                    goSearch();
                }
            });
            $('#btn_search').on('click', function() {
                goSearch();
            });
            var goSearch = function() {
                goUrl('search_text', Base64.encode($('#search_subject').val() + ':' + $('#search_prof').val() + ':' + $('#search_value').val()));
            };
        });
    </script>
@stop
