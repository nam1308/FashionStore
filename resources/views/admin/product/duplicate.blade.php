@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', ['title' => 'Product list'])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['item' => [['label' => 'Products', 'link' => '/products'],['label' => 'Products']]])
        <div id="products"></div>
    </div>

    <template id="edit_product">
        <div class="edit_product-content">
            <div class="edit_product-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Name</label>
                            <input v-model="products.name" class="form-control" :class="{border: products.error?.name,'border-danger': products.error?.name}">
                            <p v-if="products.error?.name" class="text-danger">
                                @{{products.error.name.join(' ')}}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input v-model="products.slug" class="form-control" :class="{border: products.error?.slug,'border-danger': products.error?.slug}">
                            <p v-if="products.error?.slug" class="text-danger">
                                @{{products.error.slug.join(' ')}}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea v-model="products.description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Content</label>
                            <textarea class="form-control editor"> </textarea>
                        </div>

                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="mr-2">Parent</label>
                                    <select v-model="products.parent" class="form-control">
                                        <option value="0" selected>Root</option>
                                        <option v-for="item in parents" :key="item.id" :value="item.id" >
                                            @{{ item.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Sort Order</label>
                                    <input v-model="products.sort_order" type="number" min="1" class="form-control">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label class="mr-2">Status</label>
                                    <select v-model="products.status" class="form-control">
                                        <option value="1" selected>Show</option>
                                        <option value="0">Hide</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Regular Price</label>
                                    <input type="number" :value="products.regular_price" class="form-control" min="0">
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Is Hot</label>
                                    <select v-model="products.is_hot" class="form-control">
                                        <option value="0" selected>No Hot</option>
                                        <option value="1">Hot</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Lang</label>
                                    <select v-model="products.lang" class="form-control">
                                        <option value="vi" selected>VI</option>
                                        <option value="en">EN</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Avatar</label>--}}
                        {{--                            <x-upload name="image" :values="$image" multiple="false" />--}}
                        {{--                        </div>--}}
                        {{--                        <div class="form-group">--}}
                        {{--                            <label>Albums</label>--}}
                        {{--                            <x-upload name="image[]" :values="$image" multiple="true" />--}}
                        {{--                        </div>--}}

                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea v-model="products.meta_description" class="form-control" :value="products.meta_description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta Title</label>
                            <input v-model="products.meta_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Meta Keyword</label>
                            <input v-model="products.meta_keyword" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
            <div class="edit_attribute_details">
                <div class="ibox">
                    <div class="ibox-head">
                        <h3 class="ibox-title">Danh sách phân loại hàng : </h3>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal">
                            <div class="row">
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="number" min="0" placeholder="Price" class="form-control"
                                               v-model="bulkData.price">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="number" min="0" placeholder="Warehouse" class="form-control"
                                               v-model="bulkData.stock">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <input type="text" placeholder="SKU Classification" class="form-control"
                                               v-model="bulkData.sku">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <button type="button" :disabled="!statusbtn" class="btn w-100"
                                                @click.prevent="upplyToAll">Upply to all
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Color</th>
                                    <th class="text-center">Image</th>
                                    <th>Price</th>
                                    <th>Warehouse</th>
                                    <th>SKU Classification
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item, index) in attribute">
                                    <td>
                                        <div class="form-group text-center mb-1">
                                            <label for=""> @{{ item.option['kich-thuoc'] }} </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group text-center mb-1">
                                            <label for=""> @{{ item.option['mau-sac'] }} </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group d-flex justify-content-center align-center mb-1">
                                            {{-- <x-upload name="image" :values="$image" multiple="false" /> --}}
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mb-1">
                                            <input type="number" placeholder="Price" class="form-control"
                                                   v-model="item.price" min="0" :class="{ 'border-danger': attrError[`attribute.${index}.price`] ? true : false }">
                                            <p class="text-danger mt-1 mb-0">
                                                @{{ errorIf(index, 'price')  }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mb-1">
                                            <input type="number" placeholder="Warehouse" class="form-control"
                                                   v-model="item.stock" min="0" :class="{ 'border-danger': attrError[`attribute.${index}.stock`] ? true : false }">
                                            <p class="text-danger mt-1 mb-0">
                                                @{{ errorIf(index, 'stock') }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mb-1">
                                            <input type="text" placeholder="SKU Classification" class="form-control"
                                                   v-model="item.sku" :class="{ 'border-danger': attrError[`attribute.${index}.sku`] ? true : false }">
                                            <p class="text-danger mt-1 mb-0">
                                                @{{ errorIf(index, 'sku') }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group d-flex justify-content-center align-center mb-1">
                                            <button type="button" @click.prevent="DeleteAtribute(index,item)"
                                                    class="btn btn-sm">
                                                <i class="ti-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
            <div class="create_blog-footer">
                <a href="{{ asset('admin/products') }}" type="button" class="btn btn-secondary mr-4">Come back</a>
                <button type="button" class="btn btn-primary" @click.prevent="handleSubmit">Save changes</button>
            </div>
        </div>
    </template>

@endsection

@push('styles')
    <link rel='stylesheet' href="{{asset('backend/vendors/toastr/toastr.min.css')}}"/>
@endpush

@push('vue')
    <script src="{{asset("backend/vendors/bootbox/bootbox.min.js")}}"></script>
    <script src="{{asset("backend/vendors/toastr/toastr.min.js")}}"></script>
@endpush

@push('vue')
    <script type="text/javascript">
        Vue.createApp({
            template: "#edit_product",
            data() {
                return {
                    data: null,
                    products: {
                        name: '',
                        slug: '',
                        description: '',
                        content: '',
                        parent: 0,
                        sort_order: 1,
                        status: 1,
                        regular_price: 0,
                        image: '',
                        thumbs: [],
                        is_hot: 0,
                        meta_description: '',
                        meta_title: '',
                        meta_keyword: '',
                        lang: 'vi',
                        error: null,
                        attribute: [],
                    },
                    parents: [],
                    attribute: [],
                    attrError: [],
                    isShow: true,
                    statusbtn: false,
                    bulkData: {price: 0, sku: null, stock: 0}
                }
            },
            async mounted() {
                PLUGIN.INIT();
                this.parents = @json($productCategories);
                this.id = {{ $products->id }};
                await this.showfirst(this.id);
                const productDup = await API.PRODUCT.CREATE(this.products);
                await this.showsecond(productDup.data);
            },
            methods: {
                async showfirst(e){
                    const response = await API.PRODUCT.SHOW(e);
                    this.products = response.data[0];
                    this.attribute = response.data[1];
                    PLUGIN.EDITOR(this.products.content);
                    this.products.name = this.products.name.concat("_copy");
                    this.products.slug = this.products.slug.concat("_copy");
                    this.products.attribute = this.attribute;
                    this.products.id = null;
                    this.products.updated_at = null;
                    this.products.created_at = null;
                    this.products.attribute.forEach( function(value, key){
                        value.id = null;
                        value.product_id = null;
                        value.updated_at = null;
                        value.created_at = null;
                    });
                },
                async showsecond(e) {
                    const res = await API.PRODUCT.SHOW(e);
                    this.products = res.data[0];
                    this.attribute = res.data[1];
                    PLUGIN.EDITOR(this.products.content);
                    this.products.attribute = this.attribute;
                },
                async handleSubmit() {
                    this.products.content = PLUGIN.GETCONTENT();
                    this.products.thumbs = this.products.thumbs.toString();
                    this.products.attribute = this.attribute;
                    try {
                        await API.PRODUCT.UPDATE(this.products.id,this.products);
                        MESSAGE.SUCCESS('Create blog success');
                        window.location.replace('{{ url('admin/products') }}')
                    } catch (e) {
                        this.products.error = e.response.data;
                    }
                },
                errorIf(index, key) {
                    return this.attrError[`attribute.${index}.${key}`]?.shift();
                },
                async DeleteAtribute(e, item) {
                    try {
                        await API.PRODUCT.DELETEATTRIBUTE(item.id);
                        this.attribute.splice(e, 1);
                    } catch (e) {
                        MESSAGE.ERROR(e.message)
                    }
                },
                upplyToAll() {
                    const price = this.bulkData.price;
                    const stock = this.bulkData.stock;
                    const sku = this.bulkData.sku;
                    this.attribute.forEach(function (key, value) {
                        if (price !== 0 ?? price !== '') {
                            key.price = price;
                        }
                        if (stock !== 0 ?? stock !== '') {
                            key.stock = stock;
                        }
                        if (sku !== '') {
                            key.sku = sku;
                        }
                    });
                },
            },
            watch: {
                bulkData: {
                    handler(oldVal, newVal) {
                        this.statusbtn = Object.values(newVal).some(item => item > 0 || !!item);
                    },
                    deep: true
                }
            },
        }).mount('#products')
    </script>

    <style scoped>
        .note-editing-area { background: #fff }
        .thumb-item { background: #fff; }
        select.form-control { height: auto !important; }
    </style>
@endpush
