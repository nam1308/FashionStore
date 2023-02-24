@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', ['title' => 'Product list'])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Products', 'link' => '/products'],['label' => 'Add Product']]])
        <div id="product"></div>
    </div>

    <template id="create_product">
        <div class="create_product-content">
            <div class="create_product-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label>Name</label>
                            <input v-model="products.name" class="form-control"
                                   :class="{border: products.error?.name,'border-danger': products.error?.name}">
                            <p v-if="products.error?.name" class="text-danger">
                                @{{products.error.name.join(' ')}}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input v-model="products.slug" class="form-control"
                                   :class="{border: products.error?.slug,'border-danger': products.error?.slug}">
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
                                        <option v-for="item in parents" :key="item.id" :value="item.id">
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
                                    <input type="number" v-model="products.regular_price" class="form-control"
                                           :class="{border: products.error?.regular_price,'border-danger': products.error?.regular_price}">
                                    <p v-if="products.error?.regular_price" class="text-danger">
                                        @{{products.error.regular_price.join(' ')}}
                                    </p>
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
                            <textarea v-model="products.meta_description" class="form-control"></textarea>
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
            <div class="attribute">
                <div class="ibox">
                    <div class="ibox-head">
                        <h3 class="ibox-title">Attribute product</h3>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Attributes: </label>
                                <div class="col-sm-10">
                                    <div v-for="item,index in options"
                                         :key="index"
                                         class="attributes__content mb-3 p-3 border border-secondary">
                                        <button
                                            @click="removeAttribute"
                                            :data-id="index" type="button"
                                            class="btn btn-sm btn-danger float-right mb-2">
                                            <i class="ti-trash"></i>
                                        </button>
                                        <label>Attribute</label>
                                        <select class="attribute-select form-control mb-2">
                                        </select>
                                        <label>Variation</label>
                                        <select class="variation-select form-control">
                                        </select>
                                    </div>
                                    {{-- <div class="attributes__content mb-3 p-3 border border-secondary">
                                        <label>Attribute</label>
                                        <select class="key form-control mb-2"></select>
                                        <label>Variation</label>
                                        <select class="value form-control"></select>
                                    </div> --}}
                                    <button type="button" @click="addAttribute" class="btn">Add attribute</button>
                                </div>
                            </div>
                            <div v-if="isShow" class="form-group row">
                                <label class="col-sm-2 col-form-label">
                                    <span class="text-danger">*</span>
                                    Price
                                </label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="number" value="0" min="1">
                                </div>
                            </div>
                            <div v-if="isShow" class="form-group row">
                                <label class="col-sm-2 col-form-label">
                                    <span class="text-danger">*</span>
                                    Stock
                                </label>
                                <div class="col-sm-2">
                                    <input class="form-control" type="number" value="0" min="0">
                                </div>
                            </div>
                            <div v-if="isShow" class="form-group row">
                                <label class="col-sm-2 col-form-label">
                                    SKU
                                </label>
                                <div class="col-sm-2">
                                    <input class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="attribute_details">
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
                                            <button type="button" @click.prevent="DeleteAtribute(index)"
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
                <a href="{{ url('admin/products') }}" type="button" class="btn btn-secondary mr-4">Come back</a>
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
        const table = new Set();

        Vue.createApp({
            template: "#create_product",
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
                        regular_price: '',
                        image: '',
                        thumbs: ["/medias/1675648139.jpg", "/medias/1675648145.png"],
                        is_hot: 0,
                        meta_description: '',
                        meta_title: '',
                        meta_keyword: '',
                        lang: 'vi',
                        error: null,
                        attribute: [],
                    },
                    parents: [],
                    attribute: [
                        { option: {'mau-sac': 'Red', 'kich-thuoc': 'L'}, price: 0, sku: '', stock: 0, thumb_url: '/medias/1675648139.jpg' },
                        { option: {'mau-sac': 'Blue', 'kich-thuoc': 'L'}, price: 0, sku: '', stock: 0, thumb_url: '/medias/1675648139.jpg' },
                        { option: {'mau-sac': 'Red', 'kich-thuoc': 'M'}, price: 0, sku: '', stock: 0, thumb_url: '/medias/1675648139.jpg' },
                        { option: {'mau-sac': 'Blue', 'kich-thuoc': 'M'}, price: 0, sku: '', stock: 0, thumb_url: '/medias/1675648139.jpg' },
                    ],
                    attrError: [],
                    isShow: true,
                    statusbtn: false,
                    bulkData: {price: 0, sku: null, stock: 0}
                }
            },
            async mounted() {
                this.parents = @json($productCategories);
                PLUGIN.EDITOR('');
            },
            methods: {
                async handleSubmit() {
                    this.products.content = PLUGIN.GETCONTENT();
                    this.products.thumbs = this.products.thumbs.toString();
                    this.products.attribute = this.attribute;
                    try {
                        await API.PRODUCT.CREATE(this.products);
                        MESSAGE.SUCCESS('Create products success');
                        window.location.replace('{{ url('admin/products') }}')
                    } catch (e) {
                        this.products.error = e.response.data;
                        this.attrError = e.response.data;
                    }
                },
                errorIf(index, key) {
                    return this.attrError[`attribute.${index}.${key}`]?.shift();
                },
                addAttribute() {
                    this.isShow = false
                    this.options.push({
                        variations: [],
                        price: 0,
                        sku: '',
                        stock: 10,
                        thumb_url: ''
                    })
                },
                removeAttribute(e) {
                    const id = e.target.closest('button').dataset.id
                    this.options.splice(id, 1)
                    if (this.options.length == 0) {
                        this.isShow = true
                    }
                },
                initSelector(selector, option) {
                    PLUGIN.INIT(selector, option);
                    //su kien khi chon item
                    $('.attribute-select').on('select2:select', function name(e) {
                        const id = $(this).val()
                        $(this).data('prev', id)
                        table.add(id)
                        console.log(table);
                    })
                    //su kien khi bo chon
                    $('.attribute-select').on('select2:unselect', function name(e) {
                        const id = $(this).data('prev')
                        table.delete(id)
                    })
                },
                DeleteAtribute(e) {
                    this.attribute.splice(e, 1);
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
            updated() {
                this.initSelector('.attribute-select', {
                    placeholder: 'Attribute',
                    allowClear: true,
                    width: '100%',
                    minimumResultsForSearch: Infinity,
                    ajax: {
                        url: "{{route('attribute.filter')}}",
                        headers: {
                            "Authorization": "Bearer " + localStorage.getItem("token"),
                            "Content-Type": "application/json",
                        },
                        data: function (params) {
                            filter = []

                            for (item of table) {
                                filter.push(item);
                            }

                            return {
                                filter
                            }
                        },
                        processResults: function (res) {
                            const items = res.map(item => {
                                return {
                                    id: item.id,
                                    text: item.name,
                                }
                            })
                            console.log(items);
                            return {
                                results: items
                            }
                        }
                    },
                })
            }
        }).mount('#product')
    </script>

    <style scoped>
        .note-editing-area {
            background: #fff
        }

        .thumb-item {
            background: #fff;
        }

        select.form-control {
            height: auto !important;
        }
    </style>
@endpush
