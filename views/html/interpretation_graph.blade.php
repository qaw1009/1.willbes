<h5>- 실전모의고사 성적분석표 관리하는 메뉴입니다.</h5>

<div class="x_panel mt-10">
    <div class="x_content">
        <div class="col-md-11">
            <table id="list_sub_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>만점</th>
                    <td></td>
                    <th>응시인원</th>
                    <td></td>
                    <th>평균</th>
                    <td></td>
                    <th>최고득점</th>
                    <td></td>
                </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="x_content">
        <div class="col-md-4">
            <table id="list_ajax_table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>점수분포</th>
                    <th>인원</th>
                    <th>누계</th>
                    <th>백분율(%)</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-8">
            <div class="col-md-11 pt-15 board_gray">
                <h4 class="text-center"><strong>전체 응시자 점수분포표</strong></h4>
                <div id="spread_all" class="text-center"></div>
            </div>

            <div class="col-md-11 pt-15 mt-20 board_gray">
                <h4 class="text-center"><strong>상위10% 응시자 정답률(%)</strong></h4>
                <div id="answers_rank10" class="text-center"></div>
            </div>

            <div class="col-md-11 pt-15 mt-20 board_gray">
                <h4 class="text-center"><strong>상위25% 응시자 정답률(%)</strong></h4>
                <div id="answers_rank25" class="text-center"></div>
            </div>

            <div class="col-md-11 pt-15 mt-20 board_gray">
                <h4 class="text-center"><strong>전체 응시자 정답률(%)</strong></h4>
                <div id="answers_all" class="text-center"></div>
            </div>
        </div>
    </div>

</div>

<style>
    .board_gray { border:1px solid gray }
</style>

<script src="/public/vendor/Nwagon/Nwagon.js"></script>
<link rel="stylesheet" href="/public/vendor/Nwagon/Nwagon.css">
<script>
    var spread_all = {
        'legend': {
            names: ['~7.5', '~17.5', '~27.5', '~37.5', '~47.5', '~57.5', '~67.5', '~77.5', '~87.5', '~97.5', '100'],
            hrefs: []
        },
        'dataset': {
            title: '전체 응시자 정답률(%)',
            values: [[10,20,30,10,5],[10,0,0,0,0],[15,26,0,28,15],[27,28,29,28,10],[35,26,27,28,25],[27,18,29,28,24],[27,18,0,28,33],[15,26,0,28,15],[27,28,29,28,10],[35,26,27,28,25],[10,0,0,0,0]],
            colorset: ['#DC143C', '#FF8C00', "#30a1ce", '#DC143C', '#FF8C00'],
            fields: ['(명)','','','','']
        },
        'chartDiv': 'spread_all',
        'chartType': 'multi_column',
        'chartSize': { width: 1000, height: 300 },
        'minValue' : 0,
        'maxValue': 35,
        'increment': 5
    };
    Nwagon.chart(spread_all);

    var rank_names = [];
    for(var i=1;i<=40;i++){
        rank_names.push(i);
    }

    // 테스트용... rank_values 셋팅 필요함
    var rank_values = [];
    for(var j=0;j<rank_names.length;j++){
        rank_values[j] = [];
        rank_values[j][0] = rank_names[j] + Math.random() * 10;
    }

    var answers_rank10 = {
        'legend':{
            names: rank_names,
            hrefs: []
        },
        'dataset':{
            title:'상위10% 응시자 정답률(%)',
            values: rank_values,
            colorset: ['#30a1ce'],
            fields:['문항']
        },
        'chartDiv' : 'answers_rank10',
        'chartType' : 'line',
        'chartSize' : {width:1000, height:300},
        'minValue' : 0,
        'maxValue' : 100,
        'increment' : 20,
    };
    Nwagon.chart(answers_rank10);

    var answers_rank25 = {
        'legend':{
            names: rank_names,
            hrefs: []
        },
        'dataset':{
            title:'상위25% 응시자 정답률(%)',
            values: rank_values,
            colorset: ['#30a1ce'],
            fields:['문항']
        },
        'chartDiv' : 'answers_rank25',
        'chartType' : 'line',
        'chartSize' : {width:1000, height:300},
        'minValue' : 0,
        'maxValue' : 100,
        'increment' : 20,
    };
    Nwagon.chart(answers_rank25);

    var answers_all = {
        'legend': {
            names: ['1~5', '6~10', '11~15', '16~20', '21~25', '26~30', '31~35', '36~40'],
            hrefs: []
        },
        'dataset': {
            title: '전체 응시자 정답률(%)',
            values: [[15,26,37,48,88],[17,28,39,48,77],[15,26,37,48,66],[27,28,29,28,88],[35,46,57,68,55],[27,18,29,38,44],[27,18,29,38,33],[17,28,39,48,77]],
            colorset: ['#DC143C', '#FF8C00', "#30a1ce", '#DC143C', '#FF8C00'],
            fields: ['(문항)','','','','']
        },
        'chartDiv': 'answers_all',
        'chartType': 'multi_column',
        'chartSize': { width: 1000, height: 300 },
        'minValue' : 0,
        'maxValue': 100,
        'increment': 10
    };
    Nwagon.chart(answers_all);
</script>