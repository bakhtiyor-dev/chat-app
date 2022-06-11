import {defineStore} from "pinia";
import {useActiveUserStore} from "@/Stores/activeUserStore";

export const useMessageStore = defineStore('messageStore', {
    state: () => {
        return {
            messages: []
        }
    },
    actions: {
        async fetchMessages() {
            const response = await fetch(route('chat.fetch-messages',useActiveUserStore().activeUser.id));
            this.messages = await response.json()
        },
        listen(){
            window.Echo.channel("message")
                .listen('.MessageCreated',(e) => {
                    this.pushMessage(e.model);
                });
        },
        pushMessage(message){
            this.messages.push(message);
        }
    }
})