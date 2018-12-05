
export default {
    state: {
        items: []
    },

    mutations: {
        LOAD_NOTIFICATIONS (state, notifications){
            state.items = notifications;
        },
    },

    actions: {
        loadNotifications (context) {
            axios.get('/notifications')
                .then(response => {
                    context.commit(
                        'LOAD_NOTIFICATIONS',
                        response.data.notifications
                    );
                });
        },

        // mark notification as read
        markAsRead (context, id) {
            axios.put('/notification-read', id)
        },
    },
}