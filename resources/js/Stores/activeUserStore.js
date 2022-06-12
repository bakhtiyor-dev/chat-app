import {defineStore} from "pinia";
import {useMessageStore} from "@/Stores/messageStore";
export const useActiveUserStore = defineStore('activeUserStore', {
    state: () => {
        return {
            activeUser: null
        }
    },
    actions: {
        setActiveUser(user) {
            this.activeUser = user;
            useMessageStore().fetchMessages();

        }
    }
})