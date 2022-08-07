
const arTitle = document.querySelector('#arTitle');
const enTitle = document.querySelector('#enTitle');
const subOf = document.querySelector('#subOf');
const arSummery = document.querySelector('#arSummery');
const enSummery = document.querySelector('#enSummery');
const poster = document.querySelector('#poster');
const isPublished = document.querySelector('#isPublished');
const submitPost = document.querySelector('#submitPost');
const postId = document.querySelector('#postId');
 
submitPost.addEventListener('click', async function() {
    const arContent = tinymce.get("arContent").getContent();
    const enContent = tinymce.get("enContent").getContent();
    let published = 0;
    isPublished.checked ? published = 1 : 0;

    let formData = new FormData();    
    formData.append("postId", postId.value);   
    
    if(poster.files[0] !== undefined)  
        formData.append("poster", poster.files[0]);
    formData.append("arTitle", arTitle.value);
    formData.append('enTitle', enTitle.value);
    formData.append('arContent', arContent);
    formData.append('enContent', enContent);
    formData.append('subOf', subOf.value);
    formData.append('arSummery', arSummery.value);
    formData.append('enSummery', enSummery.value);
    formData.append('isPublished', published);
    formData.append('_token', csrf_token);
    await fetch('/posts/update', {
        method: "POST", 
        body: formData
      });    
   // location.reload();

});