<script setup>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue';
import {Head} from '@inertiajs/inertia-vue3';
import Search from "@/Components/Chat/Search";
import UserLinks from "@/Components/Chat/UserLinks";
import Messages from "@/Components/Chat/Messages";
import SendInput from "@/Components/Chat/SendInput";
import {useActiveUserStore} from "@/Stores/activeUserStore";

const activeUserStore = useActiveUserStore();

</script>

<template>
  <Head title="Dashboard"/>

  <BreezeAuthenticatedLayout>
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <div class="min-w-full border rounded lg:grid lg:grid-cols-3">
              <div class="border-r border-gray-300 lg:col-span-1">
                <Search/>

                <ul class="overflow-auto h-[32rem]">
                  <h2 class="my-2 mb-2 ml-2 text-lg text-gray-600">Users</h2>
                  <UserLinks/>
                </ul>

              </div>

              <div v-if="activeUserStore.activeUser" class="lg:col-span-2 lg:block">
                <div class="w-full">
                  <div class="relative flex items-center p-3 border-b border-gray-300">
                    <img class="object-cover w-10 h-10 rounded-full"
                         src="https://cdn.icon-icons.com/icons2/1378/PNG/512/avatardefault_92824.png" alt="username"/>
                    <span class="block ml-2 font-bold text-gray-600">{{ activeUserStore.activeUser.name }}</span>
<!--                    <span class="absolute w-3 h-3 bg-green-600 rounded-full left-10 top-3"></span>-->
                  </div>

                  <Messages/>
                  <SendInput/>

                </div>


              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

  </BreezeAuthenticatedLayout>
</template>

<script>


export default {}
</script>