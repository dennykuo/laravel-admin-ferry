window.admin.init = {

    csrfFieldAttribute: () => {
        let fields = document.querySelectorAll('input[type="hidden"]');
        fields.forEach(function(field) {
            field.setAttribute('hidden', true);
        });
    },

    initNotify: () => {
        // 套件通用設定
        Noty.overrideDefaults({
            layout: 'topRight',
            theme: 'relax' // 修改的話，記得改 resources/css/vendor.css 中的對應
        });
    }

};
