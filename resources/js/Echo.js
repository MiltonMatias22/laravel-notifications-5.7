
import store from './vuex/store'

import sweetAlert from 'sweetalert'

const typesNotifications =  {
    postCommented: 'App\\Notifications\\PostComment',
}

if (window.Laravel.user) {
    Echo.private(`App.Models.User.${window.Laravel.user}`)
    .notification(notification => {
        if (Laravel.user == notification.data.comment.post.user.id) {
            if (notification.type == typesNotifications.postCommented) {
                sweetAlert(
                    'New comment',
                    `${notification.data.comment.user.name} comment on ${notification.data.comment.post.title}`,
                    'info'
                )
                store.commit('ADD_NOTIFICATION', notification)
            }            
        }
    })
}