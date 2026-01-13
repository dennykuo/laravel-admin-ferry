(function() {
    window.admin.modal = {
        open: (id) => {
            let elements = getElements(id);
            elements.modal.classList.add('scale-100');
            elements.modal.classList.remove('scale-0');
            elements.panel.classList.add('!opacity-100', '!translate-y-0', '!sm:scale-100');

            document.body.classList.add('overflow-hidden');
        },

        close: (id) => {
            let elements = getElements(id);
            elements.modal.classList.add('scale-0');
            elements.modal.classList.remove('scale-100');
            elements.panel.classList.remove('!opacity-100', '!translate-y-0', '!sm:scale-100');

            document.body.classList.remove('overflow-hidden');
        },

        toggle: (id) => {
            let elements = getElements(id);
            elements.modal.classList.toggle('scale-100');
            elements.modal.classList.toggle('scale-0');
            elements.panel.classList.toggle('!opacity-100');
            elements.panel.classList.toggle('!translate-y-0');
            elements.panel.classList.toggle('!sm:scale-100');

            document.body.classList.toggle('overflow-hidden');
        }
    };

    function getElements(id) {
        let modal = getModal(id);
        let panel = getPanel(modal);

        console.log(panel)

        return {
            modal: modal,
            panel: panel
        };
    }

    function getModal(id) {
        return document.getElementById(id);
    }

    function getPanel(modal) {
        return modal.querySelector('[data-modal-panel]');
    }
})();
