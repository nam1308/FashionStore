const PLUGIN = {
    INIT: (selector, option) => {
        $(selector).select2(option);
    },
    EDITOR: (value = "") => {
        $(".editor").summernote({
            height: 300,
        });
        $(".editor").summernote("code", value);
    },
    GETCONTENT: () => {
        return $(".editor").summernote("code");
    },
};
