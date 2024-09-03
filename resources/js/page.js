const flashMessageButton = document.getElementById('flashMessageButton')
const flashMessage = document.getElementById('cardMessage')
flashMessageButton.addEventListener('click', () => {
    flashMessage.classList.add('hidden')
})
setTimeout(() => {
    flashMessage.classList.remove('top-[5%]');
    flashMessage.classList.add('top-[0]');
    setTimeout(() => {
        flashMessage.classList.add('hidden');
    }, 100);
}, 2000);
