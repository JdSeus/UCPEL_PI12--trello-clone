
export default function () { 

    var profileImage = document.querySelector('#js-profile-picture');
    var imageInput = document.querySelector('#js-image-input');

    if((typeof imageInput != 'undefined') && (imageInput !== null)) {
        if((typeof profileImage != 'undefined') && (profileImage !== null)) {

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
