//
// Import CSS
//
import '../css/app.css';

//
// Import JS Vendor
//
import './vendor.js';

//
// Import common JS
//
import './common/config.js';
import './common/init.js';
import './common/helpers.js';

//
// Nav Vue instance
//
import './vue/nav.js';

//
// Vue Components
//
import './vue/components-register.js';

//
// Other
//

// 收起導覽列
// TODO: 改成 div 控制會比較好
document.body.addEventListener('click', (e) => {
    if (window.admin.navVm.sidebar.isShow == true)
        window.admin.helpers.toggleNavSidebar(false);
});

//
// Init
//
document.addEventListener('DOMContentLoaded', () => {
    window.admin.init.csrfFieldAttribute();
    window.admin.init.initNotify();
});
