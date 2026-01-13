if (document.querySelector('#vue-ferry-nav')) {
    window.admin.navVm = Vue.createApp({
        data() {
            return {
                currentUrl: window.location.origin + window.location.pathname,
                sidebar: {
                    isShow: false,
                    active: null
                }
            }
        },

        watch: {
            'sidebar.isShow': () => { document.body.classList.toggle('overflow-hidden'); }
        },

        components: getComponents()
    }).mount('#vue-ferry-nav');
}

function getComponents() {
    return {
        'ferry-nav-item': {
            props: ['name', 'href'],

            data() {
                return {
                    isActive: this.$root.currentUrl === this.href
                              || this.$root.currentUrl === this.href + '/'
                              || this.$root.currentUrl === this.href + '/' // 針對首頁
                              || this.$root.sidebar.active === this.href
                              || (
                                  // 針對該單元的相關內頁
                                  this.href !== location.origin
                                  &&
                                  this.$root.currentUrl.startsWith(this.href + '/')
                                 )

                }
            },

            mounted() {
                if (this.isActive) {
                    if (this.$parent != this.$root)
                        this.$parent.isOpen = true;
                }
            },

            template: '#ferry-nav-item-template'
        },

        'ferry-nav-dropdown': {
            props: {
                name: {
                    type: String,
                    required: true
                },
                open: {
                    type: Boolean,
                    default: false
                }
            },
            data () {
                return {
                    isOpen: this.open
                }
            },
            template: '#ferry-nav-dropdown-template'
        }
    }
}
