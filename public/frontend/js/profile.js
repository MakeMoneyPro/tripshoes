function addNewLogo(input){
    
    if (input.files && input.files[0]) {
        var file = input.files[0];
        var size = 2000000;
        if(file.size >= size){
            alert('File upload size must be smaller 2MB');
            return;
        }
        var reader = new FileReader();
        reader.onload = function (e) {
            //Hiển thị ảnh vừa mới upload lên
            $('#logo-img').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        //submit form để upload ảnh
        $('#img-upload-form').submit();
    }
}

var submitImageForm = function(form){
    console.log(pathprofile);
    $.ajax({
        url: pathprofile, //api upload phía server
        type: "POST",
        data: new FormData(form),
        contentType: false,
        cache: false,
        processData: false,
        success: function (data)
        {            
            alert(data.mes);
        },
        error: function (data) {
           alert(data.mes)
        }
    });
    return false;
}