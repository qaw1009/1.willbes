<div class="evtCtnsBox evt03">
    <div class="ssam-Lnb">
        <div class="lnb-List tabs">
            @if (empty($data) === false)
                @foreach($data as $subject_name => $arr_row)
                    <div class="ssam-lnb-List-Tit {{($loop->first === true ? 'hover' : '')}}">
                        <a href="javascript:void(0);">{{$subject_name}}</a>
                    </div>
                    <div class="lnb-List-Depth" style="display: {{($loop->first == true ? 'block' : 'none')}}">
                        <dl>
                            @foreach($arr_row as $key => $row)
                                <dt>
                                    <a href="javascript:void(0);" class="btn-hotclip-prof {{($loop->parent->index == 1 && $loop->depth == 2 && $loop->index == 1 ? 'active' : '')}}"
                                       data-prof-id="{{$row['PhcIdx']}}">{{$row['SubjectName']}} <strong>{{$row['ProfNickName']}}</strong>
                                    </a>
                                </dt>
                            @endforeach
                        </dl>
                    </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="tabCts">
        @if (empty($data) === false)
            @foreach($data as $subject_name => $arr_row)
                @foreach($arr_row as $key => $row)
                    <div id="tab{{$row['PhcIdx']}}" class="profBox" style="display: {{($loop->parent->index == 1 && $loop->depth == 2 && $loop->index == 1 ? 'block' : 'none')}}">
                        <div class="p_re">
                            <img src="{{$row['ProfBgImagePath'].$row['ProfBgImageName']}}" alt="{{$row['SubjectName']}} {{$row['ProfNickName']}}">
                            <div class="btnBox">
                                <div class="prof-top-btn">
                                    @if($row['CurriculumBtnIsUse'] == 'Y')
                                        <a href="javascript:void(0);" onclick="openWin('sec-prof-layer'); fnOpenProfCurriculum('{{$row['ProfIdx']}}');">커리큘럼</a>
                                    @endif
                                    @if($row['ProfBtnIsUse'] == 'Y')
                                        <a href="{{front_url("/professor/show/prof-idx/{$row['ProfIdx']}?cate_code={$row['CateCode']}&subject_idx={$row['SubjectIdx']}")}}" target="_blank">교수님 홈</a>
                                    @endif
                                </div>
                                @if(empty($row['thumbnail_data']) === false)
                                    <div class="prof-clip-btn">
                                        @php
                                            $thumbnail_data = json_decode($row['thumbnail_data'],true);
                                            foreach ($thumbnail_data as $thumbnail_row) {
                                                $html = '';
                                                if ($thumbnail_row['LinkType'] == 'layer') {
                                                    $html .= '<a onclick="fnOpenYoutube(\''.$thumbnail_row['LinkUrl'].'\')">';
                                                } elseif ($thumbnail_row['LinkType'] == 'self') {
                                                    $html .= '<a href="'.$thumbnail_row['LinkUrl'].'">';
                                                } elseif ($thumbnail_row['LinkType'] == 'blank') {
                                                    $html .= '<a href="'.$thumbnail_row['LinkUrl'].'" target="_balnk">';
                                                } else {
                                                    $html .= '<a href="javascript:void(0);">';
                                                }
                                                $html .= '<img src="'.$thumbnail_row['ThumbnailPath'].$thumbnail_row['ThumbnailFileName'].'" title="유튜브">';
                                                $html .= '</a>';
                                                echo $html;
                                            }
                                        @endphp
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="pkgBuy">
                            @if(empty($row['product_info_1']) === false)
                                @php
                                    $product_data = json_decode($row['product_info_1'],true);
                                    $html = '';
                                    foreach ($product_data as $key => $product_row) {
                                        $html .= '<div>';
                                            $html .= '<a href="javascript:void(0);" class="btn-add-product"
                                                data-prof-name="'.$product_row['ProfNickName'].'"
                                                data-learn-pattern="'.$product_row['LearnPatternCcd'].'"
                                                data-prod-code="'.$product_row['ProdCode'].'"
                                                data-prod-name="'.$product_row['ProdName'].'">';
                                            $html .= '연간패키지'.$product_row['ProdItemCcdName'];
                                            $html .= '<strong>'.$product_row['ProductTitle'].'</strong>';
                                            $html .= '</a>';
                                        $html .= '</div>';
                                    }
                                    echo $html;
                                @endphp
                            @endif
                            @if(empty($row['product_info_2']) === false)
                                @php
                                    $product_data = json_decode($row['product_info_2'],true);
                                    $html = '';
                                    foreach ($product_data as $key => $product_row) {
                                        $html .= '<div>';
                                            $html .= '<a href="javascript:void(0);" class="btn-add-product"
                                                data-prof-name="'.$product_row['ProfNickName'].'"
                                                data-learn-pattern="'.$product_row['LearnPatternCcd'].'"
                                                data-prod-code="'.$product_row['ProdCode'].'"
                                                data-prod-name="'.$product_row['ProdName'].'">';
                                            $html .= '연간패키지'.$product_row['ProdItemCcdName'];
                                            $html .= '<strong>'.$product_row['ProductTitle'].'</strong>';
                                            $html .= '</a>';
                                        $html .= '</div>';
                                    }
                                    echo $html;
                                @endphp
                            @endif
                        </div>
                    </div>
                @endforeach
            @endforeach
        @endif

        <div class="buyWrap">
            <h4 class="NSK-Black">· 2023학년도 대비  연간패키지 신청내역</h4>
            <div class="basket">
                <div class="lecbox" id="order_box_off">
                    <h5><strong>학원직강 연간패키지</strong> 신청내역</h5>
                    <ul></ul>
                    <div>
                        <p><strong class="prod-cnt">-과목</strong> 결제금액 <strong class="sale-price">-</strong>원</p>
                        <p>총 <span class="expt-disc">-할인</span></p>
                        <p><a href="javascript:void(0);" onclick="javascript:directPay('off'); return false;">결제하기</a></p>
                    </div>
                </div>
                <div class="lecbox" id="order_box_online">
                    <h5><strong>동영상강의 연간패키지</strong> 신청내역</h5>
                    <ul></ul>
                    <div>
                        <p><strong class="prod-cnt">-과목</strong> 결제금액 <strong class="sale-price">-</strong>원</p>
                        <p>총 <span class="expt-disc">-할인</span></p>
                        <p><a href="javascript:void(0);" onclick="javascript:directPay('online'); return false;">결제하기</a></p>
                    </div>
                </div>
            </div>
            <div class="tx-red tx16 strong mb20" style="line-height: initial">
                * 학원직강과 동영상강의를 각각 신청하는 경우에는 할인 적용 및 동시 결제가 불가합니다.
                <br>* 학원직강과 동영상강의를 각각 신청하고자 하는 경우, 할인 적용을 위해서는 한가지 방법으로 결제하고, 추후<br><span class="ml10">1:1상담 게시판을 통하여 변경 신청해 주시기 바랍니다.</span>
            </div>

            <div class="checkWrap"><input type="checkbox" id="is_chk" name="is_chk" value="Y"> <label for="is_chk">페이지 하단의 상품 관련 유의사항을 모두 확인하였고, 이에 동의합니다.</label></div>
        </div>
    </div>
