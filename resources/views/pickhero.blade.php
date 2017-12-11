@extends('layouts.app')



@section('content')



    <div id="apps" class="container-fluid ">



        <div >
            <button
                    style="margin-bottom: 4px; margin-right: 4px;"
                    type="button"
                    {{--v-if="showCalculate"--}}
                    v-on:click="calculate"
                    class="btn btn-primary">
                Calculate
            </button>

            <button v-cloak
                    style="margin-bottom: 4px; margin-right: 4px;"
                    type="button"
                    v-for="(hero, index) in teammate"
                    v-on:click="unsetTeammate(index)"
                    class="btn btn-success">
                @{{hero.fullname}}
            </button>


            <buttona
                    v-cloak
                    style="margin-bottom: 4px; margin-right: 4px;"
                    type="button"
                    v-for="(hero, index) in enemy"
                    v-on:click="unsetEnemy(index)"
                    class="btn btn-danger">
                @{{hero.fullname}}
            </buttona>


        </div>









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
        <table class="table table-striped table-bordered" width="100%">
            <thead>
            <tr>
                <th>头像</th>
                <th>英雄名称</th>
                <th>别名</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody>
                @foreach($heroes as $hero)
                    <tr>
                        <td>
                            <a target="_blank" href="/">  <img src="{{$hero->avatar}}" width="59"></a>
                        </td>

                        <td>
                            {{$hero->fullname}}
                        </td>

                        <td>
                            {{$hero->alias_name}}
                        </td>

                        <td>
                            <button v-on:click="setTeammate('{{$hero->id}}', '{{$hero->fullname}}')">友</button>
                            <button v-on:click="setEnemy('{{$hero->id}}', '{{$hero->fullname}}')">敌</button>
                            <button
                                    style="margin-bottom: 4px; margin-right: 4px;"
                                    type="button"
                                    {{--v-if="showCalculate"--}}
                                    v-on:click="calculate"
                                    class="btn btn-primary">
                                Calculate
                            </button>


                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



@stop


@section('scripts')

    <script>

        var app = new Vue({
            el: '#apps',
            data: {
                message: 'Hello Vue!',
                showCalculate: false,

                teammate: [],

                enemy:[]

            },
            methods: {
                setTeammate: function (id, fullname) {
                    this.teammate.push({
                        id: id,
                        fullname: fullname
                    })

                    this.teammate = _.uniqBy(this.teammate, 'id')
                },

                setEnemy: function (id, fullname) {
                    this.enemy.push({
                        id: id,
                        fullname: fullname
                    })

                    this.enemy = _.uniqBy(this.enemy, 'id')
                },

                unsetTeammate: function (id) {
                    // `this` 在方法里指当前 Vue 实例
                    this.teammate.splice(id, 1)
                },

                unsetEnemy: function (id) {
                    // `this` 在方法里指当前 Vue 实例
                    this.enemy.splice(id, 1)
                },

                calculate: function() {

                    var temp_form = document.createElement("form");
                    temp_form.action = '/api/calculate';
                    //如需打开新窗口，form的target属性要设置为'_blank'
                    temp_form.target = "_blank";
                    temp_form.method = "post";
                    temp_form.style.display = "none";

                    for (var i=0;i<this.teammate.length;i++)
                    {
                        var opt1 = document.createElement("textarea");
                        opt1.name = 'teammate[]'

                        opt1.value = this.teammate[i].id
                        temp_form.appendChild(opt1);
                    }

                    for (var i=0;i<this.enemy.length;i++)
                    {
                        var opt2 = document.createElement("textarea");
                        opt2.name = 'enemy[]'

                        opt2.value = this.enemy[i].id
                        temp_form.appendChild(opt2);
                    }

                    document.body.appendChild(temp_form);
                    //提交数据
                    temp_form.submit();
                }
                
            }
        })
    </script>
@stop
