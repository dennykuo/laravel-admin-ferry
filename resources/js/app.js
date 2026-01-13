//
// Import JS Vendor
//
import './vendor.js';

import '@fortawesome/fontawesome-free/css/all.min.css';
import 'noty/lib/noty.css';
import 'noty/lib/themes/relax.css';

//
// Import common JS
//
import './common/config.js';
import './common/init.js';
import './common/helpers.js';

//
// Import components JS
//
import './components/modal.js';

//
// Nav Vue instance
//
import './vue/nav.js';

//
// Vue Components
//
// import './vue/components-register.js'; // 暫無使用

//
// Other
//

// 收起導覽列
// TODO: 改成 div 控制會比較好
if (window.admin.hasOwnProperty('navVm')) {
    document.body.addEventListener('click', (e) => {
        if (window.admin.navVm.sidebar.isShow == true) {
            window.admin.helpers.toggleNavSidebar(false);
        }
    });
}

//
// Init
//
document.addEventListener('DOMContentLoaded', () => {
    window.admin.init.csrfFieldAttribute();
    window.admin.init.initNotify();
});
