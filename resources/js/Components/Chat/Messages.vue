<script setup>
import {useMessageStore} from "@/Stores/messageStore";
import MessageLeft from "@/Components/Chat/MessageLeft";
import MessageRight from "@/Components/Chat/MessageRight";
const messageStore = useMessageStore();
messageStore.listen();
</script>
<template>
  <div id="messages" class="relative w-full p-6 overflow-y-auto h-[40rem]" >
    <ul class="space-y-2">
      <li v-for="message in messageStore.messages"
          class="flex"
          :class="checkMessageIsMine(message) ? 'justify-end' : 'justify-start'">

        <MessageRight v-if="checkMessageIsMine(message)" :message="message.body"/>
          <MessageLeft v-else :message="message.body"/>
      </li>

    </ul>
  </div>
</template>

<script>
export default {
  name: "Messages",
  methods:{
    checkMessageIsMine(message){
      return message.sender_id === this.$page.props.auth.user.id;
    }
  }
}
</script>

<style scoped>

</style>