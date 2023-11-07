<script setup lang="ts">
import { computed, onMounted, onUnmounted, watch } from 'vue';

const props = withDefaults(
  defineProps<{
    show?: boolean;
    maxWidth?: 'sm' | 'md' | 'lg' | 'xl' | '2xl';
    closeable?: boolean;
  }>(),
  {
    show: false,
    maxWidth: '2xl',
    closeable: true,
  }
);

const emit = defineEmits(['close']);

watch(
  () => props.show,
  () => {
    if (props.show) {
      document.body.style.overflow = 'hidden';
    } else {
      document.body.style.overflow = 'visible';
    }
  }
);

const close = () => {
  if (props.closeable) {
    emit('close');
  }
};

const closeOnEscape = (e: KeyboardEvent) => {
  if (e.key === 'Escape' && props.show) {
    close();
  }
};

onMounted(() => document.addEventListener('keydown', closeOnEscape));

onUnmounted(() => {
  document.removeEventListener('keydown', closeOnEscape);
  document.body.style.overflow = 'visible';
});

const maxWidthClass = computed(() => {
  return {
    sm: 'sm:max-w-sm',
    md: 'sm:max-w-md',
    lg: 'sm:max-w-lg',
    xl: 'sm:max-w-xl',
    '2xl': 'sm:max-w-2xl',
  }[props.maxWidth];
});
</script>

<template>
  <teleport to="body">
    <transition leave-active-class="duration-200">
      <div v-show="show" class="fixed flex flex-col justify-center justify-items-center items-center content-center w-full z-50 inset-0" scroll-region>
        <transition enter-active-class="ease-out duration-300" enter-from-class="opacity-0" enter-to-class="opacity-100"
          leave-active-class="ease-in duration-200" leave-from-class="opacity-100" leave-to-class="opacity-0">
          <div v-show="show" class="fixed inset-0 transform transition-all" @click="close">
            <div class="absolute inset-0 bg-gray-200 opacity-75" />
          </div>
        </transition>

        <transition enter-active-class="ease-out duration-300"
          enter-from-class="opacity-0"
          enter-to-class="opacity-100" leave-active-class="ease-in duration-200"
          leave-from-class="opacity-100"
          leave-to-class="opacity-0">
          <div v-show="show"
            class="bg-white rounded overflow-hidden shadow transform transition-all sm:w-full sm:mx-auto p-4"
            :class="maxWidthClass">
            <slot />
          </div>
        </transition>
      </div>
    </transition>
  </teleport>
</template>
