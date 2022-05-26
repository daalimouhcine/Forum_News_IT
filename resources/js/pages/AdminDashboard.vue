<script>
import Users from "../components/Users";

export default {
    data() {
        return {};
    },
    components: {
        Users,
    },
    beforeRouteEnter(to, from, next) {
        if (!localStorage.getItem("userData")) {
            return next("/");
        }
        next();
    },
};
</script>

<template>
    <div class="max-w-7xl mx-auto">
        <div class="inline-block min-w-full py-2 align-middle">
            <div
                class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 md:rounded-lg"
            >
                <table class="min-w-full divide-y divide-gray-300">
                    <thead class="bg-gray-50">
                        <tr>
                            <th
                                scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6"
                            >
                                #
                            </th>
                            <th
                                scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900"
                            >
                                User
                            </th>
                            <th
                                scope="col"
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900"
                            >
                                Email
                            </th>
                            <th
                                scope="col"
                                class="px-3 py-3.5 text-center text-sm font-semibold text-gray-900"
                            >
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <Suspense>
                        <template #default>
                            <Users />
                        </template>
                        <template #fallback>
                            <!-- <div class="container">
                                <div class="post">
                                    <div class="avatar"></div>
                                    <div class="line"></div>
                                    <div class="line"></div>
                                </div>
                            </div> -->
                            <h1>heelooooooooooooooooooooooooooooooo</h1>
                        </template>
                    </Suspense>
                </table>
            </div>
        </div>
    </div>
</template>

<!-- <style>
.container {
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

.post {
  width: 220px;
  height: 80px;
}
.post .avatar {
  float: left;
  width: 52px;
  height: 52px;
  background-color: #ccc;
  border-radius: 25%;
  margin: 8px;
  background-image: linear-gradient(90deg, #ddd 0px, #e8e8e8 40px, #ddd 80px);
  background-size: 600px;
  animation: shine-avatar 1.6s infinite linear;
}
.post .line {
  float: left;
  width: 140px;
  height: 16px;
  margin-top: 12px;
  border-radius: 7px;
  background-image: linear-gradient(90deg, #ddd 0px, #e8e8e8 40px, #ddd 80px);
  background-size: 600px;
  animation: shine-lines 1.6s infinite linear;
}
.post .avatar + .line {
  margin-top: 11px;
  width: 100px;
}
.post .line ~ .line {
  background-color: #ddd;
}

@keyframes shine-lines {
  0% {
    background-position: -100px;
  }
  40%, 100% {
    background-position: 140px;
  }
}
@keyframes shine-avatar {
  0% {
    background-position: -32px;
  }
  40%, 100% {
    background-position: 208px;
  }
}
</style> -->
