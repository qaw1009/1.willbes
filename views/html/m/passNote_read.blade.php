@extends('html.m.layouts.v2.master')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <div class="willbes-Tit NGEB p_re">
        <button type="button" class="goback" onclick="history.back(-1); return false;">
            <span class="hidden">뒤로가기</span>
        </button>    
        합격수기
    </div>

    <div class="lineTabs lecListTabs c_both">
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
            <tbody>
                <tr class="list bg-light-gray">
                    <td class="w-data tx-left">
                        <div class="w-tit">
                            <a href="#none">2020학년도 최종합격수기</a>
                        </div>
                        <dl class="w-info tx-gray">
                            <dt>유아<span class="row-line">|</span></dt>
                            <dt>유아<span class="row-line">|</span></dt>
                            <dt>홍길*<span class="row-line">|</span></dt>
                            <dt>2018-00-00<span class="row-line">|</span></dt>
                            <dt>조회수 : <span class="tx-blue">10</span></dt>
                        </dl>
                    </td>
                </tr>                
                <tr class="txt">
                    <td class="w-txt NGR">
                        <div class="mb10"><img src="https://static.willbes.net/public/images/promotion/m/2018/borad_sample.jpg" alt="" ></div>
                        이 시험은 열심히, 똑똑하게, 또 함께 할 때 좋은 결과로 이어질 수 있다고 생각합니다. 
                        노력한다고 모두가 합격하는 것은 아니지만, 노력해야만 합격할 수 있고, 자신의 장점과 단점을 올바로 이해하며, 
                        내가 가진 것을 다른 선생님들과 나누는 가운데 우리는 합격에 한 발자국 더 가까이 갈 수 있을 것입니다.<br>
                        <br>
                        추가로 제가 이 수기에서 말씀드린 방법이 절대적으로 옳은 것은 아니라는 것입니다. 무수히 많은 선생님들께서 
                        지금까지 수 많은 수기를 작성해주셨고, 제 수기는 그 일부일 뿐입니다. 제가 합격했다는 이유로 제 글이 ‘합격수기’가 되고, 
                        불합격하셨다고 해서 ‘불합격수기’가 되는 것은 아니라 생각합니다. 이 말인 즉슨, 선생님들께 꼭 맞는 공부방법을 찾으시기를 바란다는 것입니다. 
                        선생님들 모두가 각자에게 맞는 방법을 통해 공부하셔서, 내년에는 선생님들의 공부방법이 ‘합격수기’로 기록될 수 있기를 바라겠습니다.<br>
                        <br>
                        민쌤과 함께 가시기로 하신 이 길이, 부디 꼭 합격이라는 결실을 맺어지기를 바랍니다. 지금은 이렇게 합격수기를 통해 서면으로 뵙지만, 
                        곧 현장에서 뵐 수 있기를 기도하겠습니다. 다시 한 번 감사드리며, 긴 글 마치겠습니다. <br>
                    </td>
                </tr>
                <tr class="flie">
                    <td class="w-file NGR">
                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 합격증.jpg</a>
                        <a href="#none"><img src="{{ img_url('prof/icon_file.gif') }}"> 파일2가 노출됩니다.docx</a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="lecSubject mt40">
            <a href="{{ site_url('/home/html/m/mypage_csnotice_list') }}">목록</a>
        </div>
    </div>

    <div class="goTopbtn">
        <a href="javascript:link_go();">
            <img src="{{ img_url('m/main/icon_top.png') }}">
        </a>
    </div>
    <!-- Topbtn -->

    <div id="Fixbtn" class="Fixbtn three">
        <ul>
            <li class="btn_gray"><a href="#none">삭제</a></li>
            <li class="btn_blue"><a href="#none">수정</a></li>
            <li class="btn_gray"><a href="#none">목록</a></li>
        </ul>
    </div>
    <!-- Fixbtn -->

</div>
<!-- End Container -->
@stop