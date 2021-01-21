@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>

        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            강의 업데이트
        </div>

        <div class="willbes-Lec-Selected NG tx-gray">
            <select id="search_subject" name="search_subject" title="과목" class="width49p">
                <option value="">과목</option>
                @foreach($arr_base['subject'] as $row)
                    <option value="{{$row['SubjectIdx']}}" @if($arr_base['search_subject']===$row['SubjectIdx']) selected="selected" @endif>{{$row['SubjectName']}}</option>
                @endforeach
            </select>
            <select id="search_prof" name="search_prof" title="search_prof" class="width50p ml1p">
                <option value="">교수</option>
                @foreach($arr_base['professor'] as $row)
                    <option value="{{$row['ProfIdx']}}" @if($arr_base['search_prof']===$row['ProfIdx']) selected="selected" @endif>{{$row['ProfNickName']}}</option>
                @endforeach
            </select>

            <div class="willbes-Lec-Search NG width100p mt1p">
                <div class="inputBox width88p p_re">
                    <input type="text" id="search_value" name="search_value" class="labelSearch width100p" placeholder="강의명 검색" value="{{$arr_base['search_value']}}" maxlength="50">
                    <button id="btn_search" class="search-Btn">
                        <span class="hidden">검색</span>
                    </button>
                </div>
                <div class="resetBtn width10p">
                    <a href="{{front_url('/updateLectureInfo/index')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                </div>
            </div>
        </div>

        <div class="lineTabs lecListTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                <tbody>
                    @foreach($data as $row)
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">
                                    <a href="{{front_url('/lecture/show/cate/'.$row['CateCode'].'/pattern/only/prod-code/'.$row['ProdCode'])}}">
                                        <span class="tx-blue">[{{$row['SubjectName']}} {{$row['ProfNickName']}}]</span><br>
                                        {{$row['ProdName']}}
                                    </a>
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>{{date("m월 d일", strtotime($row['unit_regdate']))}} 총 {{$row['unit_cnt']}}강 업로드</dt>
                                </dl>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $paging['pagination'] !!}
        </div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#btn_search').on('click', function() {
                goSearch();
            });
            var goSearch = function() {
                goUrl('search_text', Base64.encode($('#search_subject').val() + ':' + $('#search_prof').val() + ':' + $('#search_value').val()));
            };
        });
    </script>
@stop