<script setup>

import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
//import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
  canResetPassword: { type: Boolean, },
  status: { type: String, },
});

const title = "Log in";
const formBox = ref(null);
const signInForm = ref(null);
const signUpForm = ref(null);

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const slideToRegister = event => {
  formBox.value.classList.add("slide");
  //signInForm.value.classList.add("-top-full");
  //signUpForm.value.classList.remove("top-full");
};

const slideToLogin = event => {
  formBox.value.classList.remove("slide");
  //signInForm.value.classList.remove("-top-full");
  //signUpForm.value.classList.add("top-full");
};
// how computed in composition

const submit = () => {
  console.log(form.data());
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};

</script>

<template>
  <GuestLayout>
    <Head :title="title" />

    <div ref="formBox" class="relative w-full self-stretch flex flex-col justify-center items-center  text-center overflow-hidden bg-green-200 rounded-xl shadow-lg form-box">
      <div ref="signInForm" class="absolute sign-in-form bg-green-400">
        <form @submit.prevent="submit" class="flex flex-col justify-center items-center mb-3 space-y-2">
          <div>
            <Text-Input type="text" name="username" placeholder="Username" class="rounded-md text-2xl" />
            <Input-Error class="mt-1" :message="form.errors.username" />
          </div>
          <div>
            <Text-Input type="text" placeholder="Password" class="rounded-md text-2xl" />
            <Input-Error class="mt-1" :message="form.errors.password" />
          </div>
          <Primary-Button class="mt-2 text-2xl">Login</Primary-Button>
        </form>
        <div>
          Don't have account yet?
          <button @click="slideToRegister" class="px-2 py-0.5 rounded-lg font-semibold bg-sky-300 text-slate-600 hover:text-black">
            Register
          </button>
        </div>
      </div>

      <div ref="signUpForm" class="absolute sign-up-form bg-sky-400" style="opacity: .5">
        <form @submit.prevent="submit" class="flex flex-col justify-center items-center mb-3 space-y-2">
          <div>
            <Text-Input type="text" name="username" placeholder="Username" class="rounded-md text-2xl" />
            <Input-Error class="mt-1" :message="form.errors.username" />
          </div>
          <div>
            <Text-Input type="email" name="email" placeholder="Email" class="rounded-md text-2xl" />
            <Input-Error class="mt-1" :message="form.errors.email" />
          </div>
          <div>
            <Text-Input type="text" name="password" placeholder="Password" class="rounded-md text-2xl" />
            <Input-Error class="mt-1" :message="form.errors.password" />
          </div>
          <Primary-Button class="mt-2 text-2xl">Login</Primary-Button>
        </form>
        <div>
          Already have account?
          <button @click="slideToLogin" class="px-2 py-0.5 rounded-lg font-semibold bg-green-300 text-slate-600 hover:text-black">
            Login
          </button>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>

<style>

.form-box > div {
  transition: translate .4s ease-out;
}

.sign-up-form {
  translate: 0 100vh;
}

.slide .sign-up-form {
  translate: 0 0;
}

.sign-in-form {
  translate: 0 0;
}

.slide .sign-in-form {
  translate: 0 100vh;
}

</style>
