<script setup>

import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

defineProps({
  canResetPassword: { type: Boolean, },
  status: { type: String, },
  req: { type: String }
});

const title = "Log in";
const container = ref(null);
const formBox   = ref(null);
const signInForm = ref(null);
const signUpForm = ref(null);

const form = useForm({
  username: '',
  password: '',
});

const slideToRegister = () => {
  container.value.classList.add("slide");
  formBox.value.classList.add("translate-y-1/4", "sm:translate-y-0");
};

const slideToLogin = () => {
  container.value.classList.remove("slide");
  formBox.value.classList.remove("translate-y-1/4", "sm:translate-y-0");
};

const login = () => {
  console.log(form);
  form.post(route('login'), {
    onStart: (res) => console.log(res),
    onFinish: (res) => console.log(res)
  });
};

const register = null;

</script>

<template>
  <GuestLayout>
    <Head :title="title" />

    <div ref="container" class="w-full text-center px-8 py-16 bg-slate-200">
      <div class="relative h-full verflow-hidden rounded-md bg-slate-100/75 sm:flex sm:items-center">

        <div class="relative flex flex-col justify-between h-full sm:flex-row sm:w-full sm:h-4/5 sm:justify-around px-8 sm:items-center sm:gap-36">
          <div class="flex flex-col justify-center h-1/5 text-xl">
            Already have account? <br/>
            <button @click="slideToLogin">
              Login
            </button>
          </div>

          <div class="flex flex-col justify-center h-1/5 text-xl">
            Don't have account yet ? <br/>
            <button @click="slideToRegister" class="bg-sky-300 hover:bg-sky-400">
              Register
            </button>
          </div>
        </div>

        <div ref="formBox" class="form-box absolute top-0 w-full h-4/5 rounded-lg shadow-xl bg-green-400 hiddn overflow-hidden sm:w-1/2 sm:h-full sm:translate-x-[10%]">
          <div ref="signInForm" class="sign-in-form" style="transition-delay: .4s">
            <form @submit.prevent="login" class="mb-3 space-y-2">
              <div>
                <Text-Input v-model="form.username" type="text" name="username" placeholder="Username" />
                <Input-Error :message="form.errors.username" />
              </div>
              <div>
                <Text-Input v-model="form.password" type="text" name="password" placeholder="Password" />
                <Input-Error :message="form.errors.password" />
              </div>
              <Primary-Button class="hover:bg-green-200 focus:bg-green-200">Login</Primary-Button>
            </form>
          </div>

          <div ref="signUpForm" class="sign-up-form absolute w-full" style="transition-delay: .4s">
            <form @submit.prevent="register" class="mb-3 space-y-2">
              <div>
                <Text-Input type="text" name="username" placeholder="Username" />
                <Input-Error :message="form.errors.username" />
              </div>
              <div>
                <Text-Input type="text" name="email" placeholder="Email" />
                <Input-Error :message="form.errors.email" />
              </div>
              <div>
                <Text-Input type="text" placeholder="Password" />
                <Input-Error :message="form.errors.password" />
              </div>
              <Primary-Button class="hover:bg-sky-200 focus:bg-sky-200">Register</Primary-Button>
            </form>
          </div>
        </div>

      </div>
    </div>
  </GuestLayout>
</template>

<style>

.form-box > div {
	transition: translate .4s ease-out;
}

.form-box {
	transition: all .6s;
}

.sign-up-form { translate: 100% 0; }
.sign-in-form { translate:   0  0; }

.slide .form-box {
	@apply bg-sky-400;
}

.slide .sign-up-form { translate:    0  0; }
.slide .sign-in-form { translate: -100% 0; }

.form-box > div {
  @apply h-full top-0 flex justify-center items-center
}

button {
  @apply mx-auto px-2 py-0.5 rounded-md font-semibold bg-lime-400 text-slate-600 hover:bg-lime-500 hover:text-black
}

@media (min-width: 640px) {
  .slide .form-box {
    translate: 80% 0;
  }
}

</style>
