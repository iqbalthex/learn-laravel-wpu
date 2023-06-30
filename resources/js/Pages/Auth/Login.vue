<script setup>

import GuestLayout from '@/Layouts/GuestLayout.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import { Head, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

defineProps({
  canResetPassword: { type: Boolean, },
  status: { type: String, },
});

const title = "Log in";
const container = ref(null);
const formBox   = ref(null);
const signInForm = ref(null);
const signUpForm = ref(null);

const form = useForm({
  email: '',
  password: '',
  remember: false,
});

const slideToRegister = () => {
  container.value.classList.add("slide");
  formBox.value.classList.add("translate-y-1/4");
};

const slideToLogin = () => {
  container.value.classList.remove("slide");
  formBox.value.classList.remove("translate-y-1/4");
};

const submit = () => {
  // console.log(form.data());
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};

</script>

<template>
  <GuestLayout>
    <Head :title="title" />

    <div ref="container" class="w-full text-center px-8 py-16 bg-slate-200">
      <div class="h-full overflow-hidden bg-orange-200 rounded-md shadow-2xl">
        <div class="relative h-full">
          <div class="absolute bottom-0 w-full flex flex-col justify-center h-1/5 text-xl">
            Don't have account yet ? <br/>
            <button @click="slideToRegister" class="mx-auto px-2 py-0.5 rounded-md font-semibold bg-sky-300 text-slate-600 hover:text-black">
              Register
            </button>
          </div>

          <div class="absolute w-full flex flex-col justify-center h-1/5 text-xl">
            Already have account ? <br/>
            <button @click="slideToLogin" class="mx-auto px-2 py-0.5 rounded-md font-semibold bg-lime-400 text-slate-600 hover:text-black">
              Login
            </button>
          </div>

          <div ref="formBox" class="relative form-box h-4/5 bg-green-400">
            <div ref="signInForm" class="sign-in-form w-full h-full top-0 flex justify-center items-center" style="transition-delay: .4s">
              <form @submit.prevent="submit" class="mb-3 space-y-2">
                <div>
                  <Text-Input type="text" name="username" placeholder="Username" />
                  <Input-Error :message="form.errors.username" />
                </div>
                <div>
                  <Text-Input type="text" name="password" placeholder="Password" />
                  <Input-Error :message="form.errors.password" />
                </div>
                <Primary-Button class="text-3xl">Login</Primary-Button>
              </form>
            </div>

            <div ref="signUpForm" class="absolute sign-up-form w-full h-full top-0 flex justify-center items-center" style="transition-delay: .4s">
              <form @submit.prevent="submit" class="mb-3 space-y-2">
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
                <Primary-Button class="text-3xl">Register</Primary-Button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>

<style>

.form-box > div { transition: translate .4s ease-out; }

.form-box { transition: all .6s; }
.sign-up-form { translate: 100% 0; }
.sign-in-form { translate: 0; }

.slide .form-box { @apply bg-sky-400; }
.slide .sign-up-form { translate: 0; }
.slide .sign-in-form { translate: -100% 0; }

</style>
