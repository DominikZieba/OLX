function deleteImage(no)
{
    document.getElementById("photo"+no).src = "no_image.png";
    document.getElementById("preview_photo"+no).value="";
    document.getElementById("photo_name"+no).value="";
}
