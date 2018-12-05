
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
            axios.put('/notification-read', params).then((response) => {
                    if (response) {
                        
                        context.commit('REMOVE_MARK_AS_READ', params.id);
                    }
                }, (error) => {
                    context.commit('REMOVE_MARK_AS_READ', params.id);
                    console.log(error);
                }
            );
        },
    },
}