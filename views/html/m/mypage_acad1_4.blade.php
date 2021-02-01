@extends('html.m.layouts.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div id="Sticky" class="sticky-Title">
        <div class="sticky-Grid sticky-topTit">
            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>   
                온라인첨삭
            </div>
        </div>
    </div> 

    <div class="willbes-Txt2">
        답안제출
        <div class="tx12 mt10">- 첨삭과제 학인</div>
    </div>    

    <div class="paymentWrap">
        <div class="paymentCts">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                    <tr>
                        <td class="tx14"> 
                            한림법학원 온라인 첨삭 과제 6회차입니다. 한림법학원 온라인 첨삭 과제를 제출해주세요. 
                        </td>
                    </tr>
                    <tr class="flie">
                        <td class="w-file NGR">
                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일1이 노출됩니다.docx</a>
                            <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                        </td>
                    </tr>
                    <tr class="txt">
                        <td class="w-txt NGR">
                            과제를 제출해주세요.
                            과제 제출 후 2~3일 이내로 채점이 완료됩니다. 과제 제출 후 2~3일 이내로 채점이 완료됩니다. 과제 제출 후 2~3일 이내로 채점이 완료됩니다. 과제 제출 후 2~3일 이내로 채점이 완료됩니다. 과제 제출 후 2~3일 이내로 채점이 완료됩니다.
                        </td>
                    </tr>
                </tbody>
            </table>            
        </div>
    </div>

    <div class="willbes-WriteBox pb20 mt20">
        <div class="tx14 mb10">- 답안작성</div>
        <textarea></textarea>
        <div class="filetype p_re mt10">
            <input type="text" class="file-text"/>
            <span class="file-btn reset-Btn width25p ml1p">파일찾기</span>
            <span class="file-select"><input type="file" class="input-file" size="3"></span>
            <input class="file-reset NSK" type="button" value="X" />
        </div>
        <div class="tx-gray mt10 lh1_3">
            • 첨부파일 총합 최대 5MB까지 등록 가능합니다.<br>
            • pdf 만 등록 가능합니다. 
        </div>
    </div>


    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>

    <div id="Fixbtn" class="Fixbtn two">
        <ul>
            <li class="btn_blue"><a href="#none">제출하기</a></li>
            <li class="btn_gray"><a href="#none">취소</a></li>
        </ul>
    </div>
    <!-- Topbtn -->
</div>
<!-- End Container -->
@stop