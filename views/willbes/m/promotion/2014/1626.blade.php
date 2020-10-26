@extends('willbes.m.layouts.master')

@section('content')
<!-- Container -->
<style type="text/css">
    .evtCtnsBox {width:100%; max-width:720px; margin:0 auto; text-align:center; position:relative; font-size:14px; line-height:1.5}
    .evtCtnsBox img {width:100%; max-width:720px;}
    .welcome_pack {position:relative;}
    .njob_join {position:absolute;left:50%;top:60%;margin-left:-285px;}

    .sampleView1626 {padding-bottom:50px}
    .sampleView1626 h4 {margin-bottom:20px; font-size:20px; color:#c06b0c; clear:both; text-align:left; padding-left:2%}
    .sampleView1626 h4 span {color:#303030}
    .sampleView1626 ul {margin-bottom:70px; margin-right:-10px}
    .sampleView1626 li {display:inline; float:left; width:46%; margin:0 2%; text-align:center; margin-bottom:30px}
    .sampleView1626 li img {width:100%; max-width:292px;}
    .sampleView1626 .viewBtns {margin-top:15px; text-align:center}
    .sampleView1626 .viewBtns a {display:inline-block; height:30px; line-height:30px; text-align:center; color:#fff; background:#f79601; border-radius:6px;
    width:30%; margin:0 2%; font-size:14px}
    .sampleView1626 .viewBtns a:last-child {margin:0}
    .sampleView1626 li:after,
    .sampleView1626 ul:after {content:''; display:block; clear:both}  


    /* 폰 가로, 태블릿 세로*/
    @@media only screen and (max-width: 374px) {        
        .sampleView1626 ul {margin-bottom:30px; margin-right:0}
        .sampleView1626 li {margin-bottom:20px}
        .welcome_pack {position:relative;}
        .njob_join {position:absolute;left:50%;top:65%;margin-left:-163px;}
        .njob_join img{width:325px;}
    }

    @@media only screen and (min-width: 375px) and (max-width: 640px) {
        .sampleView1626 ul {margin-bottom:30px; margin-right:0}
        .welcome_pack {position:relative;}
        .njob_join {position:absolute;left:50%;top:70%;margin-left:-175px;}
        .njob_join img{width:350px;}
    }

    /* 태블릿 세로 */
    @@media only screen and (min-width: 690px) {   
        .welcome_pack {position:relative;}
        .njob_join {position:absolute;left:50%;top:69%;margin-left:-285px;}
    }

</style>

<div id="Container" class="Container NSK c_both">    
    
    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_top.jpg" alt="신규 회원가입 이벤트" > 
    </div>  

    <div class="evtCtnsBox">
        <div class="welcome_pack"> 
            <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_01.jpg" alt="혜택">
        </div>
        <div class="njob_join">
            <a href="https://www.willbes.net/member/login/?rtnUrl=%2F%2Fnjob.willbes.net%2Fm%2Fhome%2Findex" target="_blank" alt="회원가입하기">
                <img src="https://static.willbes.net/public/images/promotion/2020/08/1626m_01_btn.png" alt="회원가입하고 N잡러 되기">
            </a>
        </div>             
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_02.jpg" alt="신규회원 웰컴팩" >
    </div>
  

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_03.jpg" alt="강의맛보기" >           
        <div class="sampleView1626">
            <h4 class="NSK-Black">이커머스 <span>(온라인창업)</span></h4>
            <ul>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_03_01.jpg" alt="김정환" >
                    <div class="viewBtns">
                        @if(empty($arr_base['promotion_otherinfo_data']) === false)
                            @php $i = 1; @endphp
                            @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                @if($row['ProfIdx'] == '51010') {{-- 김정환 --}}
                                    <a href="javascript:fnMobile('https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD', '{{config_item('starplayer_license')}}');">{{$i}}강</a>
                                    @php $i += 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    </div>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_03_02.jpg" alt="김경은" >
                    <div class="viewBtns">
                        @if(empty($arr_base['promotion_otherinfo_data']) === false)
                            @php $i = 1; @endphp
                            @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                @if($row['ProfIdx'] == '51007') {{-- 김경은 --}}
                                    <a href="javascript:fnMobile('https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD', '{{config_item('starplayer_license')}}');">{{$i}}강</a>
                                    @php $i += 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    </div>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_03_03.jpg" alt="황채영" >
                    <div class="viewBtns">
                        @if(empty($arr_base['promotion_otherinfo_data']) === false)
                            @php $i = 1; @endphp
                            @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                @if($row['ProfIdx'] == '51009') {{-- 황채영 --}}
                                    <a href="javascript:fnMobile('https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD', '{{config_item('starplayer_license')}}');">{{$i}}강</a>
                                    @php $i += 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    </div>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_03_04.jpg" alt="정문진" >
                    <div class="viewBtns">
                        @if(empty($arr_base['promotion_otherinfo_data']) === false)
                            @php $i = 1; @endphp
                            @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                @if($row['ProfIdx'] == '51008') {{-- 정문진 --}}
                                    <a href="javascript:fnMobile('https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD', '{{config_item('starplayer_license')}}');">{{$i}}강</a>
                                    @php $i += 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    </div>
                </li>                    
            </ul>

            <h4 class="NSK-Black">SNS <span>인플루언서</span></h4>
            <ul>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_03_05.jpg" alt="이시한" >
                    <div class="viewBtns">
                        @if(empty($arr_base['promotion_otherinfo_data']) === false)
                            @php $i = 1; @endphp
                            @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                @if($row['ProfIdx'] == '51032') {{-- 이시한 --}}
                                    <a href="javascript:fnMobile('https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD', '{{config_item('starplayer_license')}}');">{{$i}}강</a>
                                    @php $i += 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    </div>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_03_06.jpg" alt="이승기" >
                    <div class="viewBtns">
                        @if(empty($arr_base['promotion_otherinfo_data']) === false)
                            @php $i = 1; @endphp
                            @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                @if($row['ProfIdx'] == '51031') {{-- 이승기 --}}
                                    <a href="javascript:fnMobile('https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD', '{{config_item('starplayer_license')}}');">{{$i}}강</a>
                                    @php $i += 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    </div>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_03_07.jpg" alt="안혜빈" >
                    <div class="viewBtns">
                        @if(empty($arr_base['promotion_otherinfo_data']) === false)
                            @php $i = 1; @endphp
                            @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                @if($row['ProfIdx'] == '51030') {{-- 안혜빈 --}}
                                    <a href="javascript:fnMobile('https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD', '{{config_item('starplayer_license')}}');">{{$i}}강</a>
                                    @php $i += 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    </div>
                </li>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_03_08.jpg" alt="이기용" >
                    <div class="viewBtns">
                        @if(empty($arr_base['promotion_otherinfo_data']) === false)
                            @php $i = 1; @endphp
                            @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                @if($row['ProfIdx'] == '51029') {{-- 이기용 --}}
                                    <a href="javascript:fnMobile('https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD', '{{config_item('starplayer_license')}}');">{{$i}}강</a>
                                    @php $i += 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    </div>
                </li>                    
            </ul>
            <h4 class="NSK-Black">지식창업 <span>(책쓰기)</span></h4>
            <ul>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_03_09.jpg" alt="양원근" >
                    <div class="viewBtns">
                        @if(empty($arr_base['promotion_otherinfo_data']) === false)
                            @php $i = 1; @endphp
                            @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                @if($row['ProfIdx'] == '51060') {{-- 양원근 --}}
                                    <a href="javascript:fnMobile('https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD', '{{config_item('starplayer_license')}}');">{{$i}}강</a>
                                    @php $i += 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    </div>
                </li>                   
            </ul>
            <h4 class="NSK-Black">지식창업 <span>(리더십)</span></h4>
            <ul>
                <li>
                    <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_03_10.jpg" alt="김윤태" >
                    <div class="viewBtns">
                        @if(empty($arr_base['promotion_otherinfo_data']) === false)
                            @php $i = 1; @endphp
                            @foreach($arr_base['promotion_otherinfo_data'] as $row)
                                @if($row['ProfIdx'] == '51060') {{-- 김윤태 --}}
                                    <a href="javascript:fnMobile('https:{{front_app_url('/Player/getMobileSample/', 'www')}}?m={{sess_data('mem_idx')}}&id={{sess_data('mem_id')}}&p={{$row['OtherData1']}}&u={{$row['wUnitIdx']}}&q=HD', '{{config_item('starplayer_license')}}');">{{$i}}강</a>
                                    @php $i += 1; @endphp
                                @endif
                            @endforeach
                        @endif
                    </div>
                </li>                   
            </ul>
        </div>
    </div>

    <div class="evtCtnsBox">
        <img src="https://static.willbes.net/public/images/promotion/2020/07/1626m_04.jpg" alt="coming soon" >
    </div> 

</div>

<!-- End Container -->

<script src="/public/vendor/starplayer/js/starplayer_app.js"></script>

@stop