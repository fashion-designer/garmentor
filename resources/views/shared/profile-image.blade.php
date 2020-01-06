@if(isset($allowEdit) && $allowEdit)
    <div class="form-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="displayImageFileInput" name="display_image_file_input" style="width: 80%">
            <label class="custom-file-label" for="displayImageFileInput" style="width: 80%">Upload New Profile Image</label>
            <button type="button" class="{!! ($imageSource === false) ? 'btn btn-info invisible' : 'btn btn-info' !!}" id="displayImageFileInputRemoveButton" style="width: 15%" onclick="removeDisplayImage()">Remove</button>
            <input type="hidden" name="remove_display_image" id="removeDisplayImageInput" value="0">
        </div>
    </div>
@endif

<div class="border rounded-lg text-center garmentor-p-6">
    <img id="displayImage"  style="width: 80%; height: 80%;" src="{!! ($imageSource === false) ? asset('/images/default_image.jpeg') : $imageSource !!}" alt="No Image Available">
</div>

@section('footer_scripts')
    <script type="text/javascript">
        let defaultDisplayImageContents = "{!! asset('/images/default_image.jpeg') !!}";
        let displayImageContents = "{!! $imageSource !!}";
        let removeDisplayImageInputElement = document.getElementById('removeDisplayImageInput');
        let displayImageElement = document.getElementById('displayImage');
        let displayImageFileInputRemoveButtonElement = document.getElementById('displayImageFileInputRemoveButton');
        let displayImageFileInputElement = document.getElementById('displayImageFileInput');
        let currentImageType = (displayImageContents === '') ? 'default' : 'db';

        $(document).ready(function($)
        {
            $("#displayImageFileInput").on('change',function()
            {
                let input = $(this)[0];
                if (input.files && input.files[0])
                {
                    let reader = new FileReader();
                    reader.onload = function (e)
                    {
                        $('#displayImage').attr('src', e.target.result).fadeIn('slow');
                    };
                    reader.readAsDataURL(input.files[0]);
                    currentImageType = 'browse';
                }

                displayImageFileInputRemoveButtonElement.className = 'btn btn-info';
            });
        });

        function removeDisplayImage()
        {
            switch (currentImageType)
            {
                case 'db':
                    removeDisplayImageInputElement.value = '1';
                    displayImageElement.src = defaultDisplayImageContents;
                    displayImageFileInputRemoveButtonElement.className = 'btn btn-info invisible';
                    displayImageFileInputElement.value = '';
                    currentImageType = 'default';
                    break;

                case 'browse':
                    removeDisplayImageInputElement.value = '0';
                    displayImageElement.src = (displayImageContents !== '') ? displayImageContents : defaultDisplayImageContents;
                    displayImageFileInputRemoveButtonElement.className = (displayImageContents !== '') ? 'btn btn-info' : 'btn btn-info invisible';
                    displayImageFileInputElement.value = '';
                    currentImageType = (displayImageContents !== '') ? 'db' : 'default';
                    break;
            }
        }
    </script>
@endsection