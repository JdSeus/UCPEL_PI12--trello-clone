
export default function () { 

    var profileImage = document.querySelector('#js-profile-picture');
    var imageInput = document.querySelector('#js-image-input');

    if(typeof imageInput != 'undefined') {
        if(typeof profileImage != 'undefined') {

            imageInput.addEventListener("change", (evt) => {
                var file = evt.target.files[0];
                console.log(file);
                profileImage.src = URL.createObjectURL(file);
            });

            profileImage.addEventListener("click", (evt) => {
                imageInput.dispatchEvent(evt); 
            });
        }
    }
}