</div>

<form name="exptpay_form_off" id="exptpay_form_off">
    {!! csrf_field() !!}
    @forelse($params['off_disc_code'] as $val)
        <input type="hidden" name="disc_idx[]" value="{{$val}}">
    @empty
    @endforelse
</form>
<form name="exptpay_form_online" id="exptpay_form_online">
    {!! csrf_field() !!}
    @forelse($params['online_disc_code'] as $val)
        <input type="hidden" name="disc_idx[]" value="{{$val}}">
    @empty
    @endforelse
</form>
<div id="order_div_off" style="display: none"></div>
<div id="order_div_online" style="display: none"></div>

{{--교수 커리큘럼 팝업 --}}
<div id="curriculum_box" class="willbes-Layer-CurriBox"></div>

{{-- layer 수강후기 --}}
<div id="ProfReply" class="willbes-Layer-ProfReply"></div>

{{--교수 youtube 팝업 --}}
<div id="youtube" class="willbes-Layer-youtube">
    <div class="popupWrap">
        <a class="closeBtn" href="javascript:void(0);" onclick="fnCloseYoutube()">
            <img src="{{ img_url('prof/close.png') }}">
        </a>
        <iframe src="" id="youtube_frame" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>
<div id="sec-prof-layer" class="willbes-Layer-Black"></div>

