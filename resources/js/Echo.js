
if (window.Laravel.user) {
    console.log(`App.Models.User.${window.Laravel.user}`)
    Echo.private(`App.Models.User.${window.Laravel.user}`)
    .notification(notification => {
        console.log(notification)
    })
}