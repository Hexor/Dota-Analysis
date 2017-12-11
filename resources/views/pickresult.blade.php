@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <a  style="font-size:24px; color: #000000" href="{{ url('/')
                }}">
                    这些是建议您选择的英雄
                </a>
            </div>

            <div class="col-md-6 text-right">

            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-12">


                <table id="qrs-table" class="table table-striped
                table-bordered">
                    <thead>
                    <tr>
                        <th>头像</th>
                        <th>英雄名称</th>
                        <th>综合得分</th>

                        <th>克制敌方英雄</th>
                        <th>配合友方英雄</th>
                        <th>前期/对线 能力</th>
                        <th>Carry</th>
                        <th>控场</th>
                        <th>先手</th>
                        <th>Gank</th>
                        <th>辅助</th>
                        <th>肉盾</th>

                        {{--<th data-sortable="false">操作</th>--}}
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        var clipboard = new Clipboard('.clibtn');

        clipboard.on('success', function(e) {
            alert('选人命令已经被复制\n'+e.text+'\n请在 Dota2 控制台中输入运行')
            e.clearSelection();
        });

        clipboard.on('error', function(e) {
            alert('命令复制失败,请重试')
        });



        $(function() {
            var data =
                [
                        @foreach ($heroes as $article)
                    {
                        "avatar": ["{{ $article->avatar }}","{{$article->internal_name}}"],
                        "internal_name": "{{$article->internal_name}}",
                        "name": "{{ $article->fullname }}",
                        "total_point": "{{ $article->total_point }}",
                        "counter": "{{ $article->detail['counter'] }}",
                        "cooporate": "{{ $article->detail['cooporate'] }}",
                        "early_battle": "{{ $article->detail['early_battle'] }}",
                        "carry": "{{ $article->detail['carry'] }}",
                        "disabler": "{{ $article->detail['disabler'] }}",
                        "initiator": "{{ $article->detail['initiator'] }}",
                        "gank": "{{ $article->detail['gank'] }}",
                        "support": "{{ $article->detail['support'] }}",
                        "tank": "{{ $article->detail['tank'] }}"
                    },
                    @endforeach
                ];


            $("#qrs-table").DataTable( {
                "order": [[ 2, "desc" ]],
                data: data,
                "pageLength": 150,
                columns: [
                    { data: 'avatar' },
                    { data: 'name' },
                    { data: 'total_point' },
                    { data: 'counter' },
                    { data: 'cooporate' },
                    { data: 'early_battle' },
                    { data: 'carry' },
                    { data: 'disabler' },
                    { data: 'initiator' },
                    { data: 'gank' },
                    { data: 'support' },
                    { data: 'tank'}
                ],
                columnDefs: [ {
                    "targets": 0,
                    "data": "avatar",
                    "render": function ( data, type, full, meta ) {
                        return '<a class="clibtn" target="_blank" data-clipboard-text="dota_select_hero '+data[1]+'">  <img ' +
                            'src="'+data[0]+'" width="59"></a> ';
                    }
                }],
                language: {
                    searchPlaceholder: "任何英雄",
                    "sProcessing": "处理中...",
                    "sLengthMenu": "显示 _MENU_ 项结果",
                    "sZeroRecords": "没有匹配结果",
                    "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                    "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                    "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                    "sInfoPostFix": "",
                    "sSearch": "搜索:",
                    "sUrl": "",
                    "sEmptyTable": "表中数据为空",
                    "sLoadingRecords": "载入中...",
                    "sInfoThousands": ",",
                    "oPaginate": {
                        "sFirst": "首页",
                        "sPrevious": "上页",
                        "sNext": "下页",
                        "sLast": "末页"
                    },
                    "oAria": {
                        "sSortAscending": ": 以升序排列此列",
                        "sSortDescending": ": 以降序排列此列"
                    }
                }
            });
        });
    </script>
@stop