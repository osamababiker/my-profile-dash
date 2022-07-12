
const arTitle = document.querySelector('#arTitle');
const enTitle = document.querySelector('#enTitle');
const subOf = document.querySelector('#subOf');
const arSummery = document.querySelector('#arSummery');
const enSummery = document.querySelector('#enSummery');
const isPublished = document.querySelector('#isPublished');
const submitPost = document.querySelector('#submitPost');


submitPost.addEventListener('click', function() {
    const arContent = tinymce.get("arContent").getContent();
    const enContent = tinymce.get("enContent").getContent();
    let published = 0;
    isPublished.checked ? published = 1 : '';
    $.ajax({
        url: "/posts",
        type: "POST",
        dataType: 'JSON',
        data: {
            "arTitle": arTitle.value,
            "enTitle": enTitle.value,
            "arContent": arContent,
            "enContent": enContent,
            "subOf": subOf.value,
            "arSummery": arSummery.value,
            "enSummery": enSummery.value,
            "isPublished": published,
            "_token": csrf_token
        },
        success: function(response) {
            console.log(response.data);
            //location.reload();
        } 
    });
});