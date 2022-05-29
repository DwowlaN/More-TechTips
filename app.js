document.querySelector("#btnAddComment").addEventListener("click", function (event) {

    let postId = this.dataset.postid;
    let text = document.querySelector("#commentText").value;
    console.log(postId);
    console.log(text);
    event.preventDefault();

    let formData = new FormData();
    formData.append('text', text);
    formData.append('post_id', postId);

    fetch('ajax/ajaxComment.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(result => {
            console.log('Success:', result);
            let newComment = document.createElement('li');
            newComment.innerHTML = result.body;
            document.querySelector(".post__comments__list").appendChild(newComment);
            document.querySelector("#commentText").value = "";

        })
        .catch(error => {
            console.error('Error:', error);
        });

});