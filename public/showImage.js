function showImage(no)
{
    var oFReader = new FileReader();

    oFReader.readAsDataURL(document.getElementById("preview_photo"+no).files[0]);

    oFReader.onload = function (oFREvent)
    {
        document.getElementById("photo"+no).src = oFREvent.target.result;
        document.getElementById("photo_name"+no).value="new_image";
    };
}
