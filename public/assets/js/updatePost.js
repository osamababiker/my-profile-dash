
const arTitle = document.querySelector('#arTitle');
const enTitle = document.querySelector('#enTitle');
const subOf = document.querySelector('#subOf');
const arSummery = document.querySelector('#arSummery');
const enSummery = document.querySelector('#enSummery');
const isPublished = document.querySelector('#isPublished');
const submitPost = document.querySelector('#submitPost');
const postId = document.querySelector('#postId');
 
submitPost.addEventListener('click', function() {
    const arContent = tinymce.get("arContent").getContent();
    const enContent = tinymce.get("enContent").getContent();
    let published = 0;
    isPublished.checked ? published = 1 : '';
    let formData = {
        "postId": postId.value,
        "arTitle": arTitle.value,
        "enTitle": enTitle.value,
        "arContent": arContent,
        "enContent": enContent,
        "subOf": subOf.value,
        "arSummery": arSummery.value,
        "enSummery": enSummery.value,
        "isPublished": published,
        "_token": csrf_token
    };
    $.ajax({
        url: "/posts/update",
        type: "POST",
        dataType: 'JSON',
        contentType : 'application/json',
        data: JSON.stringify(formData),
        success: function(response) {
            location.reload();
        } 
    });
});