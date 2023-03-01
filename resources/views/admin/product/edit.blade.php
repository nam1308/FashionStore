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
                            <input v-model="products.name" class="form-control"
                                   @input="generateSlug"
                                   :class="{border: products.error?.name,'border-danger': products.error?.name}">
                            <p v-if="products.error?.name" class="text-danger">
                                @{{products.error.name.join(' ')}}
                            </p>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input v-model="products.slug" class="form-control"
                                   disabled
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
                            <div v-if="isShow" class="col-4">
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

            <div class="attribute">
                <div class="ibox">
                    <div class="ibox-head">
                        <h3 class="ibox-title">Attribute product</h3>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Attributes: </label>
                                <div class="attribute-container col-sm-10">
                                    <div v-for="(item,index) in options"
                                         :key="index"
                                         class="attributes__content mb-3 p-3 border border-secondary" >
                                        <button
                                            @click="removeAttribute($event,index)"
                                            type="button" class="btn btn-sm btn-danger float-right mb-2">
                                            <i class="ti-trash"></i>
                                        </button>
                                        <label>Attribute</label>
                                        <select class="attribute-select form-control mb-2" :data-index="index">
                                            <option value=""></option>
                                            <option v-for='attr in item.attributes'
                                            :selected="attr.selected"
                                            :value='attr.slug'>@{{attr.name}}</option>
                                        </select>
                                        <label>Variation</label>
                                        <select class="variation-select form-control" :data-index="index" multiple="multiple">
                                            <option v-for='attr in item.variants'
                                            :selected="attr.selected"
                                            :data-parent="attr.parent" :value='attr.variant.name'>@{{attr.variant.name}}</option>
                                        </select>
                                    </div>
                                    <button v-if="options.length < 3" type="button" @click="addAttribute" class="btn mr-2">Add attribute</button>
                                    <button v-if="options.length" type="button" @click="saveOption" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="edit_attribute_details" v-if="dataTable.length > 0">
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
                                <tr v-for="(item, index) in dataTable">
                                    <td>
                                        <div class="form-group text-center mb-1">
                                            <label for=""> @{{ item.option['size'] }} </label>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group text-center mb-1">
                                            <label for=""> @{{ item.option['color'] }} </label>
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
                                                   v-model="item.price" min="0" :class="{ 'border-danger': attrError[`dataTable.${index}.price`] ? true : false }">
                                            <p class="text-danger mt-1 mb-0">
                                                @{{ errorIf(index, 'price')  }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mb-1">
                                            <input type="number" placeholder="Warehouse" class="form-control"
                                                   v-model="item.stock" min="0" :class="{ 'border-danger': attrError[`dataTable.${index}.stock`] ? true : false }">
                                            <p class="text-danger mt-1 mb-0">
                                                @{{ errorIf(index, 'stock') }}
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group mb-1">
                                            <input type="text" placeholder="SKU Classification" class="form-control"
                                                   v-model="item.sku" :class="{ 'border-danger': attrError[`dataTable.${index}.sku`] ? true : false }">
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
        const table = new Map()
        let indexAttribute = 0

        Vue.createApp({
            template: "#edit_product",
            data() {
                return {
                    data: null,
                    products: {
                        id: 0,
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
                    attributes: @json($attributes),// data attribute
                    productAttribute: @json($productAttribute),
                    attrError: [],
                    variants: [],
                    options: [],//data option de render
                    list: [],
                    dataTable: [],
                    isShow: true, //show price,
                    statusbtn: false,
                    bulkData: {price: 0, sku: null, stock: 0}
                }
            },
            async mounted() {
                PLUGIN.INIT();
                this.parents = @json($productCategories);
                this.id = {{ $products->id }};
                const response = await API.PRODUCT.SHOW(this.id);
                this.products = response.data[0];
                this.dataTable = response.data[1];
                PLUGIN.EDITOR(this.products.content);

                const that = this;
                $('.attribute-container').on('select2:select','.attribute-select',function name(e) {
                    const slug = $(this).val()
                    const index = $(this).data('index')
                    that.setAttribute(e,$(this))
                });
                $('.attribute-container').on('select2:select','.variation-select',function name(e) {
                    that.setVariant(e,$(this))
                });
                $('.attribute-container').on('select2:unselecting','.variation-select',function name(e) {
                    const index = $(this).data('index')
                    const parent = e.target.options[0].dataset.parent
                    const value = $(this).val()
                    that.options[index].variants.forEach((item,i) => {
                        if (value.includes(item.variant.name)){
                            that.options[index].variants[i].selected = false
                        }
                    })
                });
                $('.attribute-container').on('select2:unselect','.variation-select',function name(e) {
                    const index = $(this).data('index')
                    const parent = e.target.options[0].dataset.parent
                    const value = $(this).val()
                    that.list[index].option = {
                        [parent]: value
                    }
                });

                this.initOption();
            },
            methods: {
                generateSlug(e){
                    this.products.slug = this.products.name.split(' ').join('-').toLowerCase();
                },

                async handleSubmit() {
                    this.products.content = PLUGIN.GETCONTENT();
                    this.products.attribute = this.dataTable;
                    try {
                        await API.PRODUCT.UPDATE(this.products.id,this.products);
                        MESSAGE.SUCCESS('Update products success');
                        window.location.replace('{{ url('admin/products') }}')
                    } catch (e) {
                        this.products.error = e.response.data;
                    }
                },

                saveOption(e){
                    const length = this.list.length
                    let n = 0
                    let m = 0
                    const res = []

                    this.list.forEach(item => {
                        if (!Object.keys(item.option).length){
                            alert('Attribute not empty')
                            throw new Error('Attribute not empty');
                        }
                    })

                    for (const key in this.list[0].option) {
                        const item = this.list[0]
                        const tmp = item.option[key].map(item => {
                            return length == 1 ?
                            {
                                option: {
                                    [key]: item
                                },
                                price: 0,
                                sku: '',
                                stock: 0,
                                thumb_url: '/medias/1675648139.jpg',
                            }
                            :
                            {
                                [key]: item,
                            }
                        })
                        res.push(tmp)
                    }

                    for (let i = 1; i < length; i++) {
                        const elememt = this.list[i].option;
                        const prev = res[i-1]
                        let item = []
                        let tmp = []

                        for (const key in elememt) {
                            item = elememt[key].map(o => {
                                return{
                                    [key]: o
                                }
                            })
                        }


                        for (let j = 0; j < prev.length; j++) {
                            for (let k = 0; k < item.length; k++) {
                                // console.log(prev[j]);
                                tmp.push({
                                    option: i == 1 ? {
                                        ...prev[j],
                                        ...item[k]
                                    } : {
                                        ...prev[j].option,
                                        ...item[k]
                                    },
                                    price: 0,
                                    sku: '',
                                    stock: 0,
                                    thumb_url: '/medias/1675648139.jpg',
                                })
                            }
                        }
                        res.push(tmp)
                    }

                    this.dataTable = res[res.length-1]
                    console.log(this.dataTable);
                },

                initOption(){
                    let i = 0

                    for (const key in this.productAttribute){
                        const obj = this.productAttribute[key];
                        this.addAttribute()
                        this.$nextTick(() => {
                            const attr = $(`.attribute-select[data-index=${i}]`)
                            attr.val(key).trigger('change')
                            this.setAttribute(null,attr,obj)
                            i++;
                        })
                    }

                },

                setAttribute(e,elem,data){
                    const value = elem ? elem.val() : e.target.value;
                    const index = elem ? elem.data('index') :e.target.dataset.index;
                    const attribute =  this.attributes.find((item) => item.slug === value);
                    const variants = attribute?.children ?? []

                    if (table.has(value) && table.get(value) !== index){
                        const indexDup = table.get(value)

                        this.options[indexDup].attributes.forEach((item,i) => {
                            if(item.slug === value)
                                this.options[indexDup].attributes[i].selected = false
                        })

                        $(`.attribute-select[data-index=${indexDup}]`).val(null).trigger('change')

                        this.options[indexDup].variants = []

                        PLUGIN.INIT(`.variation-select[data-index=${indexDup}]`,{
                            placeholder: 'Variation',
                            allowClear: true
                        })

                        this.list[indexDup] = {
                            option: {},
                        }

                    }

                    table.set(value,index)

                    this.options[index].attributes.forEach((item,i) => {
                        if(item.slug === value)
                        this.options[index].attributes[i].selected = true
                    })

                    this.options[index].variants = variants.map(item => {
                        return {
                            parent: value,
                            variant: item,
                            selected: false
                        }
                    })
                    this.list[index] = {
                        option: {...this.list[index]?.option ?? [], [attribute.slug]: []},
                    }
                    this.$nextTick(() => {
                        PLUGIN.INIT('.variation-select',{
                            placeholder: 'Variation',
                            allowClear: true
                        })

                        if (data){
                            const opt = $(`.variation-select[data-index=${index}]`)
                            opt.val(data).trigger('change')
                            this.setVariant(null,opt)
                        }
                    })

                },

                setVariant(e,elem){
                    const value = elem.val();
                    const parent = elem.find('option:first-child').data('parent');
                    const index = elem.data('index');
                    const dataIndex = this.list[index];
                    this.options[index].variants.forEach((item,i) => {
                        if(value.includes(item.variant.name)){
                            this.options[index].variants[i].selected = true
                        }
                    })

                    this.list[index] = {
                        ...dataIndex,
                        option: {...dataIndex.option, [parent]: [...value]}
                    }

                    console.log(this.list);
                },

                addAttribute(){
                    this.isShow = false;
                    const attribute = this.attributes.map(item => {
                        return {
                            ...item,
                            selected: false
                        }
                    })
                    this.options = [...this.options,{attributes: attribute,variants: []}]

                    this.list.push({})

                    this.$nextTick(() => {
                        PLUGIN.INIT('.attribute-select',{
                            placeholder: 'Attribute',
                            allowClear: true
                        })
                    })
                },

                removeAttribute(e,index){
                    table.clear()
                    this.options.splice(index,1)
                    this.list.splice(index,1)
                    if (this.options.length == 0){
                        this.isShow = true
                    }

                    this.$nextTick(() => {
                        $('.attribute-select').trigger('change')
                        PLUGIN.INIT('.variation-select',{
                            placeholder: 'Variation',
                            allowClear: true
                        })
                    })
                },

                errorIf(index, key) {
                    return this.attrError[`attribute.${index}.${key}`]?.shift();
                },

                async DeleteAtribute(e, item) {
                    try {
                        await API.PRODUCT.DELETEATTRIBUTE(item.id);
                        this.dataTable.splice(e, 1);
                    } catch (e) {
                        MESSAGE.ERROR(e.message)
                    }
                },

                upplyToAll() {
                    const price = this.bulkData.price;
                    const stock = this.bulkData.stock;
                    const sku = this.bulkData.sku;
                    this.dataTable.forEach(function (key, value) {
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
