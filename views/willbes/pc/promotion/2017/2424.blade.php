@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            width:100% !important;
            min-width:1120px !important;
            max-width:2000px !important;
            margin:0 auto;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;            
        }
        .evtContent span {vertical-align:top}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px;}
        .evtCtnsBox .wrap {width:1120px; margin:0 auto; position:relative}
        /*.evtCtnsBox .wrap a:hover {border:1px solid #000}*/

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/11/2424_top_bg.jpg) no-repeat center top;}
        
        .evt01 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2424_01_bg.jpg) no-repeat center top;}

        .evt02 {background:#dbf1e5}

        .evt03 {background:url(https://static.willbes.net/public/images/promotion/2021/11/2424_03_bg.jpg) no-repeat center top;}

        .evt03 .entry {width:940px; position:absolute; top:1335px; left:50%; margin-left:-470px; z-index: 10;}
        .evt03 .entry table {width:500px; border-top:1px solid #c8c8c8; border-right:1px solid #c8c8c8}
        .evt03 .entry th,
        .evt03 .entry td {padding:17px 15px; font-size:18px; border-bottom:1px solid #c8c8c8; border-left:1px solid #c8c8c8; line-height:1.2}
        .evt03 .entry th {background:#58bb85; color:#fff; font-weight:bold}
        .evt03 .entry td {text-align:left; color:#676767}
        .evt03 .entry input,
        .evt03 .entry select {width:100%}

        .evt04 {background:#dbf1e5}

        .evt05 {width:1120px; margin:0 auto;}

        .evt06 {background:#fdfdfd}
    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_top.jpg" alt="퀵 서머리 한정판매"/>
                <a href="http://naver.me/xlW17yJK" target="_blank" title="위치보기" style="position: absolute; left: 33.48%; top: 41.02%; width: 33.21%; height: 5.41%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt01">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_01.jpg" alt="퀵 서머리 혜택"/>
        </div>

        <div class="evtCtnsBox evt02">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_02.jpg" alt="퀵 서머리 특징"/>
        </div>

        <div class="evtCtnsBox evt03 p_re">            
            <div class="entry">
                <table>
                    <col width="180"/>
                    <col  />
                    <tbody>
                        <tr>
                            <th>이름</th>
                            <td>홍길동</td>
                        </tr>
                        <tr>
                            <th>윌비스 ID</th>
                            <td>willbes</td>
                        </tr>
                        <tr>
                            <th>연락처</th>
                            <td>010-1234-5678</td>
                        </tr>
                        <tr>
                            <th>출신학교</th>
                            <td><input type="text" id="" name="" placeholder="선택입력"/></td>
                        </tr>
                        <tr>
                            <th>출신학과</th>
                            <td><input type="text" id="" name="" placeholder="선택입력"/></td>
                        </tr>
                        <tr>
                            <th>응시횟수</th>
                            <td><input type="text" id="" name="" placeholder="선택입력"></td>
                        <tr>
                            <th>
                                희망응시지역
                                <div class="tx14">(* 필수입력)</div>
                            </th>
                            <td>
                                <select id="" name="" title="응시지역">
                                    <option value="">서울</option>
                                    <option value="">부산</option>
                                    <option value="">대전</option>
                                    <option value="">울산</option>
                                    <option value="">대구</option>
                                    <option value="">광주</option>
                                    <option value="">경기</option> 
                                    <option value="">인천</option>
                                    <option value="">강원</option>
                                    <option value="">충북</option>
                                    <option value="">충남</option>
                                    <option value="">경북</option>
                                    <option value="">경남</option>
                                    <option value="">전북</option>
                                    <option value="">전남</option>  
                                    <option value="">제주</option>
                                    <option value="">세종</option>                                  
                                </select>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_03.jpg" alt="퀵 서머리 특징"/>
                <a href="#none" title="신청" style="position: absolute; left: 22.68%; top: 87.05%; width: 25.98%; height: 3.96%; z-index: 2;"></a>
                <a href="#none" title="리셋" style="position: absolute; left: 51.25%; top: 87.05%; width: 25.98%; height: 3.96%; z-index: 2;"></a>
            </div>
        </div>

        <div class="evtCtnsBox evt04">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_04.jpg" alt="퀵 서머리 특징"/>
        </div>

        <div class="evtCtnsBox evt05">
            <div class="wrap">
                <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_05.jpg" alt="유의사항"/>  
                <a href="javascript:void(0);" onclick="copyTxt();"  title="주소복사하기" style="position: absolute; left: 68.93%; top: 45.4%; width: 25.71%; height: 23.12%; z-index: 2;"></a>
                <a href="@if($file_yn[0] == 'Y') {{ front_url($file_link[0]) }} @else {{ $file_link[0] }} @endif" title="이미지 다운받기" style="position: absolute; left: 68.93%; top: 69.08%; width: 25.71%; height: 23.12%; z-index: 2;"></a>               
            </div>
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.promotion.show_comment_list_url_partial',array('login_url'=>app_url('/member/login/?rtnUrl=' . rawurlencode('//' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']), 'www')))
                @endif
        </div>

        <div class="evtCtnsBox evt06">
            <img src="https://static.willbes.net/public/images/promotion/2021/11/2424_06.jpg" alt="퀵 서머리 특징"/>
        </div>
        
    </div>
    <!-- End Container -->

    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">  
        function directPayment(){
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var $regi_form_register = $('#regi_form_register');
            addCartNDirectPay($regi_form_register, 'Y', 'Y', 'on');
        }
    </script>

    {{-- 프로모션용 스크립트 include --}}
    @include('willbes.pc.promotion.promotion_script')


@stop