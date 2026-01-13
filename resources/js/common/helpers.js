window.admin.helpers = {

    toggleNavSidebar: (open = true) => {
        window.admin.navVm.sidebar.isShow = open;
    },

    goTop: (smooth = true) => {
        document.documentElement.scrollTo({
            top: 0,
            behavior: smooth ? 'smooth' : 'auto'
        });
    },

    notify: (message, type = 'success', timeout = 2500) => {
        new Noty({
            text: message,
            type: type,
            timeout: timeout
        }).show();
    }

};
