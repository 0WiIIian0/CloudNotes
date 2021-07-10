(() => {

    function generateNoteContentPreview(content) {

        let contentPreview = content;

        if (content.length > 64) {
            content = contentPreview.substring(0, 61) + '...';
        }

        return content;

    }

    function updateNote(props) {
        
        console.log(props);
        window.props = props;

        props.noteElement.title.innerText = props.title;
        props.noteElement.preview.innerText = generateNoteContentPreview(props.content);

        ajax({
            url: '../back-end/manager/edit.php',
            data: {
                id: props.id,
                title: props.title,
                text: props.content
            },
            complete: (e) => {
                console.log(e);
            }
        });

    }

    function editNoteModal(props) {
        
        let title = createElement({
            tag: 'input',
            class: 'noteTitleInput',
            attributes: {
                value: props.title,
                placeholder: 'Title'
            }
        });

        let content = createElement({
            tag: 'textarea',
            class: 'noteTextInput',
            attributes: {
                value: props.content,
                placeholder: 'Note content'
            }
        });

        let modal = createElement({
            class: 'modalBackground',
            content: createElement({
                class: 'modal',
                content: [
                    createElement({
                        tag: 'h2',
                        content: 'Edit Note'
                    }),
                    title,
                    content,
                    createElement({
                        class: 'formButtonBox',
                        content: createElementList({
                            tag: 'button',
                            ripple: '#999999',
                            list: [
                                {
                                    content: 'Close',
                                    event: {
                                        on: 'click',
                                        do: () => {
                                            document.body.removeChild(modal);
                                        }
                                    }
                                },
                                {
                                    content: 'Save',
                                    event: {
                                        on: 'click',
                                        do: () => {

                                            updateNote({
                                                id: props.id,
                                                title: title.value,
                                                content: content.value,
                                                noteElement: props.noteElement
                                            });

                                        }
                                    }
                                }
                            ]
                        })
                    })
                ]
            })
        }).addTo(document.body);

    }

    function deleteNote(props, noteElement) {

        ajax({
            url: '../back-end/manager/delete.php',
            data: {
                id: props.id
            },
            complete: (e) => {
                console.log(e);

                noteElement.parentElement.removeChild(
                    noteElement
                );

            }
        });

    }

    function deleteNoteModal(props, noteElement) {

        let modal = createElement({
            class: 'modalBackground',
            content: createElement({
                class: 'miniModal',
                content: [
                    createElement({
                        tag: 'h2',
                        content: 'Delete Note'
                    }),
                    createElement({
                        style: {
                            fontSize: '20px',
                            padding: '20px'
                        },
                        content: `Are you sure that you want to delete "${props.title}"?`
                    }),
                    createElement({
                        class: 'formButtonBox',
                        content: createElementList({
                            tag: 'button',
                            ripple: '#999999',
                            list: [
                                {
                                    content: 'Close',
                                    event: {
                                        on: 'click',
                                        do: () => {
                                            document.body.removeChild(modal);
                                        }
                                    }
                                },
                                {
                                    content: 'Delete',
                                    event: {
                                        on: 'click',
                                        do: () => {

                                            deleteNote(
                                                props,
                                                noteElement
                                            );
                                            
                                            document.body.removeChild(modal);

                                        }
                                    }
                                }
                            ]
                        })
                    })
                ]
            })
        }).addTo(document.body);

    }

    function createNoteElement(props) {

        const title = createElement({
            class: 'noteTitle',
            content: props.title
        });

        const preview = createElement({
            class: 'noteContentPreview',
            content: generateNoteContentPreview(
                props.content
            )
        });

        const noteElement = createElement({
            class: 'noteItem',
            content: [
                createElement({
                    class: 'noteInfo',
                    ripple: '#999999',
                    content: [
                        title,
                        preview
                    ]
                }),
                createElement({
                    class: 'noteOptions',
                    content: [
                        createElementList({
                            tag: 'img',
                            list: [
                                {
                                    attributes: { src: './assets/icon/edit.svg' },
                                    event: {
                                        on: 'click',
                                        do: () => {
                                            editNoteModal({
                                                ...props,
                                                noteElement: {
                                                    title,
                                                    preview
                                                }
                                            });
                                        }
                                    }
                                },
                                {
                                    attributes: { src: './assets/icon/trash.svg' },
                                    event: {
                                        on: 'click',
                                        do: () => {
                                            deleteNoteModal(props, noteElement);
                                        }
                                    }
                                }
                            ]
                        })
                    ]
                })
            ]
        });

        return noteElement;

    }

    window.createNoteElement = createNoteElement;

})();