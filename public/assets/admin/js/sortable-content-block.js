let sortableSelector = '#sortable';

Element.prototype.sortable = (function () {
    let dragEl, nextEl;

    function _unDraggable(elements) {
        if (elements && elements.length) {
            for (let i = 0; i < elements.length; i++) {
                if (!elements[i].hasAttribute('draggable')) {
                    elements[i].draggable = false;
                    _unDraggable(elements[i].children);
                }
            }
        }
    }

    function _onDragStart(e) {
        e.stopPropagation();
        e.dataTransfer.setData('id', e.target.dataset.id); // ID element
        let tempTarget = null;
        dragEl = e.target;
        nextEl = dragEl.nextSibling;
        e.dataTransfer.dropEffect = 'move';

        this.addEventListener('dragover', _onDragOver, false);
        this.addEventListener('dragend', _onDragEnd, false);
    }

    function _onDragOver(e) {
        e.preventDefault();
        e.stopPropagation();
        e.dataTransfer.dropEffect = 'move';

        let target;

        if (e.target !== this.tmpTarget) {
            this.tmpTarget = e.target;
            target = e.target.closest('[draggable=true]');
        }

        if (target && target !== dragEl && target.parentElement === this) {
            let rect = target.getBoundingClientRect();
            let next = (e.clientY - rect.top) / (rect.bottom - rect.top) > .5;
            this.insertBefore(dragEl, next && target.nextSibling || target);
        }
    }

    function _onDragEnd(e){
        e.preventDefault();
        this.removeEventListener('dragover', _onDragOver, false);
        this.removeEventListener('dragend', _onDragEnd, false);

        if (nextEl !== dragEl.nextSibling){
            this.onUpdate && this.onUpdate(dragEl);
        }
    }

    return function (options){
        options = options || {};

        this.onUpdate = options.stop || null;
        let excludedElements = options.excludedElements && options.excludedElements.split(/,*\s+/) || null;
        [...this.children].forEach(item => {
            let draggable = true;
            if (excludedElements){
                for (let i in excludedElements){
                    if (excludedElements.hasOwnProperty(i) && item.matches(excludedElements[i])){
                        draggable = false;
                        break;
                    }
                }
            }

            item.draggable = draggable;
            _unDraggable(item.children);
        });

        this.removeEventListener('dragstart', _onDragStart, false);
        this.addEventListener('dragstart', _onDragStart, false);
    };
})();

let wrapper = document.querySelectorAll(sortableSelector);

if (wrapper.length){
    wrapper.forEach(item => {
        item.sortable({
            excludedElements: '.excluded-element',
            stop: function (dragEl){
                // console.log(this)
                // console.log(dragEl)
            }
        });
    });
}
