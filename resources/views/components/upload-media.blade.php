<div id="upload-content"></div>
@verbatim

    <template id="upload-one">
        <div class="d-flex">
            <div v-for="(thumb, index) in thumbs" class="thumb-item">
                <input @change="(e) => onChange(e, index)" type="file"/>
                <div v-if="isLoading && !thumb.uid" class="loader"></div>
                <span v-if="!thumb.uid && !isLoading">Pick image</span>
                <input v-if="thumb.path" :value="thumb.path" type="hidden" :name="inputName">
                <img v-if="thumb.uid" :src="thumb.path"/>
                <div v-if="thumb.uid" class="action">
                    <button @click="onDelete(thumb)">Xóa</button>
                </div>
            </div>
        </div>
    </template>

@endverbatim

@push('vue')
    <script>
        Vue.createApp({
            template: '#upload-one',
            props: {
                test: {
                    type: Array,
                    default: function () {
                        return [];
                    },
                }
            },
            data() {
                return {
                    inputName: '{{$name}}',
                    image: [],
                    isLoading: false,
                    thumbs: [],
                    isMultiple: {{ $multiple }},
                };
            },
            mounted() {
                const defaults =  @json($values);
                // if(defaults){
                if (this.isMultiple) {
                    this.thumbs = defaults.map((thumb) => ({path: thumb, uid: Math.random() }))
                    this.thumbs[defaults.length] = [{ path: '',  uid: false }];
                } else{
                    this.thumbs = [{ path: '',  uid: false }];
                }
            },
            methods: {
                async onChange(e, index) {
                    this.isLoading = true;
                    this.image[index] = e.target.files[0];
                    const formData = new FormData();
                    formData.append('file', this.image[index]);
                    formData.append('_token', `{{csrf_token()}}`);
                    try {
                        const {path, uid} = await API.MEDIA.MOVEFILE(formData);
                        const item = {path, uid};
                        if (this.isMultiple) {
                            this.thumbs[index] = item;
                            this.thumbs.push({path: '', uid: false})
                        } else {
                            this.thumbs = [item];
                        }
                    } catch (e) {
                        MESSAGE.ERROR('', e);
                    } finally {
                        this.isLoading = false;
                    }
                },
                async onDelete(target) {
                    const confirm = window.confirm('Are you sure remove it?')
                    if (!confirm) return;
                    this.isLoading = true;

                    await API.MEDIA.DELETE(target.path);
                    this.thumbs = this.thumbs.filter((thumb) => thumb.uid !== target.uid);
                    MESSAGE.SUCCESS('Image removed!');
                    this.isLoading = false;
                    if (!this.thumbs.length) {
                        this.thumbs = [{
                            path: '',
                            uid: false
                        }];
                    }
                },
            }
        }).mount('#upload-content');
    </script>

    <style scoped>
        .thumb-item {
            width: {{$width.'px'}};
            height: {{$height.'px'}};
        }

        /* Upload image */
        .thumb-item input[type="file"] {
            opacity: 0;
            width: 100%;
            height: 100%;
            position: absolute;
            top: 0;
            left: 0;
            z-index: 2;
        }

        .thumb-item {
            border-radius: 10px;
            border: 2px dashed #ccc;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            font-size: 20px;
            color: black;
            justify-content: center;
            margin-left: 15px;
        }

        .thumb-item:hover .action {
            bottom: 0;
        }

        .thumb-item .action {
            position: absolute;
            width: 100%;
            height: 50px;
            background: rgba(0, 0, 0, .5);
            text-align: center;
            display: flex;
            align-items: center;
            bottom: -50px;
            transition: 0.5s all;
            border-radius: 10px;
            z-index: 3;
        }

        .thumb-item .action button {
            background: none;
            width: 100%;
            height: 100%;
            color: white;
            cursor: pointer;
            border: none;
        }

        .loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid blue;
            border-bottom: 16px solid blue;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 0.5s linear infinite;
            animation: spin 0.5s linear infinite;
        }

        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }
            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }
            100% {
                transform: rotate(360deg);
            }
        }

        form {
            width: 100%;
        }
    </style>
@endpush


