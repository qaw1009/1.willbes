<form class="form-horizontal form-label-left" id="ajax_myclass_list_form" name="ajax_myclass_list_form" method="POST" onsubmit="return false;" novalidate>
    {!! csrf_field() !!}
    <input type="hidden" id="supporters_idx" name="supporters_idx" value="{{ element('supporters_idx', $arr_input) }}">

    <ul class="wtgMember" id="ajax_myclass_table"></ul>
    <div class="Paging_myclass add-myclass-paging"></div>
</form>

<script type="text/javascript">
    var $ajax_myclass_list_form = $('#ajax_myclass_list_form');
    $(document).ready(function(){
        MyclassCallAjax(1);
    });

    function MyclassCallAjax(num) {
        MyclassListAjax(num);    //list data load
        MyclassAjaxPaging(num);  //page data load
        MyclassApplyPagination();
    }

    //list ajax
    function MyclassListAjax(page) {
        var add_table = '';
        var _url = '{{ front_url("/supporters/myClass/listAjax") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_myclass_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'supporters_idx' : $('#supporters_idx').val(),
            'page' : page
        };
        sendAjax(_url, data, function(ret) {
            var rownum = ret.paging.rownum;

            if (ret.ret_data.length < 1) {
                add_table += '<li>등록된 글이 없습니다.</li>';
            } else {
                $.each(ret.ret_data, function (i, item) {
                    add_table += '<li>';
                    add_table += '<div class="wtgUser">';
                    add_table += '<div>';
                    add_table += '<div class="mask"></div>';
                    if (item.AttachFileName == '' || item.AttachFileName == null) {
                        add_table += '<img src="">';
                    } else {
                        add_table += '<img src="' + item.AttachFilePath + item.AttachFileName + '">';
                    }
                    add_table += '</div>';
                    add_table += '<p><strong>' + item.MemName + '</strong>님</p>';
                    add_table += '<div class="userMsg">' + item.Content.substring(0,40) + '</div>';
                    if (item.IsPublic == 'N' && item.MemIdx != '{{ sess_data('mem_idx') }}') {
                        add_table += '<a href="javascript:alert(\'비공개 글입니다\');">소개보기</a>';
                    } else {
                        add_table += '<a href="javascript:myclass_show(\''+ item.SmcIdx +'\');">소개보기</a>';
                    }
                    add_table += '</div>';
                    add_table += '</li>';
                    rownum = rownum - 1;
                });
            }
            $('#ajax_myclass_table').html(add_table);
        }, showError, false, 'GET');
    }

    //page ajax
    function MyclassAjaxPaging(page)
    {
        var _url = '{{ front_url("/supporters/myClass/ajaxPaging") }}';
        var data = {
            '{{ csrf_token_name() }}' : $ajax_myclass_list_form.find('input[name="{{ csrf_token_name() }}"]').val(),
            'supporters_idx' : $('#supporters_idx').val(),
            'page' : page
        };
        sendAjax(_url, data, function(ret) {
            $('.add-myclass-paging').html(ret.paging.pagination);
        }, showError, false, 'GET');
    }

    //href 리턴 false, list,page ajax 호출
    function MyclassApplyPagination() {
        $("div.Paging_myclass a").on("click", function() {
            var link, temp_params, params, num;

            link = $(this).attr('href');
            if (link != undefined) {
                temp_params = link.split('?');
                params = temp_params[1].split('=');
                num = params[1];
            }

            if (num != undefined) {
                MyclassCallAjax(num);
            } else {
                MyclassCallAjax(1);
            }
            return false;
        });
    }

    function myclass_show(obj)
    {
        var ele_id = 'supporters_myclass_show';
        var data = {
            'smc_idx' : obj
        };
        sendAjax('{{ front_url('/supporters/myClass/show') }}', data, function(ret) {
            $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
            $('#myclass_show').bPopup();
        }, showAlertError, false, 'GET', 'html');
    }
</script>