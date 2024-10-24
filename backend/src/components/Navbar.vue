<template>
  <header class="">
    <button @click="emit('toggle-sidebar')"
            class="">
      <MenuIcon class="w-6"/>
    </button>
    <Menu as="div" class="">
      <MenuButton class="">
        <img src="https://randomuser.me/api/portraits/men/1.jpg" class="">
        <small>{{currentUser.name}}</small>
        <ChevronDownIcon
          class="h-5 w-5 text-violet-200 hover:text-violet-100"
          aria-hidden="true"
        />
      </MenuButton>

      <transition
        enter-active-class="transition duration-100 ease-out"
        enter-from-class="transform scale-95 opacity-0"
        enter-to-class="transform scale-100 opacity-100"
        leave-active-class="transition duration-75 ease-in"
        leave-from-class="transform scale-100 opacity-100"
        leave-to-class="transform scale-95 opacity-0"
      >
        <MenuItems
          class=""
        >
          <div class="">
            <MenuItem v-slot="{ active }">
              <button
                :class="[
                  active ? '' : '',
                  '',
                ]"
              >
                <UserIcon
                  :active="active"
                  class=""
                  aria-hidden="true"
                />
                Profile
              </button>
            </MenuItem>
            <MenuItem v-slot="{ active }">
              <button
                @click="logout"
                :class="[
                  active ? '' : '',
                  '',
                ]"
              >
                <LogoutIcon
                  :active="active"
                  class=""
                  aria-hidden="true"
                />
                Logout
              </button>
            </MenuItem>
          </div>
        </MenuItems>
      </transition>
    </Menu>
  </header>
</template>

<script setup>
import {MenuIcon, LogoutIcon, UserIcon} from '@heroicons/vue/outline'
import {Menu, MenuButton, MenuItems, MenuItem} from '@headlessui/vue'
import {ChevronDownIcon} from '@heroicons/vue/solid'
import store from "../store";
import router from "../router";
import {computed} from "vue";

const emit = defineEmits(['toggle-sidebar'])

const currentUser = computed(() => store.state.user.data);

function logout() {
  store.dispatch('logout')
    .then(() => {
      router.push({name: 'login'})
    })
}

</script>

<style scoped>

</style>
