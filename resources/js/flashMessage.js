const flashMessageButton = document.getElementById('flashMessageButton')
const flashMessage = document.getElementById('cardMessage')


flashMessageButton.addEventListener('click',()=>{
    flashMessage.classList.add('hidden')
})
setTimeout(()=>{
    flashMessage.classList.add('hidden')
},3000)
