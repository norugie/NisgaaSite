$(function () {
    //TinyMCE
    tinymce.init({
        selector: ".tinymce_editor",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | template | fontselect | fontsizeselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview | forecolor backcolor emoticons',
        image_advtab: true,
        images_upload_url: '../functions/upload.php',

        // Override default upload handler to simulate successful upload
        images_upload_handler: function (blobInfo, success, failure) {
            var xhr, formData;

            xhr = new XMLHttpRequest();
            xhr.withCredentials = false;
            xhr.open('POST', '../functions/upload.php');

            xhr.onload = function () {
                var json;

                if (xhr.status != 200) {
                    failure('HTTP Error: ' + xhr.status);
                    return;
                }

                json = JSON.parse(xhr.responseText);

                if (!json || typeof json.location != 'string') {
                    failure('Invalid JSON: ' + xhr.responseText);
                    return;
                }

                success(json.location);
            };

            formData = new FormData();
            formData.append('file', blobInfo.blob(), blobInfo.filename());

            xhr.send(formData);
        },
        templates: [
            {title: 'Magazine Template 1', description: 'Two column magazine-like template', url: '../components/templates/magazine1.html'}
        ],
        style_formats: [{
                title: 'Image Left',
                selector: 'img',
                classes: 'img-responsive img-fluid',
                styles: {
                    'float': 'left',
                    'padding': '10px'
                }
            },
            {
                title: 'Image Right',
                selector: 'img',
                classes: 'img-responsive img-fluid',
                styles: {
                    'float': 'right',
                    'padding': '10px'
                }
            },
            {
                title: 'Image Center',
                selector: 'img',
                classes: 'img-responsive img-fluid',
                styles: {
                    'display': 'block',
                    'margin-left': 'auto',
                    'margin-right': 'auto',
                    'padding': '10px'
                }
            }
        ]
    });
});