<script type="text/javascript">
    $(document).ready(function() {
        $(".btn-hotclip-prof").on('click', function () {
            var target = $(this).data("prof-id");
            $(".profBox").css('display','none');
            $("#tab"+target).css('display','block');

            $('.btn-hotclip-prof').removeClass('active')
            $(this).addClass('active');
        });

        $("div.ssam-lnb-List-Tit").on('click', function () {
            $('div.ssam-lnb-List-Tit').removeClass('hover');
            if ($(this).next().is(':visible')) {
                $(this).next().slideUp('normal');
                $(this).removeClass('hover');

            } else {
                $('div.lnb-List-Depth').slideUp('normal');
                $(this).next().slideDown('normal');
                $(this).addClass('hover');
            }
        });

        /* 상품 버튼 클릭 */
        $(".btn-add-product").on('click', function () {
            var this_learn_pattern = ($(this).data("learn-pattern") == '615007') ? 'off' : 'online';
            var this_prod_code = $(this).data("prod-code");
            var this_prof_name = $(this).data("prof-name");
            var this_prod_name = $(this).data("prod-name");
            var param_check = $("#exptpay_form_"+this_learn_pattern).find('#_exptpay_'+this_prod_code).val();

            if (typeof param_check === 'undefined') {
                $("#exptpay_form_"+this_learn_pattern).append('<input type="hidden" name="prod_code[]" id="_exptpay_' + this_prod_code + '" value="' + this_prod_code + '"/>');
                $("#order_div_"+this_learn_pattern).append('<input type="checkbox" name="y_pkg" id="_order_' + this_prod_code + '" value="' + this_prod_code + '" checked="checked"/>');
                var html = '<li>';
                html += '<strong>'+this_prof_name+'</strong> ';
                html += this_prod_name+' ';
                html += '<a href="javascript:void(0);" class="btn-order-delete" ';
                html += 'data-learn-pattern="'+this_learn_pattern+'" ';
                html += 'data-prod-code="'+this_prod_code+'"> ';
                html += '<img src="https://static.willbes.net/public/images/promotion/2021/12/btn_del.png" alt="삭제">';
                html += '</a>';
                html += '<div class="price target-price" id="_price_'+this_prod_code+'"></div>';
                html += '</li>';
                $("#order_box_"+this_learn_pattern+" > ul").append(html);

                getExptPayPrice(this_learn_pattern);
            }
        });

        // 선택 상품 삭제
        $("#order_box_off, #order_box_online").on('click', '.btn-order-delete', function () {
            var this_learn_pattern = $(this).data("learn-pattern");
            var this_prod_code = $(this).data("prod-code");
            $("#exptpay_form_"+this_learn_pattern).find('#_exptpay_'+this_prod_code).remove();
            $("#order_div_"+this_learn_pattern).find('#_order_'+this_prod_code).remove();
            $(this).parent('li').remove();

            getExptPayPrice(this_learn_pattern)
        });
    });

    // 할인율 정보 조회
    function getExptPayPrice(learn_pattern) {
        var _url = (learn_pattern == 'off') ? "{{front_url('/pass/cart/getExptPayPrice')}}" : "{{front_url('/cart/getExptPayPrice')}}";
        var data = $("#exptpay_form_"+learn_pattern).serialize();
        var prod_cnt = $("#exptpay_form_"+learn_pattern).find("input[name='prod_code[]']").length;

        if (prod_cnt > 0) {
            sendAjax(_url, data, function(ret) {
                if (ret.ret_cd) {
                    var real_sale_price = ret.ret_data.real_sale_price;   //총판매금액
                    var expt_disc_rate = ret.ret_data.expt_disc_rate;     //예상할인율
                    var expt_disc_price = ret.ret_data.expt_disc_price;   //예상할인금액
                    var expt_pay_price = ret.ret_data.expt_pay_price;     //예상결제금액

                    var target_prod_html = '';
                    if (typeof ret.ret_data.data !== 'undefined') {
                        $.each(ret.ret_data.data, function (key,row) {
                            target_prod_html = parseInt(row.real_sale_price).toLocaleString()+'원 → <strong>'+parseInt(row.expt_pay_price).toLocaleString()+'원</strong> <span>('+parseInt(row.expt_disc_price).toLocaleString()+'원 할인)</span>';
                            $("#_price_"+key).html(target_prod_html);
                        });
                    }
                    $("#order_box_"+learn_pattern).find('.expt-disc').text(parseInt(expt_disc_price).toLocaleString()+'할인');
                    $("#order_box_"+learn_pattern).find('.prod-cnt').text(prod_cnt+'과목');
                    $("#order_box_"+learn_pattern).find('.sale-price').text(parseInt(expt_pay_price).toLocaleString());
                }
            }, showError, false, 'POST');
        } else {
            $("#order_box_"+learn_pattern).find('.expt-disc').text('-할인');
            $("#order_box_"+learn_pattern).find('.prod-cnt').text('-과목');
            $("#order_box_"+learn_pattern).find('.sale-price').text('-');
        }
    }

    // 결제하기
    function directPay(_learn_pattern)
    {
        var is_login = '{{sess_data('is_login')}}';
        if (is_login != true) {
            alert('로그인 후 이용해 주세요.');
            return;
        }

        var prod_cnt = $("#exptpay_form_"+_learn_pattern).find("input[name='prod_code[]']").length;
        var cart_type = '', learn_pattern = '', is_direct_pay = '', cart_onoff_type = '';
        if (_learn_pattern == 'off') {
            cart_type = 'off_lecture';
            learn_pattern = 'off_pack_lecture';
            is_direct_pay = 'Y';
            cart_onoff_type = 'off';
        } else {
            cart_type = 'on_lecture'
            learn_pattern = 'adminpack_lecture'
            is_direct_pay = 'Y'
            cart_onoff_type = '';
        }

        if (prod_cnt <= 0) {
            alert('결제할 상품을 선택해주세요.');
            return;
        }

        if ($("#is_chk").is(':checked') === false) {
            alert('상품 관련 유의사항 안내에 동의하셔야 합니다.');
            return;
        }

        //결제하기
        goCartNDirectPay('order_div_'+_learn_pattern, 'y_pkg', cart_type, learn_pattern, is_direct_pay, cart_onoff_type);
    }

    function fnOpenProfCurriculum(prof_idx) {
        var ele_id = 'curriculum_box';
        var _url = '{{ front_url('/professor/layerCurriculum/prof-idx/') }}'+prof_idx;
        var data = {
            'ele_id' : ele_id,
            'close_id' : 'sec-prof-layer'
        }
        sendAjax(_url, data, function(ret) {
            console.log(ret);
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
        }, showAlertError, false, 'GET', 'html');
    }

    function fnOpenYoutube(url) {
        var youtube_url = url + '?' + 'enablejsapi=1&version=3&playerapiid=ytplayer';
        $("#youtube_frame").attr('src',youtube_url);
        openWin('sec-prof-layer');
        openWin('youtube');
    }
    function fnCloseYoutube() {
        $('#youtube_frame')[0].contentWindow.postMessage('{"event":"command","func":"' + 'stopVideo' + '","args":""}', '*');
        $("#youtube_frame").attr('src',"");
        closeWin('sec-prof-layer')
        closeWin('youtube');
    }
</script>

{{-- 프로모션용 스크립트 include --}}
@include('willbes.pc.promotion.promotion_script')