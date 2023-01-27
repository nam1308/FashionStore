@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', [
        'title' => 'Products' ])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Product', 'link' => '/products'],['label' => 'Categories']]])
        <div id="categories"></div>
    </div>
    <template id="category-template">
        <div class="row">
            <div class="col-md-8">
                <div class="ibox">
                    <div class="ibox-head">
                        <h4 class="ibox-title">Categories list</h4>
                    </div>
                    <div class="ibox-body">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Order</th>
                                <th width="100">Action</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="ibox">
                    <div class="ibox-head">
                        <h4 class="ibox-title">Add new</h4>
                    </div>
                    <div class="ibox-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Parents</label>
                            <select class="form-control select2">
                                <option value="0">Parent category</option>
                                <option value="1">Parent ádasd</option>
                                <option value="2">Parent ádd</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Order</label>
                            <input type="number" value="1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </template>
@stop
@push('vue')
    <script type="text/javascript">
        Vue.createApp({
            template: '#category-template',
            methods: {},
            computed() {
                console.log("COMPUTED")
            },
            mounted() {
                PLUGIN.INIT();
            }
        }).mount('#categories')
    </script>
@endpush
