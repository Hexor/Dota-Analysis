@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row page-title-row">
            <div class="col-md-6">
                <a  style="font-size:24px; color: #000000" href="{{ url('/')
                }}">
                    Heroes
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
                        <th>别名</th>
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
        $(function() {
            $("#qrs-table").DataTable( {
                "order": [[ 1, "desc" ]],
                "pageLength": 150,
                processing: true,
                serverSide: true,
                ajax: "/api/heroes",
                columns: [
                    {data: 'avatar', name: 'avatar', orderable: false,
                        searchable: false},
                    {data: 'fullname', name: 'fullname'},
                    {data: 'alias_name', name: 'alias_name'},
                ],
                columnDefs: [ {
                    "targets": 0,
                    "data": "avatar",
                    "render": function ( data, type, full, meta ) {
                        return '<a target="_blank" href="/">  <img ' +
                            'src="'+data+'" width="59"></a>';
                    }
                } ],
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