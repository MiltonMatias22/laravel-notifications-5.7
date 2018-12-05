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
                <div v-if="notifications.length > 0"> 
                    <a class="dropdown-item" href="#"
                        v-for="n in notifications" :key="n.id">
                        <span @click.prevent="markAsRead(n.id)"
                            title="Mark as read?">
                            <i class="fa fa-check-circle-o text-danger" aria-hidden="true"></i>
                        </span> 
                        <small>
                            {{n.data.comment.user.name}} <b>on</b>
                            {{n.data.comment.post.title}}
                        </small>
                    </a>
                </div>
                <div v-else >
                    <small class="dropdown-item">Empty 
                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                </small>
                </div>
                <div class="dropdown-item">
                    <a href="#" @click.prevent="markAllAsRead" class="btn btn-danger btn-sm">
                        Clear all
                    </a>
                </div>
            </div>
        </li>
    </div>
</template>

<script>
    export default {
        created(){
            this.$store.dispatch('loadNotifications');
        },
        computed: {
            notifications (){
                return this.$store.state.notifications.items;
            },
        },

        methods: {
            markAsRead (notificationId) {
                this.$store.dispatch('markAsRead', {id: notificationId});
            },
            markAllAsRead (){
                 this.$store.dispatch('markAllAsRead');
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
