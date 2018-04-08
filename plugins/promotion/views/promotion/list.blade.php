@extends('plugin.common')
@section('admin-main')
    <fieldset class="layui-elem-field">
        <legend>搜索</legend>
        <div class="layui-field-box">
            <form class="layui-form layui-form-pane" action="/{{$request->path()}}" method="get">

                <div class="layui-form-item">

                    <div class="layui-inline">
                        <label class="layui-form-label">商品</label>
                        <div class="layui-input-inline">
                            <input class="layui-input" value="{{$request->input('title')}}" name="title" placeholder="低价商品/高价商品">
                        </div>
                    </div>
                    <div class="layui-inline">
                        <button class="layui-btn submit" lay-submit="" lay-filter="demo1">搜索</button>
                    </div>
                </div>
            </form>
        </div>
    </fieldset>
    @inject('menuPresenter','App\Presenters\MenuPresenter')
    <a class="layui-btn layui-btn-warm" href="/promotion/post"><i class="layui-icon">&#xe654;</i>添加促销活动</a>
    @if(count($list)==0)
        @include('admin.common.nodata')
    @else
        <table class="layui-table admin-table layui-form" lay-skin="line">

            <thead>
            <tr>
                <th style="width: 80px;"><input type="checkbox" lay-filter="allselector" lay-skin="primary" title="">全选</th>
                <th style="width:80px;">排序</th>
                <th style="width: 50px;">低价商品</th>
                <th></th>
                <th style="width: 50px;">高价商品</th>
                <th></th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody id="content">
            @foreach($list as $item)
                <tr>
                    <td><input type="checkbox" name="ids[]" value="{{$item->id}}" lay-skin="primary"></td>
                    <td><input class="layui-input" value="{{$item->displayorder}}" name="displayorder[{{$item->id}}]"></td>
                    <td>
                        <img src="{{@$item->lowGoods->mphoto}}" style="width: 45px;height: 45px;padding: 2px;border:1px solid #eee;">
                    </td>
                    <td>
                        {{@$item->lowGoods->title}} <span></span>
                    </td>
                    <td>{{$item->mobile}}</td>
                    <td>{{$item->address}}</td>
                    <td class="layui-operate">
                        <ul class="layui-nav">
                            <li class="layui-nav-item layui-this">
                                <a href="javascript:;">操作</a>
                                <dl class="layui-nav-child">
                                    @if($menuPresenter->checkOperm('plugins.supplier.update'))
                                        <dd><a href="/supplier/post?id={{$item->id}}" class="edit"><i class="fa fa-edit"></i> 编辑</a></dd>
                                    @endif
                                    @if($menuPresenter->checkOperm('plugins.supplier.delete'))
                                        <dd><a href="javascript:;" class="delete" data-id="{{$item->id}}"><i class="fa fa-trash"></i> 删除</a></dd>
                                    @endif
                                </dl>
                            </li>
                        </ul>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
        {{$list->render()}}
    @endif
@endsection
@section('script')
    <script>
        layui.use(['form','layer'],function(){
            var form = layui.form,
                layer = layui.layer;
            $('.delete').click(function(){
                var id = $(this).data('id');
                var obj = this;
                layer.confirm('确定删除该供应商？',{offset:'100px'},function(){
                    $.post('/supplier/delete',{id:id},function(res){
                        if(res.errorCode == 0){
                            layer.msg('操作成功',{time:1500,end:function(){
                                $(obj).closest('tr').remove();
                            }})
                        }else{
                            layer.msg(res.errorStr,{time:2000});
                        }
                    },'json');
                });
            });
        });
    </script>
@endsection