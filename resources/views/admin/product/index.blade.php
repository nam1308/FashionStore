@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', [
        'title' => 'Product list'
    ])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Products']]])
        <div id="product"></div>
    </div>
    <template id="product-template">
        <div class="ibox">
            <div class="ibox-head">
                <div class="ibox-title">Products</div>
                <div class="ibox-tools">
                    <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                </div>
            </div>
            <div class="ibox-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Product</th>
                        <th>Sku</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="(product, index) in products">
                        <td>@{{ index + 1 }}</td>
                        <td>@{{product.sku}}</td>
                        <td>@{{product.stock}}</td>
                        <td>@{{product.status}}</td>
                        <td>@{{product.status}}</td>
                        <td>
                            <div class="d-flex justify-content-around">
                                <button title="Edit" @click="onEdit(product.id)" class="btn btn-sm">
                                    <i class="ti-pencil"></i>
                                </button>
                                <button title="Remove" @click="onRemove(product.id)" class="btn btn-sm">
                                    <i class="ti-trash"></i>
                                </button>
                                <button title="Duplicate" @click="onDuplicate(product.id)" class="btn btn-sm">
                                    <i class="ti-layers"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </template>
@stop
@push('vue')
    <script type="text/javascript">
        Vue.createApp({
            template: '#product-template',
            data() {
                return {
                    products: [{id: 1, name: 'HELLO', sku: 'Product 1'}]
                }
            },
            methods: {
                onGetList: async (params = {}) => {

                },
                onRemove: async (productId) => {
                    const confirm = window.confirm('Are you sure remove this product?');
                    confirm && await API.PRODUCT.DELETE(productId);
                },
                onEdit: (productId) => {
                    window.location.replace(`/admin/products/${productId}`)
                },
                onDuplicate: (productId) => {
                    window.location.replace(`/admin/products/duplicate/${productId}`)
                },
            }
        }).mount('#product')
    </script>
@endpush
