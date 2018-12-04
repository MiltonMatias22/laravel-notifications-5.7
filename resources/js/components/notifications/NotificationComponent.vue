<template>
    <div>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle"
                href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Notifications <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href=""
                    v-for="n in notifications" :key="n.id">
                    {{n.data.comment.post.title}}
                </a>
            </div>
        </li>
    </div>
</template>

<script>
    export default {
        created(){
            this.loadNotifications()
        },
        computed: {
            notifications (){
                return this.notificationsItems;
            },
        },
        data(){
            return {
                notificationsItems: []
            }
        },
        methods: {
            loadNotifications() {
                axios.get('/notifications')
                        .then(response => {
                           this.notificationsItems =
                           response.data.notifications;
                        });
            },
        },

    }
</script>

<style scoped>

</style>