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
            data() {
                return {
                    inputName: '{{$name}}',
                    image: null,
                    isLoading: false,
                    thumbs: [],
                    isMultiple: {{ $multiple }},
                }
            },
            mounted() {
                this.thumbs = [{
                    path: '',
                    uid: false
                }];
            },
            methods: {
                async onChange(e, index) {
                    this.isLoading = true;
                    this.image = e.target.files[0];
                    const formData = new FormData();
                    formData.append('file', this.image);
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
                        MESSAGE.ERROR('',e)
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
    </style>
@endpush

