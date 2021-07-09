(() => {

    function createNoteElement(props) {

        return createElement({
            class: 'noteItem',
            content: [
                createElement({
                    class: 'noteInfo',
                    ripple: '#999999',
                    content: [
                        createElement({
                            class: 'noteTitle',
                            content: props.title
                        }),
                        createElement({
                            class: 'noteContentPreview',
                            content: props.content.preview
                        })
                    ]
                }),
                createElement({
                    class: 'noteOptions',
                    content: [
                        createElementList({
                            tag: 'img',
                            list: [
                                { attributes: { src: './assets/icon/edit.svg' } },
                                { attributes: { src: './assets/icon/trash.svg' } }
                            ]
                        })
                    ]
                })
            ]
        });

    }

    window.createNoteElement = createNoteElement;

})();