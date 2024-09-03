const path = document.querySelectorAll('#ToggleEye path');
const svg = document.getElementById('ToggleEye');
const path1 = document.getElementById('pathSatu');
const path2 = document.getElementById('pathDua');

// Path baru
const newPath1 = 'M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0';
const newPath2 = 'M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7';

const passwordInput = document.getElementById('password')

let isToggled = false;
svg.addEventListener('click',()=>{
    if (isToggled) {
        // Set path ke path lama
        passwordInput.setAttribute('type','password')
        path1.setAttribute('d', 'm10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7 7 0 0 0 2.79-.588M5.21 3.088A7 7 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474z');
        path2.setAttribute('d', 'M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12z');
    } else {
        passwordInput.setAttribute('type','text')
        path1.setAttribute('d', newPath1);
        path2.setAttribute('d', newPath2);
    }
    // Toggle state
    isToggled = !isToggled;
})

