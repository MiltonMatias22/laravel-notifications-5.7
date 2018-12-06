
export default {
    state: {
        items: []
    },

    mutations: {
        LOAD_NOTIFICATIONS (state, notifications){
            state.items = notifications;
        },
        REMOVE_MARK_AS_READ (state, id){

            // get index item
            let index = state.items.filter(item => item.id == id);
                
            // remove item
            state.items.splice(index, 1);
        },
        // remove all
        MARK_ALL_AS_READ (state) {
            state.items = [];
        },

        // add notifications
        ADD_NOTIFICATION (state, notification) {
            state.items.unshift(notification);
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
        markAsRead (context, params) {
            axios.put('/notification-read', params).then(() => {
                    context.commit('REMOVE_MARK_AS_READ', params.id);
                }, (error) => {
                        console.log(error);
                    }
            );
        },

        // mark all notification as read
        markAllAsRead (context){
            axios.put('/notification-all-read')
                .then(() => context.commit('MARK_ALL_AS_READ'),
                    (error) => {
                        console.log(error);
                    }
                );
        },
    },
}