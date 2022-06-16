<script setup>
import {useActiveUserStore} from "@/Stores/activeUserStore";
const activeUserStore = useActiveUserStore();
</script>

<template>
  <li>
    <a v-for="user in $page.props.users"
       @click="activeUserStore.setActiveUser(user)"
       class="flex items-center px-3 py-2 text-sm transition duration-150 ease-in-out border-b border-gray-300 cursor-pointer hover:bg-gray-100 focus:outline-none"
      :class="{'bg-gray-100' : activeUserStore.activeUser?.id === user.id}"
    >
      <img class="object-cover w-10 h-10 rounded-full"
           src="/avatardefault.png" alt="username"/>
      <div class="w-full pb-2">
        <div class="flex justify-between">
          <span class="block ml-2 font-semibold text-gray-600">{{ user.name }}</span>
<!--          <span class="block ml-2 text-sm text-gray-600">25 minutes</span>-->
        </div>
        <span class="block ml-2 text-sm text-gray-600"></span>
      </div>
    </a>
  </li>
</template>