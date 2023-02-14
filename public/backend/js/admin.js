const PLUGIN = {
    INIT: () => {
        $(".select2").select2({
            allowClear: true
        });
    },
    EDITOR: (value = '') => {
        $('.editor').summernote({
            height: 300,
        });
        $('.editor').summernote('code', value);
    },
    GETCONTENT:()=>{
        return $('.editor').summernote("code");
    },
}
