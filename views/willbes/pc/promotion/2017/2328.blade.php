@extends('willbes.pc.layouts.master')

@section('content')
    @include('willbes.pc.layouts.partial.site_menu')
    <!-- content -->
    <style type="text/css">
        .evtContent {
            position:relative;
            width:100% !important;
            min-width:1120px !important;
            margin-top:20px !important;
            padding:0 !important;
            background:#fff;
            color:#3a3a3a;
        }
        .evtContent span {vertical-align:middle}
        .evtCtnsBox {width:100%; text-align:center; min-width:1120px; position:relative;}

        /************************************************************/
  
        .eventTop {background:url(https://static.willbes.net/public/images/promotion/2021/08/2323_top_bg.jpg) no-repeat center top;}
        
        .event01 {background:#17a2fd; padding-bottom:100px}
        .event01 .wrap {width:1120px; margin:0 auto; display:flex; justify-content: space-between;}
        .event01 .wrap a {display:block; background:#050519; color:#fff; font-size:30px; padding:20px 30px; width:500px; margin:0 auto; border-radius:40px}
        .event01 .wrap a span {color:#31ffce; vertical-align:top}
        .event01 .wrap a:hover {background:#fe4e2c; color:#000}

        .event02 {background:#a2999a; padding:100px 0; line-height:1.4; font-size:14px}
        .event02 .title {font-size:60px; color:#fff;}
        .event02 .title p {font-size:40px; color:#430303}
        .event02 input {padding:10px 20px ; width:100%; border:1px solid #ccc;}
        .event02 textarea {width:100%; padding:20px; border:1px solid #ccc; color:#666}

        .evt_table table{width:100%;border-top:1px solid #ccc; border-left:1px solid #ccc; background:#fff; margin-top:100px}
        .evt_table table tr {border-bottom:1px solid #ccc}
        .evt_table table th,
        .evt_table table td {padding:5px 10px; font-size:16px; color:#666; line-height:1.5; border-right:1px solid #ccc; text-align:center}
        .evt_table table th {background:#4c4344; color:#fff; }
        .evt_table table tbody td:nth-child(2) {text-align:left;}

        .event02 .btns {margin-top:40px}
        .event02 .btns a {display:inline-block; width:200px; text-align:center; height:50px; line-height:50px; font-size:20px; color:#fff; background:#440203; margin:0 10px;}
        .event02 .btns a:last-child {background:#5f524c}
        .event02 .btns a:hover {background:#000}
        .evt_table .Paging li a {color:#fff; font-size:14px}
        .evt_table .Paging li a.on {color:#440203}


    </style>

    <div class="evtContent NSK" id="evtContainer">
        <div class="evtCtnsBox eventTop">
        	<img src="https://static.willbes.net/public/images/promotion/2021/08/2323_top.jpg" alt="합격축하 이벤트"/>
        </div>

        <div class="evtCtnsBox event01">
        	<div class="wrap NSK-Black">
                <a href="https://ssam.willbes.net/lecture/show/cate/3137/pattern/only/prod-code/184440" target="_blank"><span>도장깨기 특강</span> 신청 바로가기 ></a>
                <a href="javascript:void(0);" class="btn-study"><span>수강후기 작성</span> 바로가기 ></a>
            </div>
        </div>
        <div id="WrapReply"></div>

        <div class="evtCtnsBox event02">
            <div class="widthAuto">
                <div class="title NSK-Black">
                    전공음악 다이애나
                    <p>개년 기출문제 풀이 "도장깨기 특강" (2019~2021학년도)</p>
                </div>
                <div class="mt50">
                    <input type="text" id="" name="" maxlength="50" placeholder="제목을 입력하세요."/>
                </div>
                <div class="mt10">
                    <textarea id="etc_data" name="etc_data" cols="30" rows="5" maxlength="250" title="댓글" placeholder="수강후기를 남겨 주세요~~!" onclick="loginCheck();"></textarea>
                </div>
                <div class="btns">
                    <a href="#none">후기 등록</a>
                    <a href="#none">초기화</a>
                </div>

                <div class="evt_table">
                    <table border="0" cellspacing="2" cellpadding="2">
                        <col width="10%" />
                        <col  />
                        <col width="15%" />
                        <col width="15%" />
                        <col width="10%" />
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>      
                                <th>작성자</th>  
                                <th>등록일</th>  
                                <th>조회수</th>                       
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10</td>
                                <td><a href="#none">글제목 노출됩니다.</a></td>   
                                <td>will***</td> 
                                <td>2021-08-15</td> 
                                <td>3</td>                         
                            </tr>
                            <tr>
                                <td>9</td>
                                <td><a href="#none">글제목 노출됩니다.</a></td>    
                                <td>will***</td> 
                                <td>2021-08-15</td> 
                                <td>3</td>                         
                            </tr>
                            <tr>
                                <td>8</td>
                                <td><a href="#none">글제목 노출됩니다.</a></td>    
                                <td>will***</td> 
                                <td>2021-08-15</td> 
                                <td>3</td>                         
                            </tr>
                            <tr>
                                <td>7</td>
                                <td><a href="#none">글제목 노출됩니다.</a></td>    
                                <td>will***</td> 
                                <td>2021-08-15</td> 
                                <td>3</td>                         
                            </tr>
                            <tr>
                                <td>6</td>
                                <td><a href="#none">글제목 노출됩니다.</a></td>    
                                <td>will***</td> 
                                <td>2021-08-15</td> 
                                <td>3</td>                         
                            </tr>
                            <tr>
                                <td>5</td>
                                <td><a href="#none">글제목 노출됩니다.</a></td>    
                                <td>will***</td> 
                                <td>2021-08-15</td> 
                                <td>3</td>                         
                            </tr>
                            <tr>
                                <td>4</td>
                                <td><a href="#none">글제목 노출됩니다.</a></td>    
                                <td>will***</td> 
                                <td>2021-08-15</td> 
                                <td>3</td>                         
                            </tr>
                            <tr>
                                <td>3</td>
                                <td><a href="#none">글제목 노출됩니다.</a></td>    
                                <td>will***</td> 
                                <td>2021-08-15</td> 
                                <td>3</td>                         
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="#none">글제목 노출됩니다.</a></td>    
                                <td>will***</td> 
                                <td>2021-08-15</td> 
                                <td>3</td>                         
                            </tr>
                            <tr>
                                <td>1</td>
                                <td><a href="#none">글제목 노출됩니다.</a></td>    
                                <td>will***</td> 
                                <td>2021-08-15</td> 
                                <td>3</td>                         
                            </tr>
                        </tbody>
                    </table>

                    <div class="Paging">
                        <ul>
                            <li class="Prev"><a href="#none"><img src="/public/img/willbes/paging/paging_prev.png"> </a></li>
                            <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                            <li><a href="#none">2</a><span class="row-line">|</span></li>
                            <li><a href="#none">3</a><span class="row-line">|</span></li>
                            <li><a href="#none">4</a><span class="row-line">|</span></li>
                            <li><a href="#none">5</a><span class="row-line">|</span></li>
                            <li><a href="#none">6</a><span class="row-line">|</span></li>
                            <li><a href="#none">7</a><span class="row-line">|</span></li>
                            <li><a href="#none">8</a><span class="row-line">|</span></li>
                            <li><a href="#none">9</a><span class="row-line">|</span></li>
                            <li><a href="#none">10</a></li>
                            <li class="Next"><a href="#none"><img src="/public/img/willbes/paging/paging_next.png"> </a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- End Container -->

    <script type="text/javascript">
        $('.btn-study').on('click', function() {
            {!! login_check_inner_script('로그인 후 이용하여 주십시오.','Y') !!}

            var order_cnt = {{ $arr_base['order_count'] or 0 }};
            if(order_cnt === 0){ alert('강의 신청후 수강후기 작성이 가능합니다.'); return; }

            var ele_id = 'WrapReply';
            var data = {
                'ele_id' : ele_id,
                'show_onoff' : 'on',
                'site_code' : '{{ $__cfg['SiteCode'] }}',
                'cate_code' : '{{ $__cfg['CateCode'] }}',
                'prod_code' : '{{ $arr_promotion_params['arr_prod_code'] }}',
                'subject_idx' : '{{ $arr_promotion_params['subject_idx'] }}',
                'subject_name' : encodeURIComponent('{{ $arr_promotion_params['subject_name'] }}'),
                'prof_idx' : '{{ $arr_promotion_params['prof_idx'] }}'
            };
            sendAjax('{{ front_url('/support/studyComment/') }}', data, function(ret) {
                $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                var targetOffset= $("#evtContainer").offset().top;
                $('html, body').animate({scrollTop: targetOffset}, 1000);
            }, showAlertError, false, 'GET', 'html');
        });
    </script>
@stop