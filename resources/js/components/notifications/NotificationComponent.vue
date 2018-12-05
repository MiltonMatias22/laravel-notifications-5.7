<template>
    <div>
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle"
                href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false"
                data-placement="top" title="Notifications">
                
                <div class="item">
                    <i class="fa fa-bell-o"></i>          
                    <span class="badge badge-warning notify-badge">
                        {{notifications.length >= 10 ? '9+' : '0'+notifications.length}}
                    </span>
                </div>
            </a>

            <div class="dropdown-menu dropdown-menu-right"
                aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href=""
                    v-for="n in notifications" :key="n.id">
                    <small>
                        {{n.data.comment.user.name}} <b>on</b>
                        {{n.data.comment.post.title}}
                    </small>
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
    .item {
        position:relative;
        display:inline-block;
    }
    .notify-badge{
        position: absolute;
        right:-.85rem;
        top:-.1rem;
        text-align: center;
        border-radius: 30%;
        font-size: .6rem;
        font-weight: 300;
    }
</style>
