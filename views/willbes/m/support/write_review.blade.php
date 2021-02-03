@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    수강후기
                </div>
            </div>
        </div>


        <div class="willbes-Txt NGR c_both mt20">
            · 수강 종료 강좌는 수강이 종료된 날로부터 30일 이내에만 후기 등록이 가능합니다.<br/>
            · 강좌와 무관한 내용, 의미없는 문자 나열, 비방이나 욕설이 있을 시 삭제될 수 있습니다<br/>
        </div>

        <form id="regi_form" name="regi_form" method="POST" onsubmit="return false;" novalidate>
            {!! csrf_field() !!}
            {!! method_field('POST') !!}
            <input type="hidden" id="start_count" name="start_count">
            <input type="hidden" name="study_cate_code" value="{{ $arr_base['cate_code'] }}"/>
            <input type="hidden" name="study_prod_code" value="{{ $arr_base['prod_code'] }}"/>
            <input type="hidden" name="study_subject_idx" value="{{ $arr_base['subject_idx'] }}"/>
            <input type="hidden" name="study_prof_idx" value="{{ $arr_base['prof_idx'] }}"/>

            <div class="willbes-WriteBox NG tx-gray pb20">
                <div class="lecTitle">{{ urldecode($arr_base['subject_name']) }}</div>
                <div class="rating-stars text-center">
                    <span>수강만족도</span>
                    <ul id="stars">
                        <li class="star" title="평점1" data-value='1' onclick="starCount(1);">
                            <i class="fa fa-star fa-fw"></i>
                        </li>
                        <li class="star" title="평점2" data-value='2' onclick="starCount(2);">
                            <i class="fa fa-star fa-fw"></i>
                        </li>
                        <li class="star" title="평점3" data-value='3' onclick="starCount(3);">
                            <i class="fa fa-star fa-fw"></i>
                        </li>
                        <li class="star" title="평점4" data-value='4' onclick="starCount(4);">
                            <i class="fa fa-star fa-fw"></i>
                        </li>
                        <li class="star" title="평점5" data-value='5' onclick="starCount(5);">
                            <i class="fa fa-star fa-fw"></i>
                        </li>
                    </ul>
                    <div class="success-box">
                        <div class="text-message">0</div>/ 5
                    </div>
                </div>

                <div class="willbes-Lec-Search NG width100p mt10 mb10">
                    <input type="text" id="study_title" name="study_title" title="제목" class="labelSearch width100p" maxlength="30" required="required" placeholder="제목">
                </div>

                <textarea id="study_content" name="study_content" title="내용" required="required"></textarea>
            </div>

        </form>

        <div id="Fixbtn" class="Fixbtn two">
            <ul>
                <li class="btn-purple"><a href="#none" id="btn_submit">등록</a></li>
                <li class="btn_gray"><a href="#none" onclick="history.back(-1);">취소</a></li>
            </ul>
        </div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

    </div>
    <!-- End Container -->

    <script>
        var $regi_form = $('#regi_form');

        $(document).ready(function(){
            $('#btn_submit').click(function () {
                var _url = '{{ front_url('/support/studyComment/store') }}';
                if (!confirm('저장하시겠습니까?')) { return true; }

                ajaxSubmit($regi_form, _url, function(ret) {
                    if(ret.ret_cd) {
                        alert(ret.ret_msg);
                    }
                    goReviewList();
                }, showValidateError, addValidate, false, 'alert');

            });

            function addValidate() {
                if ($('#start_count').val() == '') {
                    alert('수강만족도를 선택해 주세요.');
                    return false;
                }

                if ($.trim($('#study_title').val()) == '') {
                    alert('제목을 입력해 주세요.');
                    $('#study_title').focus();
                    return false;
                }

                if ($.trim($('#study_content').val()) == '') {
                    alert('내용을 입력해 주세요.');
                    $('#study_content').focus();
                    return false;
                }

                return true;
            }
        });

        function starCount(count) {
            $('#start_count').val(count);
        }

        function goReviewList(){
            var _url = "{{ front_url('/support/lectureReview/index?') }}";
            _url += "site_code={{$arr_base['site_code']}}&s_cate_code={{$arr_base['cate_code']}}&subject_idx={{$arr_base['subject_idx']}}&prof_idx={{$arr_base['prof_idx']}}";

            location.href = _url;
        }
    </script>
@stop