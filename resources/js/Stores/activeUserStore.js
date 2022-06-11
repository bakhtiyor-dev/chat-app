import {defineStore} from "pinia";

export const useActiveUserStore = defineStore('activeUserStore',{
    state: () => {
        return {
            activeUser: null
        }
    },
    actions:{
        setActiveUser(user){
            this.activeUser = user;
        }
    }
})