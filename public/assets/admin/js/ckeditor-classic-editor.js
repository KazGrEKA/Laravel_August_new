ClassicEditor
    .create( document.querySelector( '#description' ), {
        image: {
            uploadUrl: {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            }
        },
        heading: {
            options: [
                { model: 'paragraph', title: 'Параграф', class: 'ck-heading_paragraph' },
                { model: 'heading1', view: 'h1', title: 'Заголовок 1', class: 'ck-heading_heading1' },
                { model: 'heading2', view: 'h2', title: 'Заголовок 2', class: 'ck-heading_heading2' },
                { model: 'heading3', view: 'h3', title: 'Заголовок 3', class: 'ck-heading_heading3' },
                { model: 'heading4', view: 'h4', title: 'Заголовок 4', class: 'ck-heading_heading4' },
                { model: 'heading5', view: 'h5', title: 'Заголовок 5', class: 'ck-heading_heading5' },
                { model: 'heading6', view: 'h6', title: 'Заголовок 6', class: 'ck-heading_heading6' },
            ]
        }
    })
    .catch( error => {
        console.log( error );
    });