@extends('admin.layouts.main')
@section('meta')
    @include('admin.inc.meta', [
        'title' => 'Product list'
    ])
@stop
@section('content')
    <div class="container-fluid p-0">
        @include('admin.inc.breadcrumb', ['items' => [['label' => 'Settings']]])
        <div id="setting"></div>
    </div>
    <template id="setting-template">
        <div class="ibox ibox-body">
            <div class="ibox-body">
                <ul class="nav nav-tabs tabs-line">
                    <li class="nav-item">
                        <a class="nav-link active" href="#tab-7-1" data-toggle="tab" aria-expanded="false"><i
                                class="fa fa-line-chart"></i> Basic info</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-7-2" data-toggle="tab" aria-expanded="true"><i
                                class="fa fa-heartbeat"></i> Socials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#tab-7-3" data-toggle="tab" aria-expanded="false"><i
                                class="fa fa-life-ring"></i> Mail server</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div v-for="(item, index) in Object.values(this.form)"
                         :class="index === 0 ? 'tab-pane active' : 'tab-pane'" :id="`tab-7-${index + 1}`"
                         aria-expanded="false">

                        <div v-for="(field, key) in item" class="form-group row">
                            <label class="col-sm-2 col-form-label">@{{field.title}}</label>
                            <div class="col-sm-5">
                                <input v-model="form[tabs[index]][key].value" :name="field.key" class="form-control"
                                       :value="field.value"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="text-right">
                                    <button @click="onSubmit" class="btn btn-pinterest">Lưu</button>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </template>
@stop

@push('vue')
    <script>
        Vue.createApp({
            template: '#setting-template',
            data() {
                return {
                    tabs: ['general', 'socials', 'mail'],
                    loading: false,
                    form: {
                        general: [
                            {title: 'Site name (Vi)', key: 'site_name', lang: 'vi', value: ''},
                            {title: 'Site name (En)', key: 'site_name', lang: 'en', value: ''},
                            {title: 'Description (Vi)', key: 'description', lang: 'vi', value: ''},
                            {title: 'Description (En)', key: 'description', lang: 'en', value: ''},
                            {title: 'Address (En)', key: 'address', lang: 'en', value: ''},
                            {title: 'Address (Vi)', key: 'address', lang: 'vi', value: ''},
                            {title: 'Fax', key: 'fax', lang: "['vi','en']", value: ''},
                            {title: 'Hotline', key: 'hotline', lang: "['vi','en']", value: ''},
                            {title: 'Email ', key: 'email', lang: "['vi','en']", value: ''},
                        ],
                        socials: [
                            {
                                title: 'Facebook',
                                icon: 'fa fa-facebook',
                                key: 'facebook',
                                lang: "['vi','en']",
                                value: ''
                            },
                            {title: 'Zalo', icon: 'fa fa-zalo', key: 'zalo', lang: "['vi','en']", value: ''},
                            {title: 'Youtube', icon: 'fa fa-youtube', key: 'youtube', lang: "['vi','en']", value: ''},
                            {
                                title: 'Instagram',
                                icon: 'fa fa-instagram',
                                key: 'instagram',
                                lang: "['vi','en']",
                                value: ''
                            },
                        ],
                        mail: [
                            {title: 'Email ', key: 'email', lang: "['vi','en']", value: ''},
                            {title: 'Password ', key: 'password', lang: "['vi','en']", value: ''},
                            {title: 'Host ', key: 'host', lang: "['vi','en']", value: 'smtp.gmail.com'},
                            {title: 'Port ', key: 'port', lang: "['vi','en']", value: '465'},
                            {title: 'Encryption ', key: 'encryption', lang: "['vi','en']", value: 'tls'},
                        ]
                    }
                }
            },
            watch: {},
            methods: {
                async onGetSetting() {
                    const response = await API.SETTING.GET();
                    response.data.some((item) => {
                        this.tabs.map((tab) => {
                            const keyIndex = this.form[tab].findIndex(setting => setting.key === item.key && setting.lang === item.lang);
                            if (keyIndex !== -1) {
                                this.form[tab][keyIndex].value = item.value;
                            }
                        });
                    })
                },
                async onSubmit() {
                    const values = Object.values(this.form).flat().map((item) => ({
                        key: item.key,
                        value: item.value,
                        lang: item.lang
                    })).filter(item => !!item.value)
                    await API.SETTING.SAVE(values);
                }
            },
            mounted() {
                console.log("ThiS", Object.values(this.form))
                this.onGetSetting();
            }
        }).mount('#setting')
    </script>
@endpush